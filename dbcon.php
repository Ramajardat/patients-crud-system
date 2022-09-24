<?php

$con = mysqli_connect("localhost","root","root","crudapp");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}
