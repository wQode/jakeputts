// $(function() {
//     // Get the form.
//     var form = $('#ajax-contact');

//     // Get the messages div.
//     var formMessages = $('#form-messages');

//     // TODO: The rest of the code will go here...
    
//     // Event listener to intercept submit event on form
//     $(form).submit(function(e) {
//       // Stop the browser from submitting the form
//       e.preventDefault();

//       //Serialise the form data
//       var formData = $(form).serialize();

//       // Submit the form using AJAX
//       $.ajax({
//         type: 'POST',
//         url: $(form).attr('action'),
//         data: formData
//       })
//       .done(function(response) {
//         //Make sure the form Messages div has the success class
//         $(formMessages).removeClass('error');
//         $(formMessages).addClass('success');

//         // Set the message text
//         $(formMessages).text(response);

//         // Clear the form
//         $('#name').val('');
//         $('#email').val('');
//         $('#message').val('');
//       })
//       .fail(function(data) {
//         // Make sure the formMessages div has the 'error' class
//         $(formMessages).removeClass('success');
//         $(formMessages).addClass('error');

//         // Set the message text
//         if (data.responseText !== '') {
//             $(formMessages).text(data.responseText);
//         } else {
//             $(formMessages).text('Oops, an error occurred and your message could not be sent.'); 
//         }
//       });

//     });

//   });
//   
$(function() {


var mailgunURL;

// Get the messages div.
var formMessages = $('#form-messages');
    
mailgunURL = window.location.protocol + "//" + window.location.hostname + '/ajax/mailgun.php';

$('#mailgun').on('submit', function(e) {
  e.preventDefault();

  $('#mailgun *').fadeOut(200);
  $('#mailgun').prepend('Your submission is being processed ..');

  $.ajax({
    type     : 'POST',
    cache    : false,
    url      : mailgunURL,
    data     : $(this).serialize(),
    success  : function(data) {
      responseSuccess(data);
      console.log(data);
    },
    error : function(data) {
      console.log('Silent failure.');
    }
  });

  return false;

});

function responseSuccess(data) {

  data = JSON.parse(data);

  if(data.status === 'success') {
    // Make sure the form Messages div has the success class
    $(formMessages).removeClass('error');
    $(formMessages).addClass('success');

    $('#mailgun').html('Submission sent successfully.');

        $('#name').val('');
        $('#email').val('');
        $('#subject').val('');
        $('#message').val('');
  } else {
      // Make sure the formMessages div has the 'error' class
      $(formMessages).removeClass('success');
      $(formMessages).addClass('error');

      $('#mailgun').html('Submission failed.');
  }

}

});