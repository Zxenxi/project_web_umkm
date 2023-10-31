
$(document).ready(function () {
  
  // Hide the form by default
  $('.category-form').hide();

  // Show the form when the button is clicked
  $('#add-category-btn').click(function () {
    $('.category-form').show();
  });

  // Handle form submission via AJAX 
  $('.category-form').submit(function (event) {
    // Stop the form from submitting normally
    event.preventDefault();

    // Get the form data
    var formData = $(this).serialize();

    // Submit the form via AJAX
    $.ajax({
      url: '/categories',
      type: 'POST',
      data: formData,
      success: function (data) {
        // Do something with the response data
        console.log(data);

        // Clear the form
        $('.category-form')[0].reset();

        // Hide the form
        $('.category-form').hide();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error(jqXHR.responseText);
      }
    });
  });

});
