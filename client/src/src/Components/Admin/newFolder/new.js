$('document').ready(function(){
    $('#CreateFolder').click(function(){
          var path = $('#folderName').val();
          //var type = document.querySelector('input[name="checkbox"]:checked').value;
    if(!document.querySelector('input[name="checkbox"]:checked')){
    alert('you have to select file mode');
    }
    else{
    if(document.getElementById('readMe').checked){
    var type = document.querySelector('input[name="checkbox"]:checked').value;
    var readMe =document.getElementById('readMe').value;
    get_directory('',type,readMe);
             // alert(readMe);
    }
    else{
    var type = document.querySelector('input[name="checkbox"]:checked').value;
    var readMe = 'no';
    get_directory('',type,readMe);
    
    }
    }
          //window.location='?page=folder&path='+path+'';
          //window.location="?page=folder";
    })

 
 function get_directory(path,type,readMe){
    var path = $('#folderName').val();
    var control='LogedUser';
    var data='control='+control;
  
 $.ajax({
    type:'post',
    data:data,
    url:'server/index.php',
    success: function (responseText){
    var response = JSON.parse(responseText);
    //console.log(response);
    CreateFolder(response.directories+'/'+path,type,readMe,path,response.id);
  }
  })
 }   
 
function CreateFolder(newPath,type,readMe,folder,user){
  var control ='createFolder';
  var data ='newPath='+newPath+'&type='+type+'&readme='+readMe+'&folder='+folder+'&control='+control+'&user='+user;
$.ajax({
  type:'post',
  data:data,
  url:'server/index.php',
  success: function (responseText){
       // var response = JSON.parse(responseText);
  if(responseText === 'files path established'){
  window.location='?page=folder&path='+folder+'';
  }
  else{
    var response = JSON.parse(responseText);
    if(response.ok==='ok'){
       var FileName = folder;
       var data = 'your '+folder+'login id ='+response.rand;
       var  path = response.path;
       var  name = response.name;
       download(data,FileName,path,name);
    }
 // alert('couldnt create file');
  }
  
}
  })
}  


})

function download(textAreaval,FileName,path,name){
  var element = document.createElement('a');
  element.setAttribute('href','data:text/plain;charset=utf-8,'+encodeURIComponent(textAreaval));
  element.setAttribute('download',FileName);
  element.style.display='block';
  document.body.appendChild(element);
  //getUserDetails(element);
  element.click();
  window.location='?page=folder&path=control&project='+path+'&name='+name+'';
  document.body.removeChild(element);
  }


