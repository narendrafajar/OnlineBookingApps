// const { default: axios } = require("axios");

// const { data } = require("alpinejs");

$(document).ready(function (){
        var selectedLocationId = localStorage.getItem('selectedLocationId');
        var selectedCards = JSON.parse(localStorage.getItem('selectedCards')) || [];
        var selectedDate = localStorage.getItem("selectedDate");
        var selectedTime = localStorage.getItem("selectedTime");
        var selectedTherapist = JSON.parse(localStorage.getItem("selectedCardTherapists"));

        var dataToSend = {
            location_id: selectedLocationId,
            treatments: selectedCards, // Mengirimkan array treatment
            date: selectedDate,
            time: selectedTime
        };

    axios
        .post('/getAllAppointment',{
            params: {
                location_id: selectedLocationId,
                treatments: selectedCards,
                date: selectedDate,
                time: selectedTime,
                therapist: selectedTherapist
            }
        })
        .then(function(response){
            $('#locationsName').text(response.data.data.locations.location_name);
            $('#bodyTreatments').html('');
            $.each(response.data.data.treatments,function(index,valTreat){
                $('#bodyTreatments').append(`
                    <tr>
                        <td class="text-end">${valTreat.treatment_name} (${valTreat.category.category_name})</td>
                    </tr>
                `);
            });
            $('#bodyTherapist').html('');
            $.each(response.data.data.therapist,function(index,valTherapist){
                $('#bodyTherapist').append(`
                    <tr>
                        <td class="text-end">${valTherapist.therapist_name}</td>
                    </tr>
                `);
            });
            $('#dateApp').text(formatDate(response.data.data.date));
            $('#timeApp').text(response.data.data.time);
            let totalPayment = parseFloat(0);
            $.each(response.data.data.treatments,function(index,valPaymentTreat){
                totalPayment += parseInt(valPaymentTreat.treatment_price);
                $('#bodyDetailPayment').append(`
                    <tr>
                        <td>${valPaymentTreat.treatment_name} (${valPaymentTreat.category.category_name})</td>
                        <td class="text-end">${'Rp.'+ moneyFormat(valPaymentTreat.treatment_price)}</td>
                    </tr>
                `);
            });

            $('#totalPayment').text('Rp. ' + moneyFormat(totalPayment));
        })
        .catch(function(error){
            console.error('Error:', error);
        });

        $('#submitBtn').on('click', function () {
            axios
                .post('/appointment', {
                    params: {
                        location_id: selectedLocationId,
                        treatments: selectedCards,
                        date: selectedDate,
                        time: selectedTime,
                        therapist: selectedTherapist
                    }
                })
                .then(function (response) {
                    if (response.data.success) {
                        // alert('Appointment Successfully Booked');
                        $('#modalNotif').modal('show');
                        setTimeout(function() {
                            $('#modalNotif').modal('hide');
                        }, 3000);
                        localStorage.clear();
                        window.location.href = '/user-home';
                    } else {
                        alert('Error: ' + response.data.message);
                    }
                })
                .catch(function (error) {
                    if (error.response) {
                        if (error.response.status === 422) {
                            let validationErrors = error.response.data.errors;
                            let errorMessage = 'Validation errors:\n';
                            for (let key in validationErrors) {
                                errorMessage += `${key}: ${validationErrors[key].join(', ')}\n`;
                            }
                            alert(errorMessage);
                        } else {
                            alert('Server Error: ' + error.response.data.message);
                        }
                    } else if (error.request) {
                        alert('No response received from server.');
                    } else {
                        alert('Error: ' + error.message);
                    }
                });
        });
})