<?php
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
    <title>Test CRUD FROMS</title>
</head>

<body>
    <!-- Create User Modal -->
    <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" id="first_name">
                    </div>
                    <div class="form-group">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" id="last_name">
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Gender</label>
                        <select type='text' id="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Contact Number</label>
                        <input type="text" class="form-control" id="contact_no">
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate">
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Email Address</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="AddUser()">Add User</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update User Modal -->
    <div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update_first_name">First Name</label>
                        <input type="text" class="form-control" id="update_first_name">
                    </div>
                    <div class="form-group">
                        <label for="update_last_name">Last Name</label>
                        <input type="text" class="form-control" id="update_last_name">
                    </div>
                    <div class="form-group">
                        <label for="update_gender">Gender</label>
                        <select type='text' id="update_gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="update_contact_no">Contact Number</label>
                        <input type="text" class="form-control" id="update_contact_no">
                    </div>
                    <div class="form-group">
                        <label for="update_birthdate">Birthdate</label>
                        <input type="date" class="form-control" id="update_birthdate">
                    </div>
                    <div class="form-group">
                        <label for="update_email">Email Address</label>
                        <input type="email" class="form-control" id="update_email">
                    </div>
                    <div class="form-group">
                        <label for="update_password">Password</label>
                        <input type="password" class="form-control" id="update_password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="UpdateUser()">Update User</button>
                    <input type="hidden" id="hiddenID">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="text-center bg-light ">Testing Modal CRUD</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#createUser">
            <i class="fa-solid fa-plus"></i> Add New User
        </button>

        <div id="displayDataTable">

        </div>



    </div>



    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/functions.js"></script>

    <script>
        // $(document).ready(function() {
        //     displayData();
        // });

        // function displayData() {
        //     var displayData = "true";
        //     $.ajax({
        //         url: "displayUser.php",
        //         type: 'post',
        //         data: {
        //             displaySend: displayData
        //         },
        //         success: function(data, status) {
        //             $('#displayDataTable').html(data);
        //         }
        //     })
        // }

        // function AddUser() {
        //     var addFirstName = $('#first_name').val();
        //     var addLastName = $('#last_name').val();
        //     var addGender = $('#gender').val();
        //     var addContact = $('#contact_no').val();
        //     var addBirthdate = $('#birthdate').val();
        //     var addEmail = $('#email').val();
        //     var addPassword = $('#password').val();

        //     $.ajax({
        //         url: "createUser.php",
        //         type: "post",
        //         data: {
        //             sendFirstName: addFirstName,
        //             sendLastName: addLastName,
        //             sendGender: addGender,
        //             sendContact: addContact,
        //             sendBirthdate: addBirthdate,
        //             sendEmail: addEmail,
        //             sendPassword: addPassword
        //         },
        //         success: function(data, status) {
        //             console.log(status);
        //             $('#createUser').modal('hide');
        //             displayData();
        //         }
        //     })
        // }

        // function DeleteUser(deleteUser) {
        //     $.ajax({
        //         url: 'deleteUser.php',
        //         type: 'post',
        //         data: {
        //             sendDeleteUser:deleteUser
        //         },
        //         success:function(data,status){
        //             displayData();
        //         }
        //     });
        // }

        // function GetUserDetails(UserDetails){

        //     $('#hiddenID').val(UserDetails);

        //     $.post("updateUser.php", {UserDetails:UserDetails}, function(data,status){

        //         var userID = JSON.parse(data); 

        //         $('#update_first_name').val(userID.first_name);
        //         $('#update_last_name').val(userID.last_name);
        //         $('#update_gender').val(userID.gender);
        //         $('#update_contact_no').val(userID.contact);
        //         $('#update_birthdate').val(userID.birthdate);
        //         $('#update_email').val(userID.email);
        //         $('#update_password').val(userID.password);

        //     });

        //     $('#updateUser').modal("show");
        // }

        // function UpdateUser(){
        //     var update_first_name = $('#update_first_name').val();
        //     var update_last_name = $('#update_last_name').val();
        //     var update_gender = $('#update_gender').val();
        //     var update_contact_no = $('#update_contact_no').val();
        //     var update_birthdate = $('#update_birthdate').val();
        //     var update_email = $('#update_email').val();
        //     var update_password = $('#update_password').val();
        //     var hiddenID = $('#hiddenID').val();

        //     $.post("updateUser.php",{
        //         update_first_name:update_first_name,
        //         update_last_name:update_last_name,
        //         update_gender:update_gender,
        //         update_contact_no:update_contact_no,
        //         update_birthdate:update_birthdate,
        //         update_email:update_email,
        //         update_password:update_password,
        //         hiddenID:hiddenID
        //     }, function(data,status){
        //         $('#updateUser').modal('hide');
        //         displayData();
        //     });
        // }
    </script>
    <script>
        
    </script>
</body>

</html>