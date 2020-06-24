<?php
$connect = new mysqli("localhost","root","","simplelogin");
$connect->query('SET names utf-8');
if ($connect->connect_errno) {
    exit("Error-> ".$connect->connect_error);
}