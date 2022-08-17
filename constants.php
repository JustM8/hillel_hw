<?php

const DB_HOST = '127.0.0.1';//mysql
const DATABASE = 'users_base';
const DB_USER = 'root';
const DB_PASSWORD = 'root'; //secret

const DB_OPTS = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];