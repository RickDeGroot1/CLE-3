<?php
if (!isset($_SESSION)){
    header('location: index.php');
    exit;
}