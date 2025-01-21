$(document).ready(function () {
  var selectedId = localStorage.getItem('selectedLocationId');
  
  if (selectedId) {
      $('#locationSelect_' + selectedId).addClass('active');
  }

  $('.card.selectable').on('click', function() {
      selectedId = $(this).attr('id').split('_')[1]; 
      localStorage.setItem('selectedLocationId', selectedId);
      $('.card.selectable').removeClass('active');
      $(this).addClass('active');
  });

  $('#selectBtn').on('click', function(){
      if (selectedId) {
          console.log(selectedId);
          axios
              .get('/treatments', {
                  params : { location_id : selectedId }
              })
              .then(function(response){
                  console.log('API response', response.data);
                  window.location.href = '/treatments';
              })
              .catch(function(error){
                  // console.log('Error:', error);
                  alert('An error occurred while selecting the location');
              });
      } else {
          alert('Please select a location');
      }
  });
});