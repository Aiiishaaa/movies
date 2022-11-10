<?php
include('../controller/connectdb.php');
//Validation
$sql = "SELECT * FROM users WHERE status not like 'admin'";

$result = $conn->query($sql);
$list = '';
$total = $result->num_rows;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $list = $list . '
        <table class="table table-dark mt-3 ">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">Mot de passe</th>
                <th scope="col">Statut</th>
            </tr>
        <tbody>
            <tr>
                <td>' . $row["Fullname"] . '</td>
                <td>' . $row["Email"] . '</td>
                <td>' . $row["Username"] . '</td>
                <td>' . $row["Password"] . '</td>
                <td>' . $row["status"] . '</td>
            </tr>
            </tbody>
      </table>
      <a href="updateuser.php?id=' . $row["UserId"] . '" class="btn btn-primary">Modifier</a>
      <a  href="../controller/deleteuser.php?id=' . $row["UserId"] . '" class="btn btn-danger">Supprimer</a>
      ';
    }
} else {
    echo "Il n'y a pas encore de compte créé !";
}
$conn->close();
