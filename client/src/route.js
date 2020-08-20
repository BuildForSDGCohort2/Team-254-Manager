$('document').ready(function(){
    const urlParams = new URLSearchParams(window.location.search);
    const page = urlParams.get('page');

    $.ajax({
        type:'GET',
        url:'server/public/control/control.php',
        success: function (responseText){
            if(responseText === 'ok'){
                if(page == ''){
                    $('#root').load('client/src/Components/login/login.html');
                    }
                    else if(page == 'admin'){
                     $('#root').load('client/src/Components/Admin/Home/home.html');
                    }
                    else if(page == 'folder'){
                        $('#root').load('client/src/Components/Admin/newFolder/createdFolder/folder.html');
                    }
                    else{
                       
                        $('#root').load('client/src/Components/login/login.html');
                    }
            }
            else if(responseText==='false'){
                $('#root').load('client/src/Components/login/login.html');
            }
        }
    })
    
   
});