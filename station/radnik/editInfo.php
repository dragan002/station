<?php
include '../includes/db.php';

$id = $_GET['editid'];
$stmt = mysqli_prepare($conn, "SELECT * FROM `radnici` WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sifra = $_POST['sifra'];

    $stmt = mysqli_prepare($conn, "UPDATE `radnici` SET email = ?, sifra = ? WHERE id = ?");
    $hashedPwd = password_hash($sifra, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssi", $email, $hashedPwd, $id);
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        header('Location: ../index.php');
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
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="sifra" class="form-label">Sifra</label>
                <input type="password" class="form-control" name="sifra" value="<?php echo $row['sifra']; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Izmijeni</button>
        </form>
    </div>
</body>

</html>