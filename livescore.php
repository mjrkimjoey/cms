<?php
include "includes/db.php";
?>
    <?php
include"includes/header.php";
?>

    <body>

        <!-- Navigation -->
        <?php
        include "includes/navigation.php";
    ?>



<iframe id="iframe-livescore-box" src="https://www.fctables.com/livescore_feed/60926d6e2945dec21344b1b69/" width="100%" scrolling="no" frameborder="0" height="auto"></iframe><a href="https://www.fctables.com/livescore/"></a><script>window.addEventListener("DOMContentLoaded",function(){(function(){var a=window.addEventListener?"addEventListener":"attachEvent",b=window[a],c="attachEvent"==a?"onmessage":"message",d=document.getElementById("iframe-livescore-box");b(c,function(a){var b=JSON.parse(a.data);d.style.height=b.height+"px",console.log(b)},!1)})()},!1);</script>