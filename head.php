<?php include_once("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>FOOD DISEASE IDENTIFICATION</title>
    <link rel="icon" href="logo.png">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-133437549-3');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.15.3/dist/tf.min.js"></script>-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="html2canvas.js"></script>
</head>


<body>