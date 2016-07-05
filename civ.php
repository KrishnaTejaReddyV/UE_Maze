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
  $qno=$_COOKIE["qno"];
  include_once('data_connect.php');
  include_once('core.php');
$queryque="select Question from civil where Q_no='$qno'";
$question=implode(mysql_fetch_row(mysql_query($queryque)));
$queryopt1="select Option1 from civil where Q_no='$qno'";
$opt1=implode(mysql_fetch_row(mysql_query($queryopt1)));
$queryopt2="select Option2 from civil where Q_no='$qno'";
$opt2=implode(mysql_fetch_row(mysql_query($queryopt2)));
$queryopt3="select Option3 from civil where Q_no='$qno'";
$opt3=implode(mysql_fetch_row(mysql_query($queryopt3)));
$queryopt4="select Option4 from civil where Q_no='$qno'";
$opt4=implode(mysql_fetch_row(mysql_query($queryopt4))); 
$queryopt5="select Answer from civil where Q_no='$qno'";
$ans=implode(mysql_fetch_row(mysql_query($queryopt5))); 
$queryopt6="select Correct from civil where Q_no='$qno'";
$right=implode(mysql_fetch_row(mysql_query($queryopt6)));  
$queryque7="select Wrong from civil where Q_no='$qno'";
$wrong=implode(mysql_fetch_row(mysql_query($queryque7)));

if(isset($_POST['group1'])){
$opt=$_POST['group1'];
if(!empty($opt)){
if($qno==1){
$querychange="update user set StartTime=CURTIME() where RegistrationNumber='$regno'";
mysql_query($querychange);
}
if($qno==20)
{
if($opt==$ans)
{$time_end = time();
$time = $time_end - $time_start;
$querychange="update user set EndTime=CURTIME() where RegistrationNumber='$regno'";
mysql_query($querychange);
header('Location: end.php');
}
else
{
$qno=$wrong;
setcookie("qno",$qno);
$querychange="update user set QS_no='$qno' where RegistrationNumber='$regno'";
mysql_query($querychange);
}
}
else{
if($opt==$ans)
{
$qno=$right;
setcookie("qno",$qno);
$querychange="update user set QS_no='$qno' where RegistrationNumber='$regno'";
mysql_query($querychange);
}
else
{
$qno=$wrong;
setcookie("qno",$qno);
$querychange="update user set QS_no='$qno' where RegistrationNumber='$regno'";
mysql_query($querychange);
}

$queryque="select Question from civil where Q_no='$qno'";
$question=implode(mysql_fetch_row(mysql_query($queryque)));
$queryopt1="select Option1 from civil where Q_no='$qno'";
$opt1=implode(mysql_fetch_row(mysql_query($queryopt1)));
$queryopt2="select Option2 from civil where Q_no='$qno'";
$opt2=implode(mysql_fetch_row(mysql_query($queryopt2)));
$queryopt3="select Option3 from civil where Q_no='$qno'";
$opt3=implode(mysql_fetch_row(mysql_query($queryopt3)));
$queryopt4="select Option4 from civil where Q_no='$qno'";
$opt4=implode(mysql_fetch_row(mysql_query($queryopt4))); 
$queryopt5="select Answer from civil where Q_no='$qno'";
$ans=implode(mysql_fetch_row(mysql_query($queryopt5))); 
$queryopt6="select Correct from civil where Q_no='$qno'";
$right=implode(mysql_fetch_row(mysql_query($queryopt6)));  
$queryque7="select Wrong from civil where Q_no='$qno'";
$wrong=implode(mysql_fetch_row(mysql_query($queryque7)));
}
}
}

?>
  

<!--Content below navbar(random example)-->
<div class='container row'>
<form method="post" action="<?php echo $current_file;?>">
<div class="center">
<h3 class='header light'><?php echo $qno.')  '.$question;?></h3></div>
<div class="col s8 offset-s4">
    <p>
      <input class="with-gap" name="group1" type="radio" id="test1" value="<?= $opt1; ?>"/>
      <label class="black-text" for="test1"><?php echo $opt1; ?></label>
    </p>
    <p>
      <input class="with-gap" name="group1" type="radio" id="test2" value="<?= $opt2; ?>"/>
      <label class="black-text" for="test2"><?php echo $opt2; ?></label>
    </p>
    <p>
      <input class="with-gap" name="group1" type="radio" id="test3"  value="<?= $opt3; ?>"/>
      <label class="black-text" for="test3"><?php echo $opt3; ?></label>
    </p>
    <p>
       <input class="with-gap" name="group1" type="radio" id="test4" value="<?= $opt4; ?>"/>
       <label class="black-text" for="test4"><?php echo $opt4; ?></label>
    </p>
	<br>
	</div>
	<div class="col s4 offset-s4">
<button class="btn red darken-1 large waves-effect waves-light col s5 offset-s1" type="submit" name="action">Submit
    <i class="mdi-content-send right"></i>
  </button>
</div>
	</form>
	</div>
	

</body>
</html>