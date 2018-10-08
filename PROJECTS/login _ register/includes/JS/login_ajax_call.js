/*AJAX call to login backend code.*/
        /*global $*/
        $("#loginForm").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = $form.attr( 'action' );
      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { email: $('#email').val(), password: $('#password').val(), token: $('#token').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
          //alert(data);
          var data = JSON.parse(data);
          $('#error_field').html(data.error);
          if(data.new_page){
            window.location = String(data.new_page);
          }
        });
      });
