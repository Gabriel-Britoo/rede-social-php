<?php

$connection = new mysqli(
    "localhost",
    "root",
    "",
    "conecta_tech_db"
);

if ($connection->error) {
    die($connection->error);
}