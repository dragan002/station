<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registracija</title>
</head>

<body>

    <div id="wrapper">
        <div id="left">
            <div id="signin">
                <form action="includes/signup.inc.php" method="post">
                    <div>
                        <label>Ime</label>
                        <input type="text" class="text-input" name="ime" placeholder="Napisi svoje ime" require>
                    </div>
                    <div>
                        <label>Prezime</label>
                        <input type="text" class="text-input" name="prezime" placeholder="Napisi svoje prezime" require>
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" class="text-input" name="email" placeholder="Napisi svoj email">
                    </div>
                    <div>
                        <label>Sifra</label>
                        <input type="password" class="text-input" name="sifra" placeholder="Napisi svoju sifru">
                    </div>
                    <div>
                        <label>Naziv pumpe</label>
                        <input type="text" class="text-input" name="naziv_pumpe" placeholder="Naziv pumpe">
                    </div>

                    <button type="submit" name="registracija" class="primary-btn">Registruj se !</button>

                </form>

                <div class="or">
                    <hr class="bar">
                    <span>Be A Part Of Future</span>
                    <hr class="bar">
                </div>
            </div>
            <footer id="main-footer">
                <p>Copyright &copy; 2018, Seraphicus</p>
                <div>
                    <a href="#">Terms of use</a> | <a href="#">Privacy Policy</a>
                </div>
            </footer>
        </div>
        <div id="right">
            <div id="showcase">
                <div class="showcase-content">
                    <h1 class="showcase-text">Let's create the future <strong>Together</strong></h1>
                    <a href="#" class="secondary-btn">In the clash of past and future</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>