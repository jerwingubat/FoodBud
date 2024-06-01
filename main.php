<?php
include_once("config.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>FOOD DISEASE IDENTIFICATION</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="html2canvas.js"></script>
</head>

<style>
    .footer {
        /*margin-bottom: 10%;*/
    }

</style>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <br/><br/>
            <img width="80%" src="design/logo.png"/>
        </div>

        <div class="col-12">
            <a   href="camera.php?id=1"><img width="100%" src="design/Type 2  Diabetes Mellitus.png"/></a><br/>
            <a href="camera.php?id=2"><img width="100%" src="design/Gouty  Arthritis.png"/></a><br/>
            <a href="camera.php?id=3"><img width="100%" src="design/Peptic Ulcer  Disease.png"/></a><br/>
            <a hidden href="camera.php"><img width="100%" src="design/Cholelithiasis.png"/></a><br/>
            <a hidden href="camera.php"><img width="100%" src="design/Dengue Fever.png"/></a><br/>
        </div>

    </div>

    <div class="row">
        <div class="col-12 footer">
            <b style="color: white">YOUR FOOD PARTNER</b>
        </div>

    </div>


</div>
	