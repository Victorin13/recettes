<?php
    const MYSQL_HOST = 'localhost';
    const MYSQL_PORT = 3306;
    const MYSQL_NAME = 'we_love_food';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = '';

    try {
        $db = new PDO(
            sprintf('mysql:host=%s;dbname=%s;port=%s', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
            MYSQL_USER,
            MYSQL_PASSWORD
        );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(Exception $exception) {
        die('Erreur : '.$exception->getMessage());
    }
