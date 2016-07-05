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
  include_once('data_connect.php');
  include_once('core.php');
if(isset($_POST['name'])&&isset($_POST['rn'])&&isset($_POST['mn'])){
$name=$_POST['name'];
$mobile=$_POST['mn'];
$regno=$_POST['rn'];
$branch=$_POST['group1'];

if(!empty($name)&&!empty($mobile)&&!empty($regno)){
$querycheck="select Name from user where RegistrationNumber='$regno'";
if(!mysql_num_rows(mysql_query($querycheck))){
$query="insert into user(Name,RegistrationNumber,MobileNumber,QS_no) values('$name','$regno','$mobile',1)";
mysql_query($query);
setcookie("qno",1, time() + (86400 * 1), "/");
setcookie("regno",$regno, time() + (86400 * 1), "/");
setcookie("start",microtime(true), time() + (86400 * 1), "/");
}
$queryget="select QS_no from user where RegistrationNumber='$regno'";
setcookie("qno",implode(mysql_fetch_row(mysql_query($queryget)))); 
if($branch==1){
$query="update user set Branch='CS' where RegistrationNumber='$regno'";
mysql_query($query);
header('Location: cs.php');
}
else if($branch==2){
$query="update user set Branch='ELEC' where RegistrationNumber='$regno'";
mysql_query($query);
header('Location: elec.php');
}
else if($branch==3){
$query="update user set Branch='MECH' where RegistrationNumber='$regno'";
mysql_query($query);
header('Location: mech.php');
}
else if($branch==4){
$query="update user set Branch='CIVIL' where RegistrationNumber='$regno'";
mysql_query($query);
header('Location: civ.php');
}
else if($branch==5){
$query="update user set Branch='BIO' where RegistrationNumber='$regno'";
mysql_query($query);
header('Location: bio.php');
}
else if($branch==6){
$query="update user set Branch='CHEM' where RegistrationNumber='$regno'";
mysql_query($query);
header('Location: chem.php');
}
}
}
else{
//ADD STUFF
}
?>
  
<!--Content below navbar(random example)-->
<div class="center"><h2>Login</h2></div>
<form method="post" action="<?php echo $current_file;?>">
<div class="row">
<div class="input-field col s10 offset-s1">
<input type="text" id="name" name="name" class="validate" >
<label for="name">Enter Name</label>
</div>
<div class="input-field col s10 offset-s1">
<input type="text" id="rn" name="rn" class="validate" >
<label for="rn">Enter Registration Number</label>
</div>
<div class="input-field col s10 offset-s1">
<input type="text" id="mn" name="mn" class="validate" >
<label for="mn">Enter Mobile Number</label>
</div>
<div class="grey-text darken-1 col s10 offset-s1">
<p>Select your Branch:</p><br>
</div>

<div class="col s10 offset-s1">
    
      <input class="with-gap" name="group1" type="radio" id="test1" value="1"/>
      <label class="black-text" for="test1">Computer Science</label>
    
      <input class="with-gap" name="group1" type="radio" id="test2" value="2"/>
      <label class="black-text" for="test2">Electronics</label>
    
      <input class="with-gap" name="group1" type="radio" id="test3"  value="3"/>
      <label class="black-text" for="test3">Mechanical</label>
    
       <input class="with-gap" name="group1" type="radio" id="test4" value="4"/>
       <label class="black-text" for="test4">Civil</label>
    
       <input class="with-gap" name="group1" type="radio" id="test5" value="5"/>
       <label class="black-text" for="test5">Biotech</label>
    
       <input class="with-gap" name="group1" type="radio" id="test6" value="6"/>
       <label class="black-text" for="test6">Chemical</label>
    
	<br>
	</div>
	
</div><br>
<div class="row center">
<button class="btn red darken-1 large waves-effect waves-light col s2 offset-s1" type="submit" name="action">Start the Game !!
    <i class="mdi-content-send right"></i>
  </button>
</div>
</form>
<!--Content below navbar ends-->
  
</body>
</html>