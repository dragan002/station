<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GasStation</title>
</head>

<body>


    <div id="wrapper">
        <div id="left">
            <div id="signin">
                <div class="logo">

                </div>
                <form action="includes/login.inc.php" method="post">
                    <div>
                        <label>Email</label>
                        <input type="text" class="text-input" name="email">
                    </div>
                    <div>
                        <label>Sifra</label>
                        <input type="password" class="text-input" name="sifra">
                    </div>
                    <div>
                        <input type="hidden" name="odobreno" value="0">
                    </div>
                    <button type="submit" class="primary-btn" name="login-submit">Sign In</button>
                </form>
                <div class="links">
                    <a href="#">Forget password</a>
                    <a href="#">Sign with in company or school</a>
                </div>
                <div class="or">
                    <hr class="bar">
                    <span>OR</span>
                    <hr class="bar">
                </div>
                <a href="signup.php" class="secondary-btn">Create an account</a>
            </div>
            <footer id="main-footer">
                <p>Copyright &copy; 2018, Prime allRights Reserved</p>
                <div>
                    <a href="#">Terms of use</a> | <a href="#">Privacy Policy</a>
                </div>
            </footer>
        </div>
        <div id="right">
            <div id="showcase">
                <div class="showcase-content">
                    <h1 class="showcase-text">Let's create the future <strong>Together</strong></h1>
                    <a href="signup.php" class="secondary-btn">Create account for free</a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>