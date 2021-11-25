    <?php
        $title = 'Log in';
        require_once 'includes/header.php';
        session_unset();
        session_destroy();
    ?>

      <div align="center">
        <br><br><br><br>
        <img src="images/eventlogo.gif" >
      </div>
<br> <br> <br>
<link rel="stylesheet" href="css/index.css">

  <div class="container">
    <style type="text/css">  a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
 }</style>
 <form action="login.php" method="POST">
 	<?php if (isset($_GET['error'])) { ?>
 		<p class="error"><?php echo $_GET['error']; ?></p>
 	<?php } ?>

    <label for="email"><b>Email:</b></label>
    <input type="text" placeholder="Enter email" name="email" id="email"required>

    <label for="password"><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password"required>

    <button type="submit" name="btnLogin" id="btnLogin" >LOGIN</button>

    	</form>
    	<hr>
    	<center>Don't have an account?</center>
      <button onclick="location.href='register.php'">REGISTER</button>
      
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <div align="right">
    <br>
    <span class="psw"><a href="#">Forgot password?</a></span>
  </div>
  </div>

    <?php
        require_once 'includes/footer.php';
    ?>