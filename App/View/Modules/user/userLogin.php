<?php
    include "view/header.php";
?>


<form action="/user/login" method="POST">
    <h2 id='login_title'>Login</h2>
    <input id='login_email' type="email" id="email" name="email" placeholder="Your email" required>
    <input id='login_password' type="password" id=password" name="password" placeholder="Your password" required>
    <button id='login_button' class="loginBtn">Login</button>
    
    <div>
        <p id='login_message'>New here?</p> <a href='/user/register'><span id='login_link'>Register</span></a>
    </div>
</form>

<?php
    include "view/footer.php";
?>