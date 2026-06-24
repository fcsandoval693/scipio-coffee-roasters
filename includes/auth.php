<?php

function isLoggedIn()
{
    return isset($_SESSION["user_id"]);
}

function requireLogin($loginPath)
{
    if (!isLoggedIn()) {
        header("Location: " . $loginPath);
        exit;
    }
}
function isAdmin(){
    return isset($_SESSION["user_role"]) && $_SESSION["user_role"] === "admin";
}
function requireAdmin($redirectPath)
{
    if (!isAdmin()) {
        header("Location: " . $redirectPath);
        exit;
    }
}
function currentUserName()
{
    return $_SESSION["user_name"] ?? "";
}
function currentUserEmail()
{
    return $_SESSION["user_email"] ?? "";
}
function currentUserRole()
{
    return $_SESSION["user_role"] ?? "";
}
?>