<html>
<head>
<title>
Ultimate Engineer
</title>
</head>

<link rel="stylesheet" href="css/materialize.min.css">
<link rel="stylesheet" href="css/extra.css">
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/extra.js"></script>

<body>

<!--Navbar with logo-->
<div id="logo" class="navbar center">
<nav  style="height:15%" class="blue darken-4">
<div class="row ">
<img src="logo.png" class="col s12">

</div>
</nav>
</div>
<!--Navbar with logo end-->


<!--Navbar with tabs-->
  <div id="nav" class="navbar row z-depth-2">
  <nav style="height:13%;padding:1%" class=" blue darken-4">
	<div class="center white-text " style="font-size:60px">Ultimate Maze</div>
  </nav>
</div>
<!--Navbar with tabs ends-->
  
  
  <?php
  $regno=$_COOKIE["regno"];
  include_once('data_connect.php');
  include_once('core.php');
if(isset($_POST['1'])&&isset($_POST['2'])&&isset($_POST['3'])&&isset($_POST['4'])&&isset($_POST['5'])&&isset($_POST['6'])){
$v1=$_POST['1'];
$v2=$_POST['2'];
$v3=$_POST['3'];
$v4=$_POST['4'];
$v5=$_POST['5'];
$v6=$_POST['6'];
$query1="update user set B1='$v1' where RegistrationNumber='$regno'";
mysql_query($query1);
$query1="update user set B2='$v2' where RegistrationNumber='$regno'";
mysql_query($query1);
$query1="update user set B3='$v3' where RegistrationNumber='$regno'";
mysql_query($query1);
$query1="update user set B4='$v4' where RegistrationNumber='$regno'";
mysql_query($query1);
$query1="update user set B5='$v5' where RegistrationNumber='$regno'";
mysql_query($query1);
$query1="update user set B6='$v6' where RegistrationNumber='$regno'";
mysql_query($query1);
header('Location: last.php');
}
  ?>
  
<!--Content below navbar-->
<div class='container row'>
<form method="post" action="<?php echo $current_file;?>">
<div class="center">
<h3 class='header light'>You have successfully completed this round. Kindly fill your branch preference for the next round.</h3>
<div class="input-field col s10 offset-s1">
<input type="text" id="1" name="1" class="validate" >
<label for="1">1</label>
</div>
<div class="input-field col s10 offset-s1">
<input type="text" id="2" name="2" class="validate" >
<label for="2">2</label>
</div>
<div class="input-field col s10 offset-s1">
<input type="text" id="3" name="3" class="validate" >
<label for="3">3</label>
</div>
<div class="input-field col s10 offset-s1">
<input type="text" id="4" name="4" class="validate" >
<label for="4">4</label>
</div>
<div class="input-field col s10 offset-s1">
<input type="text" id="5" name="5" class="validate" >
<label for="5">5</label>
</div>
<div class="input-field col s10 offset-s1">
<input type="text" id="6" name="6" class="validate" >
<label for="6">6</label>
</div>
<div class="col s5 offset-s5">
<button class="btn red darken-1 large waves-effect waves-light col s5 offset-s1" type="submit" name="action">Submit
    <i class="mdi-content-send right"></i>
  </button>
</div>
</div>
</form>
</div>  
<!--Content below navbar ends -->
  
</body>
</html>