<?php
session_start();
include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Pawsitive Impact - Admin</title>
</head>

<body>
    <!-- Add Adoption Modal -->
    <div class="modal fade" id="addAnimal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Create New Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName">First Name</label>
                            <input type="text" class="form-control" id="addAdminFirstName" placeholder="Enter First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName">Last Name</label>
                            <input type="text" class="form-control" id="addAdminLastName" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputGender">Gender</label>
                            <select type='text' class="form-control" id="addAdminGender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputBirthdate">Birthdate</label>
                            <input type="date" class="form-control" id="addAdminBirthdate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Home Address</label>
                        <input type="text" class="form-control" id="addAdminAddress" placeholder="Enter Home Address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputContact">Contact Number</label>
                            <input type="text" class="form-control" id="addAdminContact" placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email Address</label>
                            <input type="text" class="form-control" id="addAdminEmail" placeholder="Enter Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="addAdminPassword" placeholder="Enter Password">
                    </div>
                    <input type="hidden" id="addUserType" value="Admin">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="InsertAdmin()">Add Admin</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Adoption Modal -->
    <div class="modal fade" id="editAnimal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Update Admin Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName">First Name</label>
                            <input type="text" class="form-control" id="updateAdminFirstName" placeholder="Enter First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName">Last Name</label>
                            <input type="text" class="form-control" id="updateAdminLastName" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputGender">Gender</label>
                            <select type='text' class="form-control" id="updateAdminGender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputBirthdate">Birthdate</label>
                            <input type="date" class="form-control" id="updateAdminBirthdate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Home Address</label>
                        <input type="text" class="form-control" id="updateAdminAddress" placeholder="Enter Home Address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputContact">Contact Number</label>
                            <input type="text" class="form-control" id="updateAdminContact" placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email Address</label>
                            <input type="text" class="form-control" id="updateAdminEmail" placeholder="Enter Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="updateAdminPassword" placeholder="Enter Password">
                    </div>
                    <select type='text' class="form-control" id="updateUserType">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="UpdateUser()">Update User</button>
                    <input type="hidden" id="hiddenUserID">
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-3 adminSidebar">
                <div class="nav flex-column fixed-left">
                    <h1 class="text-center my-3">Pawsitive Impact</h1>
                    <a class="nav-link my-2" href="admin_home.php">
                        <h5><i class="fa-solid fa-gauge"></i> Dashboard</h5>
                    </a>

                    <a class="nav-link my-2" href="admin_users.php">
                        <h5><i class="fa-solid fa-users"></i> Users</h5>
                    </a>
                    <a class="nav-link my-2" href="admin_animals.php">
                        <h5><i class="fa-solid fa-paw"></i> Animals</h5>
                    </a>
                    <a class="nav-link my-2" href="admin_adopt.php">
                        <h5><i class="fa-solid fa-heart"></i> Adoptions</h5>
                    </a>
                    <a class="nav-link my-2" href="admin_donate.php">
                        <h5><i class="fa-solid fa-handshake-angle"></i> Donations</h5>
                    </a>
                    <a class="nav-link my-2" href="admin_transactions.php">
                        <h5><i class="fa-solid fa-list"></i> Transactions</h5>
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-9 main_content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light adminTopbar">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <h6 class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user fa-fw"></i> <?= $_SESSION['auth_user']['user_name']; ?>
                                </h6>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" href="#">My Profile</button>
                                    <form action="functions.php" method="POST">
                                        <button type="submit" name="logoutButton" class="dropdown-item">Log Out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Table Content -->

                <div class="container">
                    <div class="jumbotron my-2">
                        <div class="card">
                            <h1 class="text-center my-2">Adoption Records</h1>
                        </div>

                        <button type="button" class="btn btn-dark my-2" data-toggle="modal" data-target="#createAdmin">
                            <i class="fa-solid fa-plus"></i> Add New Adoption
                        </button>

                        <!-- Adoption Table -->
                        <div class="card my-3 p-3">
                            <?php
                            $sql = "SELECT concat_ws(' ', u.user_fname, u.user_lname) AS Owner,
                            a.animal_name AS Name,
                            a.animal_type AS Type,
                            d.date_listed AS Date,
                            d.adoption_description AS Description,
                            d.adoption_status AS Status
                            FROM adoption_listing AS d
                            JOIN animal_identification AS a
                            ON a.animal_id = d.animal_adoption_id
                            JOIN user_details AS u
                            ON u.user_id = d.user_adoption_id";
                            $result = mysqli_query($con, $sql);
                            ?>
                            <table id="displayAdoptionTable" class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Owner</th>
                                        <th scope="col">Animal Name</th>
                                        <th scope="col">Animal Type</th>
                                        <th scope="col">Date Posted</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Operaions</th>
                                    </tr>
                                </thead>
                                <?php
                                if ($result) {
                                    foreach ($result as $row) {
                                ?>

                                        <tr>
                                            <td><?php echo $row['Owner']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['Type']; ?></td>
                                            <td><?php echo $row['Date']; ?></td>
                                            <td><?php echo $row['Description']; ?></td>
                                            <td><?php echo $row['Status']; ?></td>
                                            <td>
                                                <button class="btn btn-dark" onclick="GetAnimalDetails()"><i class="fa-solid fa-pen"></i></button>
                                                <button class="btn btn-danger" onclick="DeleteAnimal()"><i class="fa-solid fa-trash"></i></button>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/adminFunctions.js"></script>
    <script>
        $(document).ready(function() {
            $('#displayAdoptionTable').DataTable({
                pagingType: 'full_numbers',
                scrollX: true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Adoption Records"
                }
            });
        });
    </script>
</body>

</html>