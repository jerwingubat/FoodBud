<?php
include_once("config.php");

?>
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


<?php $_SESSION['cat_id']=$_GET['id'];?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <img width="60%" src="design/logo.png"/>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <div id="container">
                <button hidden onclick="init()">Start</button>
                <div id="capture">
                    <div id="webcam-container"></div>
                </div>
                <div hidden id="label-container"></div>

                <a onclick="doCapture();" class="btn btn-info">CAPTURE </a>
                <!--                            <video autoplay="true" id="videoElement">-->
                <!---->
                <!--                            </video>-->
            </div>
             
        </div>
    </div>
</div>
<div align="right"  hidden class="footer"><a style="color:black" href="trivia.php"><h3> <i class="fa fa-info-circle"></i> TRIVIA!! </h3> </a> <br/>
</div>
</body>


<!--THIS CODE IS FOR FISH DISEASE IDENTIFICATION-->
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>
<script type="text/javascript">
    window.onload = function() {
        init();
    }
    // More API functions here:
    // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

    // the link to your model provided by Teachable Machine export panel
    const URL = "https://teachablemachine.withgoogle.com/models/-brXw7rUP/";

    let model, webcam, labelContainer, maxPredictions;

    // Load the image model and setup the webcam
    async function init() {
        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

        // load the model and metadata
        // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
        // or files from your local hard drive
        // Note: the pose library adds "tmImage" object to your window (window.tmImage)
        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        // Convenience function to setup a webcam
        const flip = false; // whether to flip the webcam
        webcam = new tmImage.Webcam(200, 200, flip); // width, height, flip 
       // await webcam.setup(); // request access to the webcam
    await webcam.setup({ facingMode: "environment" });
        await webcam.play();
        window.requestAnimationFrame(loop);

        // append elements to the DOM
        document.getElementById("webcam-container").appendChild(webcam.canvas);
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // and class labels
            labelContainer.appendChild(document.createElement("div"));
        }
    }

    async function loop() {
        webcam.update(); // update the webcam frame
        await predict();
        window.requestAnimationFrame(loop);
    }

    // run the webcam image through the image model
    async function predict() {
        // predict can take in an image, video or canvas html element
        const prediction = await model.predict(webcam.canvas);
        for (let i = 0; i < maxPredictions; i++) {
            const classPrediction =
                prediction[i].className + ": " + prediction[i].probability.toFixed(2);
            labelContainer.childNodes[i].innerHTML = classPrediction;

            document.cookie = "1=" + prediction[0].probability.toFixed(2);
            document.cookie = "2=" + prediction[1].probability.toFixed(2);
            document.cookie = "3=" + prediction[2].probability.toFixed(2);
            document.cookie = "4=" + prediction[3].probability.toFixed(2);
            document.cookie = "5=" + prediction[4].probability.toFixed(2);
            document.cookie = "6=" + prediction[5].probability.toFixed(2);
            document.cookie = "7=" + prediction[6].probability.toFixed(2);
            document.cookie = "8=" + prediction[7].probability.toFixed(2);
            document.cookie = "9=" + prediction[8].probability.toFixed(2);
            document.cookie = "10=" + prediction[9].probability.toFixed(2);
            document.cookie = "11=" + prediction[10].probability.toFixed(2);

        }
    }
</script>
<!--//Save Capture-->
<script>
    function doCapture() {
        window.scrollTo(0, 0);
        html2canvas(document.getElementById("capture")).then(function (canvas) {

            // Create an AJAX object
            var ajax = new XMLHttpRequest();

            // Setting method, server file name, and asynchronous
            ajax.open("POST", "save-capture.php", true);
            // Setting headers for POST method
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Sending image data to server
            ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

            // Receiving response from server
            // This function will be called multiple times
            ajax.onreadystatechange = function () {

                // Check when the requested is completed
                if (this.readyState == 4 && this.status == 200) {

                    // Displaying response from server
                    console.log(this.responseText);
                }
            };
          //  window.location.href = "https://phsite.tech/food/new.php?refresh";
            window.location.href = "new.php?refresh";
        });
    }

//    Accordion
    var Accordion = function() {

        var
            toggleItems,
            items;

        var _init = function() {
            toggleItems     = document.querySelectorAll('.accordion__itemTitleWrap');
            toggleItems     = Array.prototype.slice.call(toggleItems);
            items           = document.querySelectorAll('.accordion__item');
            items           = Array.prototype.slice.call(items);

            _addEventHandlers();
            TweenLite.set(items, {visibility:'visible'});
            TweenMax.staggerFrom(items, 0.9,{opacity:0, x:-100, ease:Power2.easeOut}, 0.3)
        }

        var _addEventHandlers = function() {
            toggleItems.forEach(function(element, index) {
                element.addEventListener('click', _toggleItem, false);
            });
        }

        var _toggleItem = function() {
            var parent = this.parentNode;
            var content = parent.children[1];
            if(!parent.classList.contains('is-active')) {
                parent.classList.add('is-active');
                TweenLite.set(content, {height:'auto'})
                TweenLite.from(content, 0.6, {height: 0, immediateRender:false, ease: Back.easeOut})

            } else {
                parent.classList.remove('is-active');
                TweenLite.to(content, 0.3, {height: 0, immediateRender:false, ease: Power1.easeOut})
            }
        }

        return {
            init: _init
        }

    }();

    Accordion.init();
</script>

</html>


