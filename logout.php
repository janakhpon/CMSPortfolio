<?php
include("functions/init.php");

session_start();
session_unset();
session_destroy();
redirect("Page_login.php");

