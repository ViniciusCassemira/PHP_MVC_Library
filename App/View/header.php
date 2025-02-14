<?php  
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="preload" href="../assets/media/library.jpg" as="image">
    <title>
        Library
    </title>
</head> 
<body>
    <div id="app">
    <nav>
        <a href='/'>
            <img id="headerLogo" src="/assets/media/header.png" alt="">
        </a>
        
        <?php
        if(!isset($_SESSION['name'])){
            echo "<a href='/user/login'>
                    <p id='header_login'></p>
                    <img src='../assets/media/user.svg'>
                </a>";
        }else{
            
            echo"<ul>";
            echo "<a href='/book'>
                    <p id='header_books'></p>
                    <img src='../assets/media/book.svg'>
                </a>";
            echo "<a href='/booking'>
                    <p id='header_bookings'></p>
                    <img src='../assets/media/calendar.svg'>
                </a>";
            
            if($_SESSION['id_role'] == 2){
                echo "<a href='/user'>
                    <p id='header_users'></p>
                    <img src='../assets/media/user2.svg'>
                </a>";
            }
            echo"</ul>";
            
            echo "<a href='/logout'>
                    <p id='header_logout'></p>
                    <img src='../assets/media/exit.svg'>
                </a>";
        }
        ?>
    </nav>
    <div id="content">