<?php
session_start();
// Destroying All Sessions
 $_SESSION['username'] = NULL;
if(session_destroy())
{
// Redirecting To Home Page
header("Location: index.php");
}
?>
