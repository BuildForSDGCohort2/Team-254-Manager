$('document').ready(function(){
    $('#Sign-Up').click(function(){
        //document.getElementById('loading').innerHTML='<img src="client/assets/images/loading.gif">';
        var email = $('#email').val();
        var control = 'Register';
        var password = $('#password').val();
        var confirm = $('#confirm').val();
        var username = $('#username').val();
        var data = 'email='+email +'&password='+password +'&control='+control +'&username='+username;
        
        if(email !=''){
       if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
       if(password !=''){
       if(password === confirm){
       if(username !=''){
        $.ajax({
         type:'post',
         data:data,
         url:'server/index.php',
         cache:false,
         success:function(responseText){
         $('#success').html(responseText);
        }
     })
        }else{
    $('#name_err').html('username required');
     }
    }else{
    $('#pass_err').html('password dint much');
     }
    }else{
    $('#pass_err').html('password required');
     }
    }else{
    $('#email_err').html('wrong email format');
        }
    }else{
        $('#email_err').html('email required');
    }

   })
 })