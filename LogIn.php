<!DOCTYPE html>
<html>
    <head>
        <!-- Title of the webpage -->
        <title> Movie Professor Login And Registration</title>
        <link rel="stylesheet" href="loginStyle.css">
    </head>
    <body>
        <!-- Div for holding all the contents in one -->
        <div class="container">
            <!-- Used to put everything into a card look -->
            <div class="card">
                <div class="inner-box" id="card">
                    <div class="card-front">
                        <h2>LOGIN</h2>
                        <!-- Form for the log in portion that asks the user for input-->
                        <form>
                            <!-- Input types as well as buttons-->
                            <input type="username" class="input-box" placeholder="Your Username" required>
                            <input type="password" class="input-box" placeholder="Your Password" required>
                            <button type="submit" class="submit-btn">Submit</button>
                            <input type="checkbox"><span>Remember Me</span>
                        </form>
                        <!-- When I'm new here is clicked runs the function to switch to sign up form-->
                        <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                        <a href=""> Forgot Password</a>
                    </div>
                    <div class="card-back">
                        <h2>SIGN UP</h2>
                        <!-- Form for the sign up that asks for user input -->
                        <form>
                            <!-- Additional field of name to help assign name in database -->
                            <input type="text" class="input-box" placeholder="Your Name" required>
                            <input type="username" class="input-box" placeholder="Your Username" required>
                            <input type="password" class="input-box" placeholder="Your Password" required>
                            <button type="submit" class="submit-btn">Submit</button>
                            <input type="checkbox"><span>Remember Me</span>
                        </form>
                        <!-- When button is clicked switches to the login page -->
                        <button type="button" class="btn" onclick="openLogin()">I have a account</button>
                        <a href=""> Forgot Password</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scrpit for the animation and switching of the two cards-->
        <script>
            // gets the card element from the above div
            var card = document.getElementById("card");

            // function to power the openRegister feature
            function openRegister(){
                card.style.transform = "rotateY(-180deg)";
            }

            // function to power the flip of the login
            function openLogin(){
                card.style.transform = "rotateY(0deg)";
            }
        </script>

    </body>
</html>