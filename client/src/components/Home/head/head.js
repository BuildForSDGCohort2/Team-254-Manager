$('document').ready(function(){
        
    $('#Logout').click(function(){
        $.ajax({
            type:'GET',
            url:'server/public/control/logout.php',
            success: function (responseText){
                if(responseText === 'ok'){
                    window.location="?";
                }
            }
    })
})


$('#settings').on('click',function(){
    var Seatings = document.getElementById('mySeatings');
     //Seatings.onclick = function(){
       
    // }
     //downloadBtn.onclick = function(){
      Seatings.style.display='block';
     //}
        
    })

    $('.seatings').on('click',function(){
        var Seatings = document.getElementById('mySeatings');
    //Seatings.onclick = function(){
      alert('OK')
   // }
    //downloadBtn.onclick = function(){
    Seatings.style.display='none';
    })


    $('#signUp').click(function(){
        $('#root').load('client/src/Components/register/register.html');
        
    })
    $('#signIn').click(function(){
        $('#root').load('client/src/Components/login/login.html');
    });
    $('#Forums').click(function(){
        $('#root').load('client/src/Components/Forums/Forum.html');
       });
})