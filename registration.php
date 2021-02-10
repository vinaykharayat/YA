<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Registration</title>
        <link rel="stylesheet" href="style.css"/>

    </head>

    <body>
        <form class="form" action="#" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" id="username" name="username" placeholder="Username" required />
            <input type="text" class="login-input" id="email" name="email" placeholder="Email Adress">
            <input type="password" class="login-input" id="password" name="password" placeholder="Password">
            <input type="submit" id="submit" name="submit" value="Register" class="login-button">
            <p class="link">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </body>
    <script src="./jquery-3.5.1.js"></script>

    <script>
        let email, username, password;
        $('.form').on('click', "#submit", function (e) {
            e.preventDefault();

            email = $("#email").val();
            username = $("#username").val();
            password = $("#password").val();
            $.ajax({
                type: 'POST',
                url: './sendOTP.php',
                data: $("form").serialize(),
                cache: false,
                success: function (response) {

                    let userInput = prompt("Enter the otp sent to email");
                                        

                    if (userInput == response) {
                        let userInput = confirm("email verified successfully");
                        if (userInput) {
                            insertIntoDatabase(email, username, password);
                        }
                    }else{
                        let userotp = prompt("Invalid OTP, try again!");
                        if(userotp == response){
                            let userInput = confirm("email verified successfully");
                        if (userInput) {
                            insertIntoDatabase(email, username, password);
                        }
                        }
                    }
                }
            });

        });
        function insertIntoDatabase(email, username, password) {
            $.ajax({
                type: 'POST',
                url: './db.php',
                data: {'email': email,
                    'username': username,
                    'password': password},
                cache: false,
                success: function (response) {

                    if (response == 200) {
                        alert("User registered to database successfuly!");
                    }
                }
            });
        }
    </script>
</html>
