<?php

class Authorization {
    function before() {
        if (!isset($_SESSION["admin"])) {
            header("Location: " . BASEURL);
            exit();
        }
    }
}