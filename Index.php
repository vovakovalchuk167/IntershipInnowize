<?php

include_once('Model\Database.php');
include_once('Model\DatabaseSeeder.php');

//use Model\Database;
//use Model\DatabaseSeeder;

Database::CreateDatabase();
DatabaseSeeder::seedUsersInDB(10);

echo "<script>self.location='http://Task13/Controller/GetDataFromView.php?View=Index';</script>";
