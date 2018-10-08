    /*global $*/
        $("#loginForm").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = $form.attr( 'action' );
         alert(url);
      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { email: $('#email').val(), password: $('#password').val(), token: $('#token').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
          //alert("success");
          alert(data);
          var data = JSON.parse(data);
          $('#error_field1').html(data.invalid_email);
          $('#error_field').html(data.error);
          //window.location = data.new_page;
          //var string_data = JSON.stringify(data);
          //alert(String(data.new_page));
          if(data.new_page){
            window.location = String(data.new_page);
          }
        });
      });
