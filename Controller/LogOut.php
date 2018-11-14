<?php
session_start();

    if($_POST['logout'] == "true"){
        session_destroy();
        echo "<script>location.href='../HomePage.html'</script>";
    }
    