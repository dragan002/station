<?php
include '../includes/db.php';

if (isset($_POST['submit'])) {
    $naziv = $_POST['naziv'];
    $benzin95 = $_POST['benzin95_cijena'];
    $benzin98 = $_POST['benzin98_cijena'];
    $dizel = $_POST['dizel_cijena'];
    $plin = $_POST['plin_cijena'];
    $broj_radnika = $_POST['broj_radnika'];
    $id = $_POST['id'];

    $sql = "INSERT INTO `pumpe` (naziv, benzin95_cijena, benzin98_cijena, dizel_cijena, plin_cijena, broj_radnika) VALUES ('$naziv', '$benzin95','$benzin98', '$dizel', '$plin', '$broj_radnika')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: ../station.php');
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
    <title>Dodaj</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="naziv" class="form-label">Naziv</label>
                <input type="text" class="form-control" name="naziv">
            </div>

            <div class="mb-3">
                <label for="benzin95_cijena" class="form-label">Benzin 95</label>
                <input type="text" class="form-control" name="benzin95_cijena">
            </div>

            <div class="mb-3">
                <label for="benzin98_cijena" class="form-label">Benzin 98</label>
                <input type="text" class="form-control" name="benzin98_cijena">
            </div>

            <div class="mb-3">
                <label for="dizel_cijena" class="form-label">Dizel</label>
                <input type="text" class="form-control" name="dizel_cijena">
            </div>

            <div class="mb-3">
                <label for="plin_cijena" class="form-label">Plin</label>
                <input type="text" class="form-control" name="plin_cijena">
            </div>

            <div class="mb-3">
                <label for="broj_radnika" class="form-label">Broj radnika</label>
                <input type="text" class="form-control" name="broj_radnika">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
</body>

</html>