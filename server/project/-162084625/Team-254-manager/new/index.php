<?php
include 'Components/body/functions/head.php';
?>
<div class="auths"><button onclick="log()" class="login-bt">Login</button><button onclick="reg()" class="reg-bt">Register</button></div>
<div id="root">
</div>
<script>
$(document).ready(function(){
      $('#root').load('Components/body/auth/login.php');
});
function log(){
  $('#root').load('Components/body/auth/login.php');
}
function reg(){
$('#root').load('Components/body/auth/register.php');
 }
</script>

<?php
include 'Components/body/functions/foot.php';
?>
