<?php
session_start();
include 'includes/db.php';



$email = $_SESSION['email'];
$id = $_SESSION['id'];
$sql = "SELECT radnici.*, pumpe.naziv 
        FROM radnici 
        INNER JOIN pumpe 
        ON radnici.naziv_pumpe = pumpe.naziv 
        WHERE email='$email'";

$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $naziv_pumpe = $row['naziv_pumpe'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Pumpe</title>
</head>

<body>

    <div class="container">
        <button class="btn btn-primary"><a href="radnik/editInfo.php?editid=<?php echo $id; ?>" class="text-light">Izmijeni licne podatke</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Naziv</th>
                    <th scope="col">Benzin 95</th>
                    <th scope="col">Benzin 98</th>
                    <th scope="col">Dizel</th>
                    <th scope="col">Plin</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM `pumpe` WHERE naziv = '$naziv_pumpe'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $naziv = $row['naziv'];
                        $benzin95 = $row['benzin95_cijena'];
                        $benzin98 = $row['benzin98_cijena'];
                        $dizel = $row['dizel_cijena'];
                        $plin = $row['plin_cijena'];
                        $broj_radnika = $row['broj_radnika'];

                        echo ' <tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $naziv . '</td>
                        <td>' . $benzin95 . '</td>
                        <td>' . $benzin98 . '</td>
                        <td>' . $dizel . '</td>
                        <td>' . $plin . '</td>
                        <td>
                            <button class="btn btn-primary"><a href="radnik/edit.php?editid=' . $id . '" class="text-light">Edit</a></button>
                        </td>
                    </tr>';
                    }
                }

                ?>

                <button class="btn btn-primary my-5"><a href="logout.php" class="text-light">Logout</a></button>

            </tbody>
        </table>
        </form>
    </div>

</body>

</html>