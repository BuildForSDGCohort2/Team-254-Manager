var button = document.getElementById('button');

$('#button').click(function(){
   
var src =document.getElementById('selected_file').value;  
var FileName = document.getElementById('File_name').innerHTML;
 if(src !==''){
download(src,FileName);
}else{
alert('you have to selct file for download');
}
})
  
function download(textAreaval,FileName){
var element = document.createElement('a');
element.setAttribute('href','server/download.php?file='+textAreaval);
element.setAttribute('download',FileName);
element.style.display='block';
document.body.appendChild(element);
getUserDetails(element);
element.click();
document.body.removeChild(element);
}
// edit file start


function read2(root){

     /// reading selected file
document.getElementById('headd').style.display='block';
document.getElementById('contents').innerHTML='<center><img src="client/assets/images/loading.gif">wait</center>';
var control='read';
var data='control='+control+'&path='+root;
$( '#path' ).val('');
$( '#selected_file' ).val(root);
$.ajax({
 type:'post',
 data:data,
 url:'server/index.php',
 success: function (responseText){
 $('#contents').html('');
$('#contents').val(responseText);

}
})
   
}

$('#commit').on('click',function(){
 var values = document.getElementById('contents').value;
 var mainPath = document.getElementById('selected_file').value;
 var modified = $('#File_name').html();
 var contro='LogedUser';
 var dat='control='+contro;
 $('#commit').html('<img style="width:20px;height:20px;" src="client/assets/images/loading.gif">');
  
 $.ajax({
  type:'post',
  data:dat,
  url:'server/index.php',
  success: function (responseText){
  var contro='commit';     
  var response = JSON.parse(responseText);
  var userid = response.id;
  var data = 'userid='+userid+'&values='+values+'&mainPath='+mainPath+'&modified='+modified+'&control='+contro;

  
 $.ajax({
  type:'post',
  data:data,
  url:'server/index.php',
  success: function (responseText){
  if(responseText === 'complete'){
      $('#commit').html('<span  class="fa fa-check"></span>');
      setTimeout(function(){
          $('#commit').html('commit')
     }, 1000);
  }
  }
})



  }
 })
 
})

function getUserDetails(){
     var contro='LogedUser';
var dat='control='+contro;
 
$.ajax({
 type:'post',
 data:dat,
 url:'server/index.php',
 success: function (responseText){
 var response = JSON.parse(responseText);
 var folderName=$('#folderNamee').html();
 var selectedFolder = $('#selectedFolder').val();
 if(selectedFolder !== ''){
 var control = 'downlodedFile';
 var data = 'folder='+folderName+'&dir='+selectedFolder+'&control='+control+'&userid='+response.id+'&path='+$('#path').val();
 $.ajax({
 type:'POST',
 url:'server/index.php',
 cache:false,
 data:data,
 success:function(responseText){
   if(responseText === 'good'){
     element.click();
   }
}
		   
 });
}else{
 $('#folderNamee').html('no folder/file selected');
}

}
})




}