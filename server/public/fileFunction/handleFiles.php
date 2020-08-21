<?php
/*
class FileActions{
    function Update($path,$txt,$con){

    }
    function readFile($path){
        $myfile = fopen("$path","r")or die("unable to open");
        $a=0;
    /*
      $list = "<table id='table' contenteditable='false'>";
       $list .= " <tr>";
        $list .= "<th></th>";
        $list .= "<th></th>";
        $list .= "</tr>";
        
        $myfile = fopen("$path","r")or die("unable to open");
        $a=0;
        //$list = array();
        while(($line = fgets($myfile))!==false){
           //$list = array('number'=>$a,'text'=>$line);
           //$list[]= $a;
           $list= array($line);
           /*
            $list .= "<tr>";
            $list .= "<td style='color:blue;padding-right:10px; width:10px;border:1px solid white:'> $a </td>";
            
            $list .= "<td>$line</td>";
           
            $list .= "</tr>";
            
             $a++; 
             
            } 
            //$list .= "</table>";
            

            return $this->response= json_encode($list);
    }


    function response(){
        return $this->response;
    }
}
*/

class FileActions{
    function Update($path,$txt,$con){

    }
    function readFile($path){
        $myfile = fopen("$path","r")or die("unable to open");
        $a=0;
   
        $myfile = fopen("$path","r")or die("unable to open");
        $a=0;
        while(($line = fgets($myfile))!==false){
          
         $list[]=$line;
    
    
             $a++; 
         
            } 
            return $this->response=json_encode($list);
            
    }
    function readText($path){
      $myfile = fopen("$path","r")or die("unable to open");
        $a=0;
   
        $myfile = fopen("$path","r")or die("unable to open");
        $a=0;
        while(($line = fgets($myfile))!==false){
          
         $list[]=$line;
    
    
             $a++; 
         
            } 
            return $this->response=$list;
    }
 function upload($path,$files){
   $output='';
   $it=0;
  if(isset($_FILES['file']['name'][0])){
   $count= count($_FILES['file']['name'][0]);
    foreach($_FILES['file']['name'] as $key => $value){
        if(move_uploaded_file($_FILES['file']['tmp_name'][$key],$path.$value)){
            $output.='<img src="upload/'.$value.'">';
        }
        $it++;
    }
}
if($it === $count){
  $this->response='complete';
}

 }

 function download($path){
     //$filename = basename($path);
     if(file_exists($path)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($path).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($path));
            flush(); // Flush system output buffer
          $this->response(readfile($path));
          
            die();
        } else {
           echo  http_response_code(404);
	        die();
        
     }
 }

    function response(){
        return $this->response;
    }
}


?>