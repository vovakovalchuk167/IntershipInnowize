<?php
//namespace Controller;
include_once('HomeController.php');
//use Controller\HomeController;
if ($_GET['View'] == 'AddUser') {
    HomeController::AddUser($_POST);
} elseif ($_GET['View'] == 'Delete') {
    HomeController::Delete($_GET['Email']);
} elseif ($_GET['View'] == 'EditUser') {
    HomeController::PreFormEdit($_GET['Email']);
} elseif ($_GET['View'] == 'EditUserForm') {
    HomeController::PostFormEdit($_POST, $_GET['id']);
} elseif ($_GET['View'] == 'Index') {
    HomeController::UpdateUserList();
}
