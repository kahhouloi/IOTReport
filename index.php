<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Smart Street Lighting</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        <script src="https://www.gstatic.com/firebasejs/5.3.1/firebase.js"></script>
        <script src="login.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1 align="center">Smart StreetLight Login</h1>
        <div class="login-page">
            <div class="form">
                <!--form class="register-form">
                    <input type="text" placeholder="name"/>
                    <input type="password" placeholder="password"/>
                    <input type="text" placeholder="email address"/>
                    <button>create</button>
                </form-->
                <div class="login-form">
                    <input type="text" placeholder="email" id="email_field"/>
                    <input type="password" placeholder="password" id="password_field"/>
                    <button onclick="login()">login</button>
                </div>
            </div>
        </div>
    </body>
</html>
