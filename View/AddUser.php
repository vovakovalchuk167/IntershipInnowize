<?php
?>
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width"/>
    <title>Add User</title>
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.css"/>
    <style>
    </style>
</head>
<body>
<div class="panel panel-success">
    <nav class="navbar navbar-light bg-light">
        <h2 class="p-3">Add User</h2>
        <a class="nav-link my-2 my-sm-0" href="../Controller/GetDataFromView.php?View=Index">Back to UserList</a>
    </nav>
    <div class="panel-body">
        <form class="p-a-1" action="../Controller/GetDataFromView.php?View=AddUser" method="post">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col col-sm-2">
                    </div>
                    <div class="col-md offset-md p-5">
                        <div class="p-1">
                            <label for="Email">User Email</label>
                            <input type="email" class="form-control" name="Email" required/>
                        </div>
                        <div class="p-1">
                            <label for="Name">User Name</label>
                            <input class="form-control" name="Name" required/>
                        </div>
                        <div class="p-1">
                            <label for="Gender">Gender</label>
                            <select class="form-control" name="Gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="p-1">
                            <label for="Status">Status</label>
                            <select class="form-control" name="Status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col col-sm-2">
                    </div>
                </div>
            </div>
            <div class="p-3">
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>