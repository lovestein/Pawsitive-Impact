<?php
session_start();
include('connection.php');
include('authentication.php');
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

    <!-- Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-3 adminSidebar">
                <div class="nav flex-column fixed-left">
                    <h1 class="text-center my-3">Pawsitive Impact</h1>
                    <a class="nav-link my-2" href="admin_home.php">
                        <h5><i class="fa-solid fa-gauge fa-fw"></i> Dashboard</h5>
                    </a>

                    <a class="nav-link my-2" href="admin_users.php">
                        <h5><i class="fa-solid fa-users fa-fw"></i> Users</h5>
                    </a>
                    <a class="nav-link my-2" href="admin_animals.php">
                        <h5><i class="fa-solid fa-paw fa-fw"></i> Animals</h5>
                    </a>
                    <a class="nav-link my-2" href="admin_adopt.php">
                        <h5><i class="fa-solid fa-heart fa-fw"></i> Adoptions</h5>
                    </a>
                    <a class="nav-link my-2" href="admin_donate.php">
                        <h5><i class="fa-solid fa-handshake-angle fa-fw"></i> Donations</h5>
                    </a>
                    <a class="nav-link my-2" href="admin_transactions.php">
                        <h5><i class="fa-solid fa-list fa-fw"></i> Transactions</h5>
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

                <?php include('sessionMessage.php'); ?>

                <!-- Title -->
                <div class="container-fluid">
                    <div class="jumbotron my-2">
                        <div class="card">
                            <h1 class="text-center my-2">Admin Dashboard</h1>
                        </div>
                    </div>

                    <!-- Count Details -->
                    <div class="row">
                        <!-- Total Admin -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1 text-center">
                                                Admins</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $user_type = 'Admin';
                                                $sql = "SELECT user_id FROM user_details WHERE user_type = '$user_type'";
                                                $result = mysqli_query($con, $sql);

                                                $row = mysqli_num_rows($result);
                                                echo '<h4 class="text-center">' . $row . ' </h4>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Users -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1 text-center">
                                                Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $user_type = 'User';
                                                $sql = "SELECT user_id FROM user_details WHERE user_type = '$user_type'";
                                                $result = mysqli_query($con, $sql);

                                                $row = mysqli_num_rows($result);
                                                echo '<h4 class="text-center">' . $row . ' </h4>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Animal -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1 text-center">
                                                Animals</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php

                                                $sql = "SELECT * FROM animal_identification";
                                                $result = mysqli_query($con, $sql);

                                                $row = mysqli_num_rows($result);
                                                echo '<h4 class="text-center">' .  $row . ' </h4>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-paw fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Adoption -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1 text-center">
                                                Adoptions</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php

                                                $sql = "SELECT * FROM adoption_listing";
                                                $result = mysqli_query($con, $sql);

                                                $row = mysqli_num_rows($result);
                                                echo '<h4 class="text-center">' . $row . ' </h4>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-heart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Donations -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1 text-center">
                                                Donations</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php

                                                $sql = "SELECT * FROM donation_listing";
                                                $result = mysqli_query($con, $sql);

                                                $row = mysqli_num_rows($result);
                                                echo '<h4 class="text-center">' . $row . ' </h4>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-handshake-angle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Transactions -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1 text-center">
                                                Transactions</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php

                                                $sql = "SELECT * FROM donation_transactions";
                                                $result = mysqli_query($con, $sql);

                                                $row = mysqli_num_rows($result);
                                                echo '<h4 class="text-center">' . $row . ' </h4>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
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


</body>

</html>