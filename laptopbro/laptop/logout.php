<?php
    include 'lib/session.php';

    Session::init();
    Session::destroy();
    header('Location:index.php');
    exit();

?>