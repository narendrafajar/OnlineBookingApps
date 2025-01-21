$(document).ready(function () {
    // console.log(localStorage);
    var selectedCards = JSON.parse(localStorage.getItem('selectedCards')) || [];

    selectedCards.forEach(function(cardId) {
        $('#' + cardId).addClass('active');
        var checkIcon = $('#' + cardId).find('.check-icon');
        checkIcon.show();
        $('#badgeCount').text(selectedCards.length);
    });

    function updateLocalStorage() {
        localStorage.setItem('selectedCards', JSON.stringify(selectedCards));
        $('#badgeCount').text(selectedCards.length);
    }

    $('.card.selectable').on('click', function () {
        $(this).toggleClass('active');
        var checkIcon = $(this).find('.check-icon');
        checkIcon.toggle();

        var cardId = $(this).attr('id');

        if ($(this).hasClass('active')) {
            if (!selectedCards.includes(cardId)) {
                selectedCards.push(cardId);
            }
        } else {
            selectedCards = selectedCards.filter(function(id) {
                return id !== cardId;
            });
        }

        updateLocalStorage();
    });

    $('#btnNext').on('click', function(){
        window.location.href = '/select-slots'
    })

    $('#btnBack').on('click', function(){
        window.location.href = '/select-location';
    });
});
