<?php

// Leave the driver as mysql
// Replace the host with your ip address of the ec2 instance or the Public DNS (ex. ec2-XXX-XXX-XXX-XXX.compute-1.amazonaws.com. 
// These are found on your AWS ec2 instance homepage)
// dbname is the name of your database
// Leave the port as 3306
// replace text below with your credentials for username and password for your database
// Leave the options as is

return [
    'database' => [
        'driver' => 'mysql',
        'host' => 'your ec2 instance IPv4 Public IP or Public DNS (IPv4) here',
        'dbname' => 'your database name here',
        'port' => 3306,
        'username' => 'your database username here',
        'password' => 'your database password here',
        'options' => [ 'PDO::MYSQL_ATTR_INIT_COMMAND' => 'SET NAMES utf8' ]
    ]
];
