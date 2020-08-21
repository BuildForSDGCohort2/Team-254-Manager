$('document').ready(function(){
   $('#Plus').click(function(){
   var paperclif = document.getElementById('contaiN');
    if(paperclif.style.width==="150px"){
     paperclif.style.width="0px";
     paperclif.style.height="0px";
     
    }else{
     paperclif.style.width="150px";
     paperclif.style.height="100px";
     
     
    } 
})

   const urlParams = new URLSearchParams(window.location.search);
   const path = urlParams.get('path');
   $('#Folder_name').html(path);
   var control='LogedUser';
   var data='control='+control;
 
   $.ajax({
     type:'post',
     data:data,
     url:'server/index.php',
     success: function (responseText){
        //console.log(responseText);
       var response = JSON.parse(responseText);
    $('#title').html(path);
     getfilelist( $('#Bodx') ,'directories/'+response.directories+'/'+path);
     }
     })

     
	$( '#Bodx' ).html( '<ul class="filetree start"><li class="wait">' + 'Generating Tree...' + '<li></ul>' );
	
	//getfilelist( $('#container') , 'FileManager' );
	
	function getfilelist( cont, root ) {
	
		$( cont ).addClass( 'wait' );
			
		$.post( 'server/Foldertree.php', { dir: root }, function( data ) {
	        if(data === ''){
				document.getElementById('headd').style.display='none';
			   $('#contents').html('<center><br><br><br><br><br><br><h2>NO FOLDERS/FILES</h2><br><button id="Upload" class="button">Add via upload</button></center>')
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
		} else {
			  /// reading selected file
			  var control='read';
			  var data='control='+control+'&path='+$(this).attr( 'rel' );
			$( '#selected_file' ).val($(this).attr( 'rel' ));
			$.ajax({
				type:'post',
				data:data,
				url:'server/index.php',
				success: function (responseText){
				
				 var response = JSON.parse(responseText);
				//console.log(response);
				


				 $('#contents').html('<li>'+response+'</li>');
				}
				})

		}
	return false;
	});
	

   //tree render end
    
 var modal =document.getElementById('myModal');
 //var Upload = document.getElementById('Upload');
 //var Upload_M = document.getElementById('Upload_M');
 var btn = document.getElementById('myBtn');

 var span = document.getElementsByClassName('close')[0];
// Upload.onclick = function(){
//	Upload_M.style.display ='block';
//}
 btn.onclick = function(){
	 modal.style.display ='block';
 }

 span.onclick = function(){
	modal.style.display ='none';
 }

 window.onclick = function(event){
	 if(event.target == modal){
		modal.style.display ='none';
	 }
 }

 var edit = document.getElementById('edit');
 

 edit.onclick=function(){
	 var table = document.getElementById('table').setAttribute('contenteditable','true');
	//var table = document.querySelectorAll("[contenteditable=false]");
	//table[0].setAttribute("contenteditable",true); 
 }
 

   })


  