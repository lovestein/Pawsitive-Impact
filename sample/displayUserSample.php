<?php
include('connection.php');

if (isset($_POST['displaySend'])) {
    $table = '
        <table id="userTable" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Contact Nuumber</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Operations</th>
                </tr>
            </thead>
    ';

    $sql = "SELECT * FROM test";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $gender = $row['gender'];
        $contact = $row['contact'];
        $birthdate = $row['birthdate'];
        $email = $row['email'];
        $passord = $row['password'];


        $table .= '
        <tr>
            <td>' . $firstName . '</td>
            <td>' . $lastName . '</td>
            <td>' . $gender . '</td>
            <td>' . $contact . '</td>
            <td>' . $birthdate . '</td>
            <td>' . $email . '</td>
            <td>' . $passord . '</td>
            <td>
                <button class="btn btn-dark" onclick="GetUserDetails(' . $id . ')"><i class="fa-solid fa-pen"></i></button>
                <button class="btn btn-danger" onclick="DeleteUser(' . $id . ')"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        ';
    }
    $table .= '</table>';
    echo $table;
}
?>
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>