<?php
include '../includes/db.php';

if (isset($_POST['submit'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $naziv_pumpe = $_POST['naziv_pumpe'];
    $godine_staza = $_POST['godine_staza'];
    $dani_godisnje = $_POST['dani_godisnjeg'];
    $plata = $_POST['plata'];
    $odobreno = $_POST['odobreno'];
    $id = $_POST['id'];

    $sql = "INSERT INTO `radnici` (ime, prezime, email, naziv_pumpe, godine_staza, dani_godisnjeg, plata, odobreno) VALUES ('$ime', '$prezime', '$email', '$naziv_pumpe', '$godine_staza', '$dani_godisnje', '$plata', $odobreno)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location:../admin.php');
    } else {
        $error_message = mysqli_error($conn);
        echo "Error: " . $error_message;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <input type="hidden" name="id">
            <div class="mb-3">
                <label for="ime" class="form-label">Ime</label>
                <input type="text" class="form-control" name="ime">
            </div>

            <div class="mb-3">
                <label for="prezime" class="form-label">Prezime</label>
                <input type="text" class="form-control" name="prezime">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>

            <div class="mb-3">
                <label for="naziv_pumpe" class="form-label">Naziv pumpe</label>
                <input type="text" class="form-control" name="naziv_pumpe">
            </div>

            <div class="mb-3">
                <label for="godine_staza" class="form-label">Godine staza</label>
                <input type="text" class="form-control" name="godine_staza">
            </div>

            <div class="mb-3">
                <label for="dani_godisnjeg" class="form-label">Dani godisnjeg</label>
                <input type="text" class="form-control" name="dani_godisnjeg">
            </div>

            <div class="mb-3">
                <label for="plata" class="form-label">Plata</label>
                <input type="text" class="form-control" name="plata">
            </div>

            <div class="mb-3">
                <label for="odobreno" class="form-label">Odobreno</label>
                <select class="form-select" name="odobreno">
                    <option value="1">Da</option>
                    <option value="0">Cekanje</option>
                    <option value="-1">Ne</option>
                </select>
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
</body>

</html>