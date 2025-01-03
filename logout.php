<?php
require 'Connection.php';
$_SESSION = [];
session_unset();
session_destroy();
echo "<script>
            alert('Logout Successful');
            window.location.href='index.php';
            </script>";