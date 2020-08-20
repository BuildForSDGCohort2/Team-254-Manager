$('document').ready(function(){
  $('#Plus').click(function(){
  var paperclif = document.getElementById('contaiN');
   if(paperclif.style.width==="150px"){
   paperclif.style.width="0px";
   paperclif.style.height="0px";
     
}
else
{
  paperclif.style.width="150px";
  paperclif.style.height="100px";
} 
})

 const urlParams = new URLSearchParams(window.location.search);
 const path = urlParams.get('path');
 if(path !=='control'){
$('#Folder_name').html(path);
 var control='LogedUser';
 var data='control='+control;
$.ajax({
 type:'post',
  data:data,
  url:'server/index.php',
  success: function (responseText){
  var response = JSON.parse(responseText);
  $('#title').html(path);
  getfilelist( $('#Bodx') ,'directories/'+response.directories+'/'+path);
  document.getElementById('Main_path').value='directories/'+response.directories+'/'+path+'/';
}
})

}else{
  const directory = urlParams.get('project');
  var name = urlParams.get('name');
    $('#title').html(name);
  //$('#Folder_name').html(name);
  getfilelist( $('#Bodx') ,directory);
  document.getElementById('Main_path').value=directory+'/';


 }

$( '#Bodx' ).html( '<ul class="filetree start"><li class="wait">' + 'Generating Tree...' + '<li></ul>' );
	
   function getfilelist( cont, root ) {
   $( cont ).addClass( 'wait' );

$.post( 'server/Foldertree.php', { dir: root }, function( data ) {
	if(data === ''){
	document.getElementById('headd').style.display='none';
	document.getElementById('contents').style.display='none';
	document.getElementById('drop').style.display='block';
	document.getElementById('progressBars').style.backgroundColor='cadetblue';
	document.getElementById('progressBar').style.backgroundColor='cadetblue';
	$('#progressBar').width('0%');
	$('#progressBars').width('0%');
	$('#progressBar').html('');
	$('#progressBars').html('');
	}
	$( cont ).find( '.start' ).html( '' );
	$( cont ).removeClass( 'wait' ).append( data );
	if( 'Sample' == root ) 
	$( cont ).find('UL:hidden').show();
	else 
	$( cont ).find('UL:hidden').slideDown({ duration: 500, easing: null });		
});
	}
	
$( '#Bodx' ).on('click', 'LI A', function() {
	var entry = $(this).parent();
	if( entry.hasClass('folder') ) {
	$('#folderNamee').html($(this).html());
	$('#selectedFolder').val($(this).attr( 'rel' ));
	$('#progress').val('');
	$('#progress-text').html('');
	$('#remaining').html('');
	$( '#path' ).val($(this).attr( 'rel' ));
	document.getElementById('downloadZip').style.display='block';
	document.getElementById('anchor').style.display='none';
	if( entry.hasClass('collapsed') ) {
    $( '#path' ).val($(this).attr( 'rel' ));//push path to hidden input
	entry.find('UL').remove();
	getfilelist( entry, escape( $(this).attr('rel') ));
	entry.removeClass('collapsed').addClass('expanded');
	}
	else {		
	entry.find('UL').slideUp({ duration: 500, easing: null });
	entry.removeClass('expanded').addClass('collapsed');
	}
  }   
	else{
			  /// reading selected file
	document.getElementById('headd').style.display='block';
	document.getElementById('contents').style.display='block';
	document.getElementById('drop').style.display='none';
	$('#commit').attr('disabled','disabled');
	$('#File_name').html($(this).html())
	$('#contents').html('');
	document.getElementById('contents').innerHTML='<center><img src="client/assets/images/loading.gif">wait</center>';
	var control='read';
	var data='control='+control+'&path='+$(this).attr( 'rel' );
	$( '#path' ).val('');
	$( '#selected_file' ).val($(this).attr( 'rel' ));
	$('#folderNamee').html($(this).html());
	$('#selectedFolder').val($(this).attr( 'rel' ));
	document.getElementById('downloadZip').style.display='block';
	document.getElementById('anchor').style.display='none';
	$('#progress').val('');
	$('#progress-text').html('');
	$('#remaining').html('');
$.ajax({
	type:'post',
	data:data,
	url:'server/index.php',
	success: function (responseText){
	var text = $("<div id='contents'/>");
	$('#contents').replaceWith(text);
	var response = JSON.parse(responseText.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'));
	$('#contents').html('');
	document.getElementById('contents').setAttribute('contenteditable','false');
$.each(response, function(index, value){
	$('#contents').append('<span class="padding">'+index+":"+'</span>'+'<span class="values">'+value+'</span>'+'<br>');
	});
			
}
})
   }
return false;
});
	//reading file created
function read(root){

  /// reading selected file
  document.getElementById('headd').style.display='block';
  $('#contents').html('');
  $('#commit').attr('disabled','disabled');
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
  var response = JSON.parse(responseText.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'));
  $('#contents').html('');
document.getElementById('contents').setAttribute('contenteditable','false');
$.each(response, function(index, value){
$('#contents').append('<span class="padding">'+index+":"+'</span>'+'<span>'+value+'</span>'+'<br>');
});

}
})
}
//reading file created end
   //tree render end

 //MODALS handle START
 var upload_Modal= document.getElementById('upload_Modal');
 var upload_modal_btn = document.getElementById('upload_btn');
 var modal =document.getElementById('myModal');
 var folderModal = document.getElementById('folderModal');
 var folderBtn = document.getElementById('folderBtn');
 var btn = document.getElementById('myBtn');
 var downloaadModal = document.getElementById('downloaadModal');
 var downloadBtn = document.getElementById('download');
 
 
 downloadBtn.onclick = function(){
	downloaadModal.style.display='block';
 }
 folderBtn.onclick = function(){
	 folderModal.style.display ='block';
 }
 upload_modal_btn.onclick=function(){
	 upload_Modal.style.display='block';
 }
 var Seatings = document.getElementsByClassName('seatings')[0];
 var closeDownload = document.getElementsByClassName('download')[0];
 var closeUpload = document.getElementsByClassName('closeUpload')[0];
 var closeFolder = document.getElementsByClassName('closeFolder')[0];
 var span = document.getElementsByClassName('closeFile')[0];
 
 Seatings.onclick=function(){
  var Seatings = document.getElementById('mySeatings');
  //Seatings.onclick = function(){
    
 // }
  //downloadBtn.onclick = function(){
   Seatings.style.display='none';
 }

closeDownload.onclick = function(){
 downloaadModal.style.display='none';
}
btn.onclick = function(){
  modal.style.display ='block';
 }
closeUpload.onclick=function(){
  upload_Modal.style.display='none';
 }
 closeFolder.onclick = function(){
  folderModal.style.display ='none';
 }
 span.onclick = function(){
	modal.style.display ='none';
 }

 window.onclick = function(event){
  if(event.target == modal){
  modal.style.display ='none';
  }
  if(event.target == folderModal){
   folderModal.style.display='none';
 }
  if(event.target == upload_Modal){
  upload_Modal.style.display='none';
  }
 if(event.target == downloaadModal){
  downloaadModal.style.display='none';
}
 }
//modals handle end
 var edit = document.getElementById('edit');
 edit.onclick=function(){

 $('#commit').removeAttr('disabled');
  var data = Array();
  var values = document.getElementsByClassName('values');
  for(var i=0;i<values.length;i++){
  data.push(values[i].innerHTML);
 }
  document.getElementById('contents').setAttribute('contenteditable','true');
  var text = $("<textarea spellcheck='false' id='contents'/>");
  $('#contents').replaceWith(text);
  var path =document.getElementById('selected_file').value;
  var control='read';
  var data='control='+control+'&path='+path;
  $( '#path' ).val('');
  //$( '#selected_file' ).val(root);

$.ajax({
  type:'post',
  data:data,
  url:'server/index.php',
  success: function (responseText){
  let data = JSON.parse(responseText);
  var arrayString= data.join();
  var str2 = arrayString.replace(/,/g," ");
  text.val(str2)
		}
})
text.focus();
	
 }

 

 //create file start
 var createFile = document.getElementById('createFile');
createFile.onclick=function(){
  var FileNAME = document.getElementById('fileName').value;
  var path = document.getElementById('path').value;
  var newFile = path+FileNAME;
  var control='createFile';
  var data='control='+control+'&file='+newFile;
  if(path === ''){
  alert('you have to select a folder to create file to')
  modal.style.display ='none';
  }else{
   if(FileNAME === ''){
  alert('provide a file name') ;
  }else{
$.ajax({
  type:'POST',
  url:'server/index.php',
  data:data,
  cache:false,
  success:function(response){
  if(response === newFile){
  $('#File_name').html(FileNAME)
  $('#commit').attr('disabled','disabled');
  reloadTree();
  read(response);
  modal.style.display ='none';

  }else{
  alert(response);
}
}
})
}
}
}
 //create file end
 

 //create folder start

var createFolder = document.getElementById('createFolder');
 createFolder.onclick=function(){
 var FileNAME = document.getElementById('folderName').value;
 var path = document.getElementById('path').value;
 var newFile = path+FileNAME;
 var control='create_Folder';
 var data='control='+control+'&folder='+newFile;
 if(path === ''){
 alert('you have to select a folder/e.g main directory or sub')
 folderModal.style.display ='none';
 }else{
  if(FileNAME === ''){
  alert('provide a file name') ;
}else{

$.ajax({
  type:'POST',
  url:'server/index.php',
  data:data,
  cache:false,
  success:function(response){
  if(response === newFile){
  $('#commit').attr('disabled','disabled');
  reloadTree();
  read(response);
  folderModal.style.display ='none';

 }else{
 alert(response);
}
}
})
}
}
}

 // create folder end
function reloadTree(){
$('#commit').attr('disabled','disabled');
$('#Bodx').html('');
const urlParams = new URLSearchParams(window.location.search);
const path = urlParams.get('path');
$('#Folder_name').html(path);
if(path === 'control'){
  const directory = urlParams.get('project');
  var name = urlParams.get('name');
    $('#title').html(name);
  //$('#Folder_name').html(name);
  getfilelist( $('#Bodx') ,directory);
  document.getElementById('Main_path').value=directory+'/';
}else{
 var control='LogedUser';
 var data='control='+control;
  
$.ajax({
 type:'post',
 data:data,
 url:'server/index.php',
 success: function (responseText){
 var response = JSON.parse(responseText);
 $('#title').html(path);
 document.getElementById('progressBars').style.backgroundColor='cadetblue';
 document.getElementById('progressBar').style.backgroundColor='cadetblue';
 $('#progressBar').width('0%');
 $('#progressBars').width('0%');
 $('#progressBar').html('');
 $('#progressBars').html('');
 getfilelist( $('#Bodx') ,'directories/'+response.directories+'/'+path);
 document.getElementById('Main_path').value='directories/'+response.directories+'/'+path+'/';
}
})
}
 }
var tittle = document.getElementById('title');
tittle.onclick=function(){

 $('#progress').val('');
 $('#progress-text').html('');
 $('#remaining').html('');
 var Main_path = document.getElementById('Main_path').value;
 document.getElementById('path').value=Main_path;
 $('#folderNamee').html(tittle.innerHTML);
 $('#selectedFolder').val(Main_path);
 document.getElementById('downloadZip').style.display='block';
 document.getElementById('anchor').style.display='none';
}

//drag and drop start
$('.file_drag_area').on('dragover',function(){
 $(this).addClass('file_drag_over');
	return false;
});
$('.file_drag_area').on('dragleave',function(){
 $(this).removeClass('file_drag_over');
})
$('.file_drag_area').on('drop',function(e){
 e.preventDefault();
 $(this).removeClass('file_drag_over');
 var formData = new FormData();
 var files = e.originalEvent.dataTransfer.files;
 
 for(var i=0;i<files.length;i++){
   formData.append('file[]',files[i]);
}
 formData.append('control',"upload");
 formData.append('path',document.getElementById('path').value);
 if(document.getElementById('path').value !== ''){
$.ajax({
  xhr:function(){
  var xhr = new window.XMLHttpRequest();
  xhr.upload.addEventListener("progress",function(evt){
  if(evt.lengthComputable){
  var  percentComplete = evt.loaded/evt.total;
  percentComplete = parseInt(percentComplete *100);
  $('#progressBar').width(percentComplete +'%');
  $('#progressBars').width(percentComplete +'%');
  $('#progressBars').html(percentComplete +'%');
  $('#progressBar').html(percentComplete +'%');
 }
},false);
	return xhr;
},
  type:'post',
  data:formData,
  contentType:false,
  cache:false,
  processData:false,
  url:'server/index.php',
  beforeSend:function(){
  $('#progressBar').width('0%');
  $('#progressBars').width('0%');
  $('#progressBars').html('<img src="client/assets/images/loading.gif">');
  $('#progressBar').html('<img src="client/assets/images/loading.gif">');
},
  error:function(){
  $('#progressBar').html('upload failed please try again ');
},
success: function (responseText){
  $('#progressBar').html('100%'+responseText);
  $('#progressBars').html('100%'+responseText);
}
})
}else{
  document.getElementById('progressBars').style.backgroundColor='red';
  document.getElementById('progressBar').style.backgroundColor='red';
  $('#progressBar').width('100%');
  $('#progressBars').width('100%');
  $('#progressBar').html('upload path not define');
  $('#progressBars').html('upload path not defined');
}

})
 //drag and drop end

// selct for upload buttons
 var select = document.getElementById('select');
 select.style.borderBottom='2px solid brown';
 var drop = document.getElementById('drops');
 var drop_page = document.getElementById('drag');

 drop.onclick=function(){
 drop_page.style.display='block';
 drop.style.borderBottom='2px solid brown';
 select.style.borderBottom='0px solid brown';
 document.getElementById('selects').style.display='none';
}

select.onclick=function(){
 drop.style.borderBottom='0px solid brown';
 select.style.borderBottom='2px solid brown';
 document.getElementById('selects').style.display='block';
 drop_page.style.display='none';
}
var upload = document.getElementById('select_file');

$('#upload_form').on('submit',function(e){
 e.preventDefault();
 var values = new FormData(this);
 values.append('control',"upload");
 values.append('path',document.getElementById('path').value);
 if(document.getElementById('path').value !==''){

$.ajax({
 xhr:function(){
 var xhr = new window.XMLHttpRequest();
 xhr.upload.addEventListener("progress",function(evt){
 if(evt.lengthComputable){
 var  percentComplete = evt.loaded/evt.total;
 percentComplete = parseInt(percentComplete *100);
 $('#progressBard').width(percentComplete +'%');
 $('#progressBard').html(percentComplete +'%');
			  //percentComplete === 100
}
},false);
 return xhr;
},
 type:'post',
 data:values,
 contentType:false,
 cache:false,
 processData:false,
 url:'server/index.php',
 beforeSend:function(){
 $('#progressBard').width('0%');
 $('#progressBard').html('<img src="client/assets/images/loading.gif">');
 },
 error:function(){
	//	$('#progressBar').html('upload failed please try again ');
},
success: function (responseText){
 if(responseText === 'complete'){
 $('#progressBard').html('100%'+responseText);
 }
}
})
}else{
 alert('path not defined');
}
})

var downloadZip = document.getElementById('downloadZip');
downloadZip.onclick = function(){
  downloadZip.innerHTML='<img style="width:20px;height:20px;" src="client/assets/images/loading.gif">...wait';
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
 var control = 'zippe';
 var data = 'folder='+folderName+'&dir='+selectedFolder+'&control='+control+'&userid='+response.id;
 $.ajax({
 type:'POST',
 url:'server/index.php',
 cache:false,
 data:data,
 success:function(responseText){
 var response = JSON.parse(responseText)
 //alert(responseText)
 download(response.path,response.zipe);
}
		   
 });
}else{
 $('#folderNamee').html('no folder/file selected');
}

}
})
  
}


function download(path,zip){
 var ajax = new XMLHttpRequest();
 ajax.responseType = "blob";
 ajax.open('GET',path,true);
 //alert(zip);
 ajax.send();
 var progress = document.getElementById('progress');
 var progressText = document.getElementById("progress-text");
 var remaining = document.getElementById('remaining');
 var start = new Date().getTime();
    
ajax.onreadystatechange = function(){
 if(this.readyState == 4 && this.status == 200){
 var obj = window.URL.createObjectURL(this.response);
 document.getElementById("anchor").setAttribute("href",obj);
 document.getElementById("anchor").setAttribute("download",zip);

 document.getElementById('downloadZip').style.display='none';
 document.getElementById('anchor').style.display='block';
			
 setTimeout(function(){
 window.URL.revokeObjectURL(obj);
 }, 60 * 1000);
 }
 };
ajax.onprogress =  function(e){
progress.max = e.total;
progress.value = e.loaded;
var percent = (e.loaded / e.total) * 100;
percent = Math.floor(percent);
progressText.innerHTML = percent + "%";
 var end = new Date().getTime();
 var duration = (end - start) /1000;
 var bps = e.loaded / duration;
 var kbps = bps / 1024;
 kbps = Math.floor(kbps);
 var time = (e.total - e.loaded) / bps;
 var seconds = time % 60;
 var minutes = time /60;
 seconds = Math.floor(seconds);
 minutes = Math.floor(minutes);
 remaining.innerHTML = kbps +'KB/s' +minutes + "minutes" + seconds + "seconds";
};
}
//select for upload ends
})