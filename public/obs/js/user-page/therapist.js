$(document).ready(function() {
    const treatmentData = JSON.parse(localStorage.getItem('selectedCards'));

    if(treatmentData){
        axios
            .post('/getTherapist',{
                treatmentData: treatmentData
            })
            .then(function(response) {
                if (response.data.success) {
                    const treatment = response.data.treatment;
                    displayTherapists(treatment); 
                } else {
                    console.error('Error retrieving therapists:', response.data.message);
                }
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
    } else {

    }

    let selectedTherapists = [];

    function displayTherapists(treatments) {
        const $container = $('#therapist-cards');
        $container.empty(); 

        $.each(treatments, function(index, treatment) {
        
            const $treatmentTitle = $('<h4></h4>').text(treatment.treatment_name);
            $container.append($treatmentTitle);
            const therapist = {
                id: treatment.person_therapist.id,
                code: treatment.person_therapist.therapist_code,
                name: treatment.person_therapist.therapist_name,
                pic: treatment.person_therapist.therapist_pic,
                createdAt: treatment.person_therapist.created_at
            };
        
            const $row = $('<div></div>').addClass('row');
            $container.append($row);
        
            const $card = $('<div></div>').addClass('col-sm-4 col-md-4 col-lg-4 mb-3');
            const $cardContent = $(`
                <div class="card therapist-card selectable " id="therapist-${therapist.id}" data-id="${therapist.id}">
                    <div class="card-header text-center">
                        <div class="card-title-container text-center">
                            <img src="${therapist.pic || '/path/to/default/image.jpg'}" alt="${therapist.name}" style="width: 50%;">
                            <small style="display: none;">${therapist.code}</small>
                            <i class="fa fa-check-circle check-icon" style="display: none;"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center">${therapist.name}</p>
                    </div>
                </div>
            `);
            $cardContent.on('click', function() {          
                $(this).toggleClass('active');
                var checkIcon = $(this).find('.check-icon');
                checkIcon.toggle();
                const selectedTherapistId = $(this).data('id');
                if ($(this).hasClass('active')) {
                    selectedTherapists.push(selectedTherapistId);
                } else {
                    const index = selectedTherapists.indexOf(selectedTherapistId);
                    if (index !== -1) {
                        selectedTherapists.splice(index, 1);
                    }
                }

                localStorage.setItem('selectedCardTherapists', JSON.stringify(selectedTherapists));

                $('#badgeCountTherapist').text(selectedTherapists.length + '/' +treatments.length);
                if(selectedTherapists.length != treatments.length){
                    $('#btnNextTherapist').prop('disabled',true);
                } else {
                    $('#btnNextTherapist').prop('disabled',false);
                }
                
            });
        
            $card.append($cardContent);
            $row.append($card);
        });
        
    }

    $('#btnNextTherapist').on('click', function(){
        window.location.href = '/preview';
    });

});