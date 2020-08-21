<?php
if(empty($_SESSION['f_phone'])){
    echo "<span> start chats</span>";
}else{
  $sld = mysqli_query($con,"SELECT * FROM message LIMIT 10");
  $dld = mysqli_num_rows($sld);
  if($dld !=0){
      $ph_f = $_SESSION['f_phone'];
            while($roste = mysqli_fetch_assoc($sld)){
                if($_phone === $roste['sender'] && $ph_f=== $roste['receiver']){?>
                <div  class="messo">
            <img src="<?php
             $slbx = mysqli_query($con,"SELECT * FROM users WHERE phone ='".$_phone."'");
             $rx = mysqli_fetch_assoc($slbx);
                echo $rx['photo'];
            ?>" style="float:right;" class="outgoing" alt="pro">
          <span class="messr"><?php echo $roste['message']?></span>
          <br>
          <br>
          <span style="float:right;"class="timer"><?php echo date('h:i A',strtotime($roste['time'])); ?></span>
          
        
                </div>  
                <br> 
               <?php }
               elseif($_phone === $roste['receiver'] && $ph_f === $roste['sender']){?>
               <div class="messo">
            <img src="<?php
             $slbxx =mysqli_query($con,"SELECT * FROM users WHERE phone ='".$ph_f."'");
             $rxx = mysqli_fetch_assoc($slbxx);
             echo $rxx['photo'];
            ?>" style="float:left;" class="income" alt="pro">
           <span class="mess"><?php echo $roste['message'];?></span>
            <br>
            <span class="time"><?php echo date('h:i A',strtotime($roste['time'])); ?></span>
           
               </div>
         <?php   }else{
              //echo "<center><span class='alert'>No Charts</span></center>";
             // exit();
         }

            }
  }else{
         echo "<span>No Charts</span>";
  }



   // <img src="../assets/upload/default.png" style="float:left;" class="income" alt="pro">
     //     <span class="mess">friend</span>
      //    <br>
     //     <span class="time">12.00pm</span>
    //  </div>

     // <div class="messo">
        
 }
?>

