<?php

class Authenticaton {
    function before() {
        if (!isset($_SESSION["status"]) && $_SESSION["status"] != "logged in") {
            $_SESSION["fail_message"] = "Harap Login Dulu!";
            header("Location:" . BASEURL . "/login");
            exit();
        }
    }
}