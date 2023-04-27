<?php
session_start();
require "db.php";

if (isset($_POST["login-submit"])) {
    $email = $_POST['email'];
    $sifra = $_POST['sifra'];

    if (empty($email) || empty($sifra)) {
        echo "<script>alert('Popunite sva polja')</script>";
        echo "<script>window.location.href = '../index.php'</script>";
        exit();
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Pogresan email, pokusajte opet')</script>";
            echo "<script>window.location.href = '../index.php'</script>";
            exit();
        } else {
            $sql = "SELECT * FROM radnici WHERE email=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    $hashed_password = $row['sifra'];

                    if ($row['odobreno'] == 0) {
                        echo "<script>alert('Nakon potvrde admina dobicete pristup')</script>";
                        echo "<script>window.location.href = '../index.php'</script>";
                        exit();
                    } else if ($row['odobreno'] == -1) {
                        echo "<script>alert('Vasa registracija je odbijena')</script>";
                        echo "<script>window.location.href = '../index.php'</script>";
                        exit();
                    } else {
                        if (password_verify($sifra, $hashed_password)) {
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['id'] = $row['id'];
                            setcookie('login_cookie', $row['email'], time() + 3600, '/');

                            if ($row['role'] == 'admin') {
                                header("Location: ../admin.php");
                                exit();
                            } else {
                                header("Location: ../radnik.php");
                                exit();
                            }
                        } else {
                            echo "<script>alert('Pogresna sifra, pokusajte opet')</script>";
                            echo "<script>window.location.href = '../index.php'</script>";
                            exit();
                        }
                    }
                } else {
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
