<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.css">
<!-- Jacob Pawlak and Ryan Shah present.....
		SmartBarbie - a smart doll house model made at the UofL DerbyHacks 
		Hackathon as a proof of concept that anyone (with some patience) can
		make an affordable smart house-->
<title>SmartDollHouse</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
include('Net/SSH2.php');

function raiseEl() {
        $ssh_add = "172.16.100.167";
        $ssh_port = "22";
        $user = "pi";
        $pass = "notraspberry";

        $ssh = new Net_SSH2($ssh_add, $ssh_port);
        $success_login = $ssh->login($user, $pass);
        if(!$success_login) {
                exit('login go byebye');
        }
        $ssh->exec("python ~/Desktop/DerbyHacks/elevatorUp.py");
}

function lowerEl() {
	$ssh_add = "172.16.100.167";
        $ssh_port = "22";
        $user = "pi";
        $pass = "notraspberry";

        $ssh = new Net_SSH2($ssh_add, $ssh_port);
        $success_login = $ssh->login($user, $pass);
	if(!$success_login) {
                exit('login go byebye');
        }
	$ssh->exec("python ~/Desktop/DerbyHacks/elevatorDown.py");
}

function toggleLock() {
	$ssh_add1 = "172.16.100.227";
	$ssh_port1 = "22";
	$user1 = "pi";
	$pass1 = "pi";
	$ssh1 = new Net_SSH2($ssh_add1, $ssh_port1);
	$success_login1 = $ssh1->login($user1, $pass1);
	if(!$success_login1) {
		exit("Login go byebye");
	}
	$ssh1->exec("python ~/toggleLock.py");
}

function toggleLight($num) {

	$ssh_add = "172.16.100.167";
	$ssh_port = "22";
	$user = "pi";
	$pass = "notraspberry";

	$ssh = new Net_SSH2($ssh_add, $ssh_port);
	$success_login = $ssh->login($user, $pass);

	if(!$success_login) {
		exit('login go byebye');
	}
	//$ssh->exec("sudo motion"); 
	$command = "";
	if($num == 1) {
		$command = "python ~/Desktop/DerbyHacks/led_set_1.py";
	} else if($num == 2) {
		$command = "python ~/Desktop/DerbyHacks/led_set_2.py";
	} else if($num == 3) {
		$command = "python ~/Desktop/DerbyHacks/led_set_3.py";
	}
	$ssh->exec($command);
}
if (isset($_GET['l'])) {
	toggleLight($_GET['l']);
}

if (isset($_GET['el'])) {
	if($_GET['el'] == "L") {
		lowerEl();
	} else {
		raiseEl();
	}
}
if (isset($_GET['door'])) {
	toggleLock();

}
?>
<body style="background-color=#ff2eb8">
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<a class="navbar-brand" href="test.php">SmartDollHouse</a>
		<ul class="nav navbar-nav">
			<li><a href="test.php?l=1">Toggle Bedroom Light</a></li>
			<li><a href="test.php?l=2">Toggle Doorway Light</a></li>
			<li><a href="test.php?l=3">Toggle Upstairs Light</a></li>
			<li><a href="test.php?el=L">Lower Elevator</a></li>
			<li><a href="test.php?el=R">Raise Elevator</a></li>
			<li><a href="test.php?door=true">Lock Door</a></li>
			<li><a href="test.php?door=true">Unlock Door</a></li>
<?php if(!isset($_GET['cam'])) { ?>
			<li><a href="test.php?cam=true">View Doorcam</a></li>
<?php } else { ?>
			<li><a href="test.php">Hide Doorcam</a></li>
<?php } ?>
		</ul>
	</div>
</nav>
<div class=container>
<div class=jumbotron>
	<h1>You're a <em>Barbie</em> girl</h1>
	<p>In a Barbie world, where you want to be able to control your home remotely</p>
	<p>We're here to help, because life in plastic deserves to be fantastic.</p>

</div></div>
<?php
if(isset($_GET['cam'])) {
?>
<div class="container">
<img class="img-responsive center-block" src="http://172.16.100.167:8081/" width="492" height="369">
</div>
<?php
}
?>
<audio controls preload="metadata">
	<source src="barbie.mp3" type="audio/mpeg">
	Your browser does not support this audio feature.
</audio>
</br>
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Created by Ryan Shah and Jacob Pawlak for DerbyHacks 2017</p>
      </div>
    </footer>

</body>
</html>
