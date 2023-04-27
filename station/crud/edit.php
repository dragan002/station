<?php
include '../includes/db.php';


$id = $_GET['editid'];
$stmt = mysqli_prepare($conn, "SELECT * FROM `radnici` WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    header('Location: ../admin.php');
    exit();
}

$row = mysqli_fetch_assoc($result);

$ime = $row['ime'];
$prezime = $row['prezime'];
$email = $row['email'];
$naziv_pumpe = $row['naziv_pumpe'];
$godine_staza = $row['godine_staza'];
$dani_godisnje = $row['dani_godisnjeg'];
$plata = $row['plata'];
$odobreno = $row['odobreno'];


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

    $stmt = mysqli_prepare($conn, "UPDATE `radnici` SET ime = ?, `prezime` = ?, `email` = ?, naziv_pumpe = ?, godine_staza = ?, dani_godisnjeg = ?,plata = ?, odobreno = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssssssssi", $ime, $prezime, $email, $naziv_pumpe, $godine_staza, $dani_godisnje, $plata, $odobreno, $id);
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        header('Location: ../admin.php');
    } else {
        die(mysqli_error($conn));
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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="ime" class="form-label">Ime</label>
                <input type="text" class="form-control" name="ime" value="<?php echo $ime; ?>">
            </div>

            <div class="mb-3">
                <label for="prezime" class="form-label">Prezime</label>
                <input type="text" class="form-control" name="prezime" value="<?php echo $prezime; ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>

            <div class="mb-3">
                <label for="naziv_pumpe" class="form-label">Naziv pumpe</label>
                <input type="text" class="form-control" name="naziv_pumpe" value="<?php echo $naziv_pumpe; ?>">
            </div>

            <div class="mb-3">
                <label for="godine_staza" class="form-label">Godine staza</label>
                <input type="text" class="form-control" name="godine_staza" value="<?php echo $godine_staza; ?>">
            </div>

            <div class="mb-3">
                <label for="dani_godisnjeg" class="form-label">Dani godisnjeg</label>
                <input type="text" class="form-control" name="dani_godisnjeg" value="<?php echo $dani_godisnje; ?>">
            </div>

            <div class="mb-3">
                <label for="plata" class="form-label">Plata</label>
                <input type="text" class="form-control" name="plata" value="<?php echo $plata; ?>">
            </div>

            <div class="mb-3">
                <label for="odobreno" class="form-label">Odobreno</label>
                <select class="form-select" name="odobreno">
                    <option value="1" <?php if ($odobreno == 1) echo " selected"; ?>>Da</option>
                    <option value="0" <?php if ($odobreno == 0) echo " selected"; ?>>Ne</option>
                    <option value="-1" <?php if ($odobreno == -1) echo " selected"; ?>>Cekanje</option>
                </select>
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</body>

</html>