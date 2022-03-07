<!DOCTYPE html>

<?php

session_start();
require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
    "driver" => _driver_,
    "host" => _host_,
    "database" => _database_,
    "username" => _username_,
    "password" => _password_
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && $_GET["index"] > 0) ? (int) $_GET["index"] : 0;
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $all_requrds = Capsule::table("items")->where('CouNtry', 'Like', '%'.$search.'%', 'or')->get();
    
} else {
    $all_requrds = Capsule::table("items")->skip($index)->take(_Pager_size_)->get();
}
$all_requrds_count = Capsule::table("items")->count();
$next_index = (($index + _Pager_size_) <  $all_requrds_count) ? $index + _Pager_size_ : 0;
$next_link = "http://localhost/day4&5/index.php?index=$next_index";
$previous_index = (($index - _Pager_size_) >= 0) ? $index - _Pager_size_ : 0;
$previous_link = "http://localhost/day4&5/index.php?index=$previous_index";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $item = Capsule::table('items')->find($id);
    
    require_once("views/info.php");
} else {
    require_once("views/table.php");
}