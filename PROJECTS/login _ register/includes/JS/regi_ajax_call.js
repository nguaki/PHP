/*AJAX call to register backend code.*/
        /*global $*/
        $("#RegiForm").submit(function(event) 
        {

             /* stop form from submitting normally */
            event.preventDefault();

            /* get the action attribute from the <form action=""> element */
            var $form = $( this ),
          
            url = $form.attr( 'action' );
            var posting = $.post( url, { email: $('#email').val(),
                                   password: $('#password').val(),
                                   password_again: $('#password_again').val(),
                                   user_name:$('#user_name').val(),
                                   token: $('#token').val()
                                 } 
                            );

            /* Alerts the results */
            posting.done(function( data ) 
            {
                //alert("success");
                //alert(data);
                var data = JSON.parse(data);
                $('#error_field1').html(data.invalid_email);
                $('#error_field').html(data.error);
                if(data.new_page){
                    window.location = String(data.new_page);
                }
            });
      });