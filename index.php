<?php
 	$title = 'Home';
    require_once 'includes/header.php';
?>

<center>
	<br><br><br><br><br><br>


<hr>
<img src="images/eventlogo.gif">
<hr>
<center>
<style>
	html,body{
  heigth:100%;width:100%;min-height:100%;position:relative;oberflow:hidden;
  color:#fff;
}
body {
  background: #45484d; /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover,  #45484d 0%, #000000 100%); /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,#45484d), color-stop(100%,#000000)); /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover,  #45484d 0%,#000000 100%); /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover,  #45484d 0%,#000000 100%); /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover,  #45484d 0%,#000000 100%); /* IE10+ */
  background: radial-gradient(ellipse at center,  #45484d 0%,#000000 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
  text-align:center;
}
[class*="BT"]{width:250px;display:block;position:absolute;padding:0;border-color:#0e0e0e;margin:0 0 10px;line-height:6px;border-style:solid;left:50%;margin-left:-125px;height:60px;}
[class*="BT"] hover{position:absolute;z-index:5;width:246px;margin-left:-370px;  transition: all 0.3s ease-out 0s;    background: -moz-linear-gradient(45deg,  rgba(255,255,255,0) 0%, rgba(135,135,135,0.38) 50%, rgba(255,255,255,0) 100%); /* FF3.6+ */background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,rgba(255,255,255,0)), color-stop(50%,rgba(135,135,135,0.38)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */background: -webkit-linear-gradient(45deg,  rgba(255,255,255,0) 0%,rgba(135,135,135,0.38) 50%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */background: -o-linear-gradient(45deg,  rgba(255,255,255,0) 0%,rgba(135,135,135,0.38) 50%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */background: -ms-linear-gradient(45deg,  rgba(255,255,255,0) 0%,rgba(135,135,135,0.38) 50%,rgba(255,255,255,0) 100%); /* IE10+ */background: linear-gradient(45deg,  rgba(255,255,255,0) 0%,rgba(135,135,135,0.38) 50%,rgba(255,255,255,0) 100%); /* W3C */filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#00ffffff',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */  height:60px;margin-top:-30px;}
[class*="OH"]{overflow:hidden;}
[class*="BR"]{border-width:2px;}
[class*="R6"]{border-radius:6px;}
[class*="NF"]{background:transparent;}
[class*="BT"]:hover hover{  margin-left:123px;}
[class*="TU"]{text-transform:uppercase;}
[class*="PT"]{cursor:pointer;}
[class*="BT"] span{  position:absolute;  width:200px;  margin-left:-100px;  z-index:3;}
canvas{margin: 0;padding: 0;display:block;position:absolute;margin-top:-30px;}
</style>
<br /><br /><br />
<p>
  <?php 
      if(!isset($_SESSION['email'])) {
      ?>
      <button id="button" onclick="location.href='userlogin.php'" class="BT-OH-BR-R6-NF-FH-FP-TU-PT">
      <canvas id="canvas"></canvas> 
      <hover></hover>
      <span style="color:#fff" ;>JOIN HERE</span>
      <?php
      }
      ?>
  </button>

</p>
<br /><br /><br /><br /><br /><br /><br /><br />



		
<br><br><br>
<?php
    require_once 'includes/footer.php';
?>