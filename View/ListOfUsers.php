<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Of Users</title>
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.css"/>
</head>
<body>
<?php if ($errorMessage != '') {
    echo "<p class=\"text-danger\">$errorMessage</p>";
} ?>
<div class="panel-heading text-center p-3 border bg-light"><h4>List Of Users</h4></div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                </tr>
                </thead>
                <?php foreach ($users as $user) {
                    $email = $user->getEmail();
                    $name = $user->getName();
                    $gender = $user->getGender();
                    $status = $user->getStatus();
                    echo "<tr><td>$email</td>";
                    echo "<td>$name</td>";
                    echo "<td>$gender</td>";
                    echo "<td>$status</td>";
                    echo "<td><a href=\"..\Controller\GetDataFromView.php?View=EditUser&Email=$email\">Edit</a><br>";
                    echo "<a type =\"button\" class=\"btn btn-danger\" 
                                    href=\"..\Controller\GetDataFromView.php?View=Delete&Email=$email \">Delete</a></td></tr>";
                } ?>
            </table>
            <a type="button" class="btn btn-primary" href="http://Task13/View/AddUser.php">Add User</a>
        </div>
    </div>
</body>
</html>
<?php
