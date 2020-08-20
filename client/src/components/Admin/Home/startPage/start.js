$('document').ready(function(){
  var control='LogedUser';
  var data='control='+control;

  $.ajax({
    type:'post',
    data:data,
    url:'server/index.php',
    success: function (responseText){
      var response = JSON.parse(responseText);
      main_diretories(response.id);
    }
})


function main_diretories(user_id){
  var control ='main_diretories';
  var data = 'control='+control +'&user='+user_id;
  $.ajax({
  type:'post',
  data:data,
  url:'server/index.php',
  success: function (responseText){
  if(responseText === 'no folder'){
  $('#folders').append('<center><h2>NO FOLDERS/FILES</h2><br><button>create new folder</button></center>');
  }
  else{
  var i=1;
  var response = JSON.parse(responseText);
  i++;
  $.each(response,function(index,value){
  $('#folders').append('<tr  class="open" id='+value+'><td>'+value+'</td></tr>');
  })
}
        
      }
  })
  }
  //open folders
$(document).on('click','.open',function(){
  var path = $(this).attr('id');
  
 
  //get_folders(response.id,response.directories);
  window.location='?page=folder&path='+path+'';
      //alert(response.directories)
  
  //window.location='?page=folder&path='+path+'';


});

$('#join').click(function(){
  var ID = $('#projectId').val();
  var control ='project';
  var data = 'control='+control +'&ID='+ID;
  $.ajax({
  type:'post',
  data:data,
  url:'server/index.php',
  success: function (responseText){
  
    var response = JSON.parse(responseText);
      if(response === 'NO'){
        alert('project doesnt exist')
      }else{
        window.location='?page=folder&path=control&project='+response.directory+'&name='+response.name+'';
      }
  }
})
})

  
  $('#new').click(function(){
    //var path = $(this).attr('id');
    
    $('#section').load('client/src/Components/Admin/newFolder/new.html');
  })
})
