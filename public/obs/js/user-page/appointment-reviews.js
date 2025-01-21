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
            time: selectedTime,
            therapist : selectedTherapist
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
            console.log(response.data.data)
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
            $('#dateApp').text(response.data.data.date);
            $('#timeApp').text(response.data.data.time);
            let totalPayment = parseFloat(0);
            $.each(response.data.data.treatments,function(index,valPaymentTreat){
                totalPayment += parseInt(valPaymentTreat.treatment_price);
                $('#bodyDetailPayment').append(`
                    <tr>
                        <td>${valPaymentTreat.treatment_name} (${valPaymentTreat.category.category_name})</td>
                        <td class="text-end">${valPaymentTreat.treatment_price}</td>
                    </tr>
                `);
            });

            $('#totalPayment').text(totalPayment);
        })
        .catch(function(error){

        });
})