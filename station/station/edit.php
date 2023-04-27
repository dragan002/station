<?php
include '../includes/db.php';


$id = $_GET['editid'];
$stmt = mysqli_prepare($conn, "SELECT * FROM `pumpe` WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    header('Location: ../station.php');
    exit();
}

$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$naziv = $row['naziv_pumpe'];
$benzin95 = $row['benzin95_cijena'];
$benzin98 = $row['benzin98_cijena'];
$dizel = $row['dizel_cijena'];
$plin = $row['plin_cijena'];
$broj_radnika = $row['broj_radnika'];


if (isset($_POST['submit'])) {
    $naziv = $_POST['naziv'];
    $benzin95 = $_POST['benzin95_cijena'];
    $benzin98 = $_POST['benzin98_cijena'];
    $dizel = $_POST['dizel_cijena'];
    $plin = $_POST['plin_cijena'];
    $broj_radnika = $_POST['broj_radnika'];
    $id = $_POST['id'];

    $stmt = mysqli_prepare($conn, "UPDATE `pumpe` SET naziv = ?, `benzin95_cijena` = ?, `benzin98_cijena` = ?, dizel_cijena = ?, plin_cijena = ?, broj_radnika = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssssssssi", $naziv, $benzin95, $benzin98, $dizel, $plin, $broj_radnika, $id);
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        header('Location: ../station.php');
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
                <label for="naziv" class="form-label">Naziv</label>
                <input type="text" class="form-control" name="naziv" value="<?php echo $naziv; ?>">
            </div>

            <div class="mb-3">
                <label for="benzin95_cijena" class="form-label">Benzin 95</label>
                <input type="text" class="form-control" name="benzin95_cijena" value="<?php echo $benzin95; ?>">
            </div>

            <div class="mb-3">
                <label for="benzin98_cijena" class="form-label">Benzin 98</label>
                <input type="text" class="form-control" name="benzin98_cijena" value="<?php echo $benzin98; ?>">
            </div>

            <div class="mb-3">
                <label for="dizel_cijena" class="form-label">Dizel</label>
                <input type="text" class="form-control" name="dizel_cijena" value="<?php echo $dizel; ?>">
            </div>

            <div class="mb-3">
                <label for="plin_cijena" class="form-label">Plin</label>
                <input type="text" class="form-control" name="plin_cijena" value="<?php echo $plin; ?>">
            </div>

            <div class="mb-3">
                <label for="broj_radnika" class="form-label">Broj radnika</label>
                <input type="text" class="form-control" name="broj_radnika" value="<?php echo $broj_radnika; ?>">
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</body>

</html>