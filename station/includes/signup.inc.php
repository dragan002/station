<?php
session_start();
require "db.php";

if (isset($_POST['registracija'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $sifra = $_POST['sifra'];
    $nazivPumpe = $_POST['naziv_pumpe'];
}

if (empty($ime) || empty($prezime) || empty($email) || empty($sifra) || empty($nazivPumpe)) {
    echo "<script>alert('Molim Vas da popunite sva polja')</script>";
    echo "<script>window.location.href = '../signup.php'</script>";
    exit();
} else if (!preg_match("/^[a-zA-Z0-9\s]*$/", $ime)) {
    echo "<script>alert('Nepravilan unos, pokusajte opet!')</script>";
    echo "<script>window.location.href = '../signup.php'</script>";
    exit();
} else {
    $sql = "SELECT `email` FROM `radnici` WHERE `email`=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror&message=" . mysqli_error($conn));
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            echo "<script>alert('Email adresa je zauzeta')</script>";
            echo "<script>window.location.href = '../signup.php'</script>";
            exit();
        } else {
            $hashedPwd = password_hash($sifra, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `radnici` (`ime`, `prezime`, `email`, `sifra`, `naziv_pumpe`, `odobreno`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror&message=" . mysqli_stmt_error($stmt));
                exit();
            } else {
                $odobreno = 0;
                mysqli_stmt_bind_param($stmt, 'sssssi', $ime, $prezime, $email, $hashedPwd, $nazivPumpe, $odobreno);
                mysqli_stmt_execute($stmt);
                echo "<script>alert('Uspjesno ste se registrovali, nakon potvrde admina dobicete pristup')</script>";
                echo "<script>window.location.href = '../index.php'</script>";
                exit();
            }
        }
    }
}
