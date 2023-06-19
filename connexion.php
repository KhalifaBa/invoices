<?php
$db = new PDO('mysql:host=localhost;dbname=invoice','root','');
if (!$db)
{
    die();
}
