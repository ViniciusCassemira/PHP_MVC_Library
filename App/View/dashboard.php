<?php
    include "view/header.php";
    
    if(!isset($_SESSION['name']))
    {
        echo "<h1 id='dashboard_title'>Library</h1>";
        echo "<p id='dashboard_message'>
            Booking your favorite books is easier than ever! Create your username, find the ideal book and schedule it!
        </p>";
    }
    
    else
    {  
        echo "<h1 id='dashboard_welcome'>Welcome</h1>";
        echo "<h2'>{$_SESSION['name']}</h2>";
    }
    ?>
    
<?php
    include "view/footer.php";
?>