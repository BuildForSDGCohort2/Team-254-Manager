<?php
class Files{
    function folder($folder_name,$newpath,$type,$readMe){
        if($type ==='private'){
        switch ($readMe) {
        case 'yes':
         $path = "directories/$newpath";
         $make = mkdir("$path");
         if($make){
            $read= 'ReadMe.txt';
          if(fopen("$path/$read","w")){
           // $txt = "hello";
            //$myfile = fopen("$path/$read", "w") or die("Unable to open file!");
           //$txt = "John Doe\n";
             //fwrite($myfile, $txt);
            //$making=fwrite(fopen("","w"), $txt);
           // if(fwrite($myfile, $txt)){
              //  fclose(fopen("$path/$read","w"));
                $this->response="$path/$read";
            //}else{
            //    $this->response="failed to write";
           // }
            
            
          }else{
            $this->response=("Unable to open file!");
          }
              
             
         }else{
            $this->response='failed'; 
         }
                break;
        case 'no':
        $path = "directories/$newpath";
         $make = mkdir("$path");
         if($make){
             $this->response='created';
         }else{
            $this->response='failed'; 
         }
            break;    
            
            default:
                # code...
                break;
        }
    }
    elseif($type ==='public'){

      //start

      switch ($readMe) {
        case 'yes':
         $path = "project/$newpath";
         $make = mkdir("$path");
         if($make){
            $read= 'ReadMe.txt';
          if(fopen("$path/$read","w")){
           // $txt = "hello";
            //$myfile = fopen("$path/$read", "w") or die("Unable to open file!");
           //$txt = "John Doe\n";
             //fwrite($myfile, $txt);
            //$making=fwrite(fopen("","w"), $txt);
           // if(fwrite($myfile, $txt)){
              //  fclose(fopen("$path/$read","w"));
                $this->response="$path/$read";
            //}else{
            //    $this->response="failed to write";
           // }
            
            
          }else{
            $this->response=("Unable to open file!");
          }
              
             
         }else{
            $this->response='failed'; 
         }
                break;
        case 'no':
        $path = "project/$newpath";
         $make = mkdir("$path");
         if($make){
             $this->response='created';
         }else{
            $this->response='failed'; 
         }
            break;    
            
            default:
                # code...
                break;
        }

      //end
      
    
   }
         

        
    }


    
    function write($path){
      $myfile = fopen("$path", "w") or die("Unable to open file!");
      $txt = "$path";
      fwrite($myfile, $txt);
      $this->response=$path;
       fclose($myfile);
    }
    function createFolder($path){
    //  echo $path;
      $make = mkdir("$path");
      if($make){
         $this->response=$path;
      }
      
    }

   
    function file($newPath){
      $this->create($newPath);

   }

    function create($path){
      $myfile = fopen("$path", "w") or die("Unable to open file!");
      $txt = "<!--start writting-->";
      fwrite($myfile, $txt);
      $this->response=$path;
      fclose($myfile);
    }
    function commit($path,$value){
      $myfile = fopen("$path", "w") or die("Unable to open file!");
      $txt = "<!--start writting-->";
      fwrite($myfile, $value);
      $this->response='complete';
      fclose($myfile);
    }
    function renameFolder(){

    }
    
    function renameFile(){

    }
    
    function delete(){
        
    }
    function response(){
       return $this->response;
    }
}
?>