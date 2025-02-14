<?php
    include "view/header.php";
?>


<form action="/user/register" method="POST">
    <h2 id="register_title">Register</h2>
        
    <input id="register_name" type="text" name="name" placeholder="Name" required>
    <input id="register_email" type="email" name="email" placeholder="Email" required>
    <input id="register_password" type="password" name="password" placeholder="Password">
    <button id="register_button" class="loginBtn">Register</button>
        
    <div>
        <p id="register_message">Have a register?</p>
        <a href="/user/login"><span id="register_link">Login here</span></a>
    </div>
</form>

<?php
    include "view/footer.php";
?>