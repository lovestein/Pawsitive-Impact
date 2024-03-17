<?php
session_start();
include('connection.php');

if (isset($_POST['displaySend'])) {
    $table = '
        <table id="userTable" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Home Address</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email Address</th>
                <th scope="col">Password</th>
                <th scope="col">User Type</th>
                <th scope="col">Operations</th>
                </tr>
            </thead>
    ';

    $sql = "SELECT * FROM user_details";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['user_id'];
        $firstName = $row['user_fname'];
        $lastName = $row['user_lname'];
        $gender = $row['user_gender'];
        $birthdate = $row['user_birthdate'];
        $address = $row['user_address'];
        $contactno = $row['user_contactno'];
        $email = $row['user_email'];
        $password = $row['user_password'];
        $type  = $row['user_type'];


        $table .= '
        <tr>
            <td>' . $firstName . '</td>
            <td>' . $lastName . '</td>
            <td>' . $gender . '</td>
            <td>' . $birthdate . '</td>
            <td>' . $address . '</td>
            <td>' . $contactno . '</td>
            <td>' . $email . '</td>
            <td>' . $password . '</td>
            <td>' . $type . '</td>
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
        $('#userTable').DataTable({
            pagingType: 'full_numbers',
                scrollX: true,
                "lengthMenu": [
                    [10,25,50,-1],
                    [10,25,50, "All"]
                ],
                responsive: true,
                language:  {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Users Records"
                }
        });
    });
</script>