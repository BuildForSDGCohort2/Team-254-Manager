<?php
class getFiles{
 function folders($directorie,$control){
  switch ($control) {
    case 'main_diretories':
     //gets all folders in the users main directory   
    $dir= $directorie;
    //$this->response=$dir;
   
    $folder =array_diff(scandir($dir),array('..','.'));
  if(count($folder) > 0){
    
     
    
    $this->response=json_encode($folder);
   
  //$array_push($folder,$cleanPath);
  // $array=array("folder"=>$folder,"path"=>$dir);
                   
    
    }
    else{
    
      $this->response='no folder';
    }
    

    
    break;
    case "sub_directories":
      $dir= $directorie;
     

    break;

    
             
    default:
                 # code...
    break;
         }
       
}
     
function response(){
         return $this->response;
     }
 }
?>