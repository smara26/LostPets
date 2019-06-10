<?php

session_start();
session_destroy();
$_SESSION = [];

header("Location:../Front/home/home.html");