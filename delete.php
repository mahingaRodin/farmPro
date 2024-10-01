<?php

include_once('config.php');

if(isset($_POST['delIds']) && is_array($_POST['delIds']) && !empty($_POST['delIds'])) {
    foreach($_POST['delIds'] as $delId) {
        $db->delete('users', array('id' => $delIds));
		header('location: in.php?msg=rds');
		exit;
    }
} elseif(isset($_REQUEST['delId']) && $_REQUEST['delId'] != "") {
    $db->delete('users', array('id' => $_REQUEST['delId']));
    header('location: in.php?msg=rds');
    exit;
}

?>