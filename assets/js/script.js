jQuery(document).ready(function($) {

    $('.btn-accept').click(function(e){
       e.preventDefault();

       var token = $("input[name=_token]").val();
       var id = $(this).siblings("#pending_user_id").val();
       var email = $(this).siblings("#pending_user_email").val();
       console.log(token);
       console.log(id);
       console.log(email);
       // var id = id;
       // var email = email;

       $.ajax({
          //url: "{{URL::to('/send')}}",
          url: "send",
          type: "POST",
          async:false,
          data: {
              "_token":token,
              "done":1,
              "id":id,
              "email":email
          },
          success: function(data){
            //$('#mydiv').fadeIn('slow').html(response);
                //$('table').html(data);
                console.log(data);
                
            }
        });
       
       $(this).parent('td').parent('tr').remove();
       console.log('hello');
    });
});    

