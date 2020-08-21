<?php
include 'conect.php';

?>
<nav id="nav">

<a href="auth/logout.php" class="logout">logout</a>
    <div class="menu">
        <div id="dot"></div>
        <div id="dot"></div>
        <div id="dot"></div>
    </div>
    <br>
    <br>
    <div id="hovers">
    <div id="box">
    <nav style="background-color:#00f999;" id="nav">
        <span onclick="toggle('FRIEND')" class="me">Friend+</span>
        <span onclick="toggle('PROFILE')" class="me">profile</span>
        <div onclick="toggle('CHATS')" id="cha">chats</div>
    </nav>
    <div id="FRIEND" style="display:none;">
      <center><span class="alert" id="gh"></span><center>
    <?php
    include '../php/auth/add.php';
    ?>
    </div>
    <div id="PROFILE" style="display:block;">
    <br>
    <img style="margin-left:40%;margin-top:20px;" class="incomE" src="<?php
$sl = mysqli_query($con,"SELECT photo FROM users where id='".$ID."' ");
$fetch = mysqli_fetch_assoc($sl);
echo $fetch['photo'];
?>">
<br>
<?php
include '../php/auth/photo.php';
 ?>
<form method="post" action="" enctype="multipart/form-data">
      <center><input type="file" name="image">
      <br>
      <button type="submit" style="width:40%;" name="upload" class="btn btn-secondary im_btn">Upload</button>
      <center>
      </form>
    </div>
    <div id="CHATS" style="display:none;">
    <?php
    //include '../php/auth/friends.php';
    include '../php/auth/Friend.php';
    ?>
    </div>
    <script>
       function toggle(id){
           if(id === 'FRIEND'){
               document.getElementById('FRIEND').style.display="block";
               document.getElementById('PROFILE').style.display="none";
               document.getElementById('CHATS').style.display="none";
           }
           if(id === 'PROFILE'){
            document.getElementById('FRIEND').style.display="none";
               document.getElementById('PROFILE').style.display="block";
               document.getElementById('CHATS').style.display="none";
           }if(id === 'CHATS'){
            document.getElementById('FRIEND').style.display="none";
               document.getElementById('PROFILE').style.display="none";
               document.getElementById('CHATS').style.display="block";
           }
       }
    </script>
    </div>
    </div>
</nav>

<div id="root">
<nav class="nav">
<img class="incomE" src="<?php
$sl = mysqli_query($con,"SELECT photo FROM users where id='".$ID."' ");
$fetch = mysqli_fetch_assoc($sl);
echo $fetch['photo'];
?>">
<div class="friends">
    <?php
    //include '../php/auth/friends.php';
    include '../php/auth/Friend.php';
    ?>
     
</div>
</nav>
    <section id="section">
        <div id="head">
        <img src="<?php 
        $d = '../assets/upload/profile.jpg';
        if(empty($_SESSION['meei'])){
                echo $d;
        }else{
             $df = $_SESSION['meei'];
            $s = mysqli_query($con,"SELECT photo FROM users where id='".$df."' ");
            $fetch = mysqli_fetch_assoc($s); 
            echo $fetch['photo'];
            //echo $dff;
        }
        ?>"
         style="float:left;" id="fr" alt="pro">
           
          <span class="timeE">
          
          <div class="num">
          <?php
            
             if(empty($_SESSION['f_name'])){
                 echo "avatar";
             }else{
                 echo $_SESSION['f_name'];;
             }
          ?>
          </div>
          <input type="hidden" id="pyi" value="<?php echo $_SESSION['f_name']?>">
             <i id="TIMER"><?php
                if(empty($_SESSION['f_name'])){
                    echo "loading";
                }else{
                    $fG= $_SESSION['f_name'];
                    $sdfi = mysqli_query($con,"SELECT * FROM users WHERE username = '".$fG."'");
                    $rop = mysqli_fetch_assoc($sdfi);
                    if($rop['status'] === 'on'){
                        echo "online";
                    }else{
                        echo "last seen".date('h:i A',strtotime($rop['logs']));
                    }
                }
             ?></i>
             <script>
             $(document).ready(function(){
                 var PH = $('#pyi').val();
                setInterval(function(){
              
               $("#TIMER").load("auth/TIME.php", {
                 PH:PH
               });
                }, 1000);
             });
             </script>
            </span>
          
          
        </div>

        <div  id="BDY">
       <!-- messges start-->
            <div id="bds">
            <?php
              include 'messo.php';
               ?>
    </div>
<!--messo end-->
            
        </div>




        <div id="foot">
           <input type="hidden" id="sender" value="<?php echo $_SESSION['phone'] ?>">
           <input type="hidden" id="friends_p" value="<?php echo $_SESSION['f_phone'] ?>">
          <textarea id="message" class="text"></textarea>
        
          
          <img onclick="sendd()" style="width:60px;" class="send" src="../assets/upload/icons.png"></div>
          
        
    </section>
    <script>
    function sendd(){
        var message = document.getElementById('message').value;
        var sender = document.getElementById('sender').value;
        var friends = document.getElementById('friends_p').value;
        document.getElementById('message').value = '';
        var see = 'message='+message + '&sender='+sender +'&friends='+friends;
        if(friends !==0){
               $.ajax({
                   type:'post',
                   data:see,
                   cache:false,
                   url:'auth/message.php',
                   success:function(html){
                      //alert(html); 
                   }
               });
        }else{
            alert('Chose afriend to start chart with');
        }
    }
    </script>
    <script>
        $(document).ready(function(){
           var data = setInterval(function(){
        
  
       $("#BDY").animate({
        scrollTop: $("#BDY")[0].scrollHeight},[0]);

       }, 1000); 

       var Bdy =document.getElementById('BDY');
       Bdy.addEventListener('scroll', function (){

        if(data !== null){
            clearInterval(data);
        } 
        data =  setInterval(function(){
        
  
        $("#BDY").animate({
         scrollTop: $("#BDY")[0].scrollHeight},[0]);
 
        }, 1000);   
        
       });
      

        });
      
    </script>

    <script>

         $(document).ready(function(){
             var PH = document.getElementById('friends_p').value;
            var commentCount = 10;
              setInterval(function(){
              commentCount = commentCount +10;
               $("#bds").load("auth/new.php", {
                 commentNewCount: commentCount,PH:PH
               });
                }, 1000);

        });

    </script>


</div>   