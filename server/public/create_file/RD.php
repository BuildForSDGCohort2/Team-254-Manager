<?php
/*
//$dir = 'C:/xampp/htdocs/FileManager/server/directories/fxQSsbFwdyXYsvMnrNZkj2KQgEZGZqHibfkcLo8sJUw=/trying/';

class RD{
    
    public function directory($dir){
        $this->directory_children($dir);
    }

    public function directory_children($dir){
        
        $cleanPath = realpath($dir) . DIRECTORY_SEPARATOR;
        $scanDir = scandir($cleanPath);//read directory content
        echo $cleanPath;
        
        foreach($scanDir as $file){
            if($file == "." || $file == ".."){
                continue;
            }
           
          echo '<ul id="myUL">
        <div><span class="caret">'.$file.'</span>
          <ul class="nested">
            <li>Water</li>
            <li>Coffee</li>
            <span><span class="caret">Tea</span>
              <ul class="nested">
                <li>Black Tea</li>
                <li>White Tea</li>
                <span><span class="caret">Green Tea</span>
                  <div class="nested">
                    <li>Sencha</li>
                    <li>Gyokuro</li>
                    <li>Matcha</li>
                    <li>Pi Lo Chun</li>
                  </div>
                </span>
              </ul>
            </span>  
          </ul>
        </div>
        </ul>';
    
           
        
        if(is_dir($cleanPath.$file) && is_readable($cleanPath.$file)){
            //check if file is a directory then read it
              $this->directory_children($cleanPath.$file);
            }
        
        }
    

    
    }
}

   
  $RD = new RD();
  $RD->directory($dir);          
            
          
      

*/

?>