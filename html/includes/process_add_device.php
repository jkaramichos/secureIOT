<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();


if(isset($_POST['add_device_btn']))
{
    
    $current_user = htmlentities($_SESSION['username']);
    $device_name = $_POST['device_name_text'];
    
    $insert = $mysqli -> prepare("INSERT INTO $current_user (device_name) VALUES (?)");
    $insert -> bind_param('s', $device_name);
    $insert -> execute();
    
    header('Location: ../devices.php');
    
}
