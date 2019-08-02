<?php session_start();?>
<?php 	$UserLogin=$_SESSION['UserLogin'];
		$IdUser=$_SESSION['IdUser'];
		$LevelID=$_SESSION['LevelID'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Aduan</title>
    <link rel="stylesheet" href="./vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link type="text/css" href="css/bootstrap-timepicker.min.css" />
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/popper.js/popper.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
    <script src="./vendor/chart.js/chart.min.js"></script>
    <script src="./js/carbon.js"></script>
</head>
<body class="sidebar-fixed header-fixed">
<?php error_reporting(0);?>