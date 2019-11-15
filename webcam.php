<?php
// Initialize the session
/*session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} */
?>

<!DOCTYPE html>
<html>
<head>
    <title>WEBCAM</title>
</head>
<body>
    <?php include('header.php') ?>
    <br>
    <br>
<!--Stream video via webcam-->
    <div class="video-wrap">
        <video id="video" playsinline autoplay></video>
    </div>
    <!--Trigger canvas Web API-->
    <div class="controller">
        <button id="snap">Capture</button>
        <!--button id="retry">Retry</button-->
        <button id="save">Save</button>
    </div>
    <!-- Webcam video snapshot-->
    <canvas id="canvas" width="640" height="480"></canvas>
    <script>
    'use strict';
    
    const video = document.getElementById('video'); //gets element gets the id from html button
    const canvas = document.getElementById('canvas');
    const snap = document.getElementById('snap');
    const errorMsgElement = document.getElementById('spanErrorMsg');
    
    const constraints = { //the width and ehight of the camera
        audio: false, //no audio
        video:{
            width:640, height: 480
        }
    };
    //Access webcam
    async function init(){
        try{
            const stream = await navigator.mediaDevices.getUserMedia(constraints);
            handleSuccess(stream); //tries to connect to webcam if successful it starts streaming
        }
        catch(e){ //catches if thre is no webcam
            errorMsgElement.innerHTML = 'navigator.getUserMedia.error:${e.toString()}';
        }
    }
    
    // Now that the connection is successful start streaming
    function handleSuccess(stream){
        window.stream = stream;
        video.srcObject = stream;
    }
    // Load init
    init();
    //Draw Image
    var context = canvas.getContext('2d'); //camera functionality allows it to be 2d or 3d
    snap.addEventListener("click", function(){ //waiting for you to campture the image
        context.drawImage(video, 0, 0, 640, 480); //draws the image from canvas. canvas is when you snaap the image
    });
    // //Save Image
    //save.addEventListener("click", function(){
       // var photo = document.getElementById('canvas').src;
    });
    
    </script>
    <?php include('footer.php') ?>
</body>
</html>