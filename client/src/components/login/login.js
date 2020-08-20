$('document').ready(function(){
    $('#Sign-In').click(function(){
        var email = $('#email').val();
        var control = 'login';

        
        document.getElementById('loading').innerHTML='<img src="client/assets/images/loading.gif">';
        
        var password = $('#password').val();
        var data = 'email='+email +'&password='+password +'&control='+control;
        if(email !=''){
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
            if(password !=''){
               $.ajax({
                type:'post',
                data:data,
                cache:false,
                url:'server/index.php',
                success: function (responseText){
                    console.log(responseText)
                   if(responseText === '1'){
                    $('#pass_err').html('')
                    $('#email_err').html('email not found:please register');
                    document.getElementById('loading').innerHTML='';
                   }
                   else if(responseText === '2'){
                    $('#pass_err').html('wrong password')
                    $('#email_err').html('');
                    document.getElementById('loading').innerHTML='';
                   }
                   else{
                       console.log(responseText)
                       //var response = JSON.parse(responseText);
                       //alert(response.email)
                       window.location="?page=admin";
                       //console.log(response);
                   }
                }
               })
            }
            else{
                $('#pass_err').html('please provide your password')
                $('#email_err').html('');
                document.getElementById('loading').innerHTML='';
            }
        }
        else{
            $('#email_err').html('wrong email format');
            $('#pass_err').html('');
            document.getElementById('loading').innerHTML='';
          }
        }
        else{
            $('#email_err').html('please provide your email');
            $('#pass_err').html('');
            document.getElementById('loading').innerHTML='';
        }
    })
})