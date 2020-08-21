<?php
 $dir= 'directories/byMLCzrVK5FWEOBEclrAreMjMy3RuWIfHc2hIhLxr8=';
 //$this->response=$dir;

$folder =array_diff(scandir("$dir"),array('..','.'));
if(count($folder) > 0){
 
  foreach($folder as $x){
      echo $x;
  }
 
// $this->response=json_encode($folder);

//$array_push($folder,$cleanPath);
// $array=array("folder"=>$folder,"path"=>$dir);
                
 
 }
 else{
 
   $this->response=json_encode('no folder');
 }
?>