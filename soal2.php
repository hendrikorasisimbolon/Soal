<?php

function is_username_valid($username)
{
    $regex = '/^[a-z,A-Z][a-zA-Z\d\S]{4,8}$/';
    return preg_match($regex,$username);
}

function is_password_valid($password)
{
    $regex = '/(?=^.{8,}$)((?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z])(.*[^A-Za-z0-9]))(.*[=]).*$/';
    return preg_match($regex,$password);
}

echo is_username_valid('Xrutaf888');
echo is_username_valid('1Diana');

echo is_password_valid('passW0rd!=');
echo is_password_valid('C0d3YourFuture!#');
