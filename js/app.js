$(function() {
    // Get the form.
    var form = $('#ajax-contact');

    // Get the messages div.
    var formMessages = $('#form-messages');

    // TODO: The rest of the code will go here...
    
    // Event listener to intercept submit event on form
    $(form).submit(function(e) {
      // Stop the browser from submitting the form
      e.preventDefault();

      //Serialise the form data
      var formData = $(form).serialize();

      // Submit the form using AJAX
      $.ajax({
        type: 'POST',
        url: $(form).attr('action'),
        data: formData
      })
      .done(function(response) {
        //Make sure the form Messages div has the success class
        $(formMessages).removeClass('error');
        $(formMessages).addClass('success');

        // Set the message text
        $(formMessages).text(response);

        // Clear the form
        $('#name').val('');
        $('#email').val('');
        $('#message').val('');
      })
      .fail(function(data) {
        // Make sure the formMessages div has the 'error' class
        $(formMessages).removeClass('success');
        $(formMessages).addClass('error');

        // Set the message text
        if (data.responseText !== '') {
            $(formMessages).text(data.responseText);
        } else {
            $(formMessages).text('Oops, an error occurred and your message could not be sent.'); 
        }
      });

    });

  });