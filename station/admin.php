<?php
include 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Employees</title>
</head>

<body>

    <div class="container">
        <button class="btn btn-primary my-5"><a href="crud/add.php" class="text-light">Dodaj radnika</a></button>
        <button class="btn btn-primary my-5"><a href="station.php" class="text-light">Pumpa</a></button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Email</th>
                    <th scope="col">Naziv pumpe</th>
                    <th scope="col">Godine staza</th>
                    <th scope="col">Dani godisnjeg</th>
                    <th scope="col">Plata</th>
                    <th scope="col">Odobreno</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM `radnici` WHERE `role`='radnik'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $ime = $row['ime'];
                        $prezime = $row['prezime'];
                        $email = $row['email'];
                        $naziv_pumpe = $row['naziv_pumpe'];
                        $godine_staza = $row['godine_staza'];
                        $dani_godisnjeg = $row['dani_godisnjeg'];
                        $plata = $row['plata'];
                        $odobreno = $row['odobreno'];


                        echo ' <tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $ime . '</td>
                        <td>' . $prezime . '</td>
                        <td>' . $email . '</td>
                        <td>' . $naziv_pumpe . '</td>
                        <td>' . $godine_staza . '</td>
                        <td>' . $dani_godisnjeg . '</td>
                        <td>' . $plata . '</td>
                        <td>' . $odobreno . '</td>
                        <td>
                            <button class="btn btn-danger"><a href="crud/delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                            <button class="btn btn-primary"><a href="crud/edit.php?editid=' . $id . '" class="text-light">Edit</a></button>
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