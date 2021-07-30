<?php
    require_once "config/app_config.php";
    if (DEBUG != false) {
        error_reporting(-1);
    }
    require_once "core/App.php";
    require_once "core/Controller.php";
    require_once "core/DB.php";