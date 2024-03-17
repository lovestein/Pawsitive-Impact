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
                            <h1 class="text-center my-2">Donation Transactions Records</h1>
                        </div>

                        <!-- <button type="button" class="btn btn-dark my-2" data-toggle="modal" data-target="#createAdmin">
                            <i class="fa-solid fa-plus"></i> Add New Animal
                        </button> -->

                        <!-- Transactions Table -->
                        <div class="card my-3 p-3">
                            <?php
                            $sql = "SELECT d.donation_transaction_id AS ID,
                            a.animal_name AS Recipient,
                            d.donor_name AS Name,
                            d.payment_method AS pMethod,
                            d.amount_donated AS Amount,
                            d.date_donated AS Date,
                            d.donation_message AS Message
                            FROM donation_transactions AS d
                            JOIN animal_identification AS a
                            ON d.animal_transaction_id = a.animal_id";
                            $result = mysqli_query($con, $sql);
                            ?>
                            <table id="displayTransactionTable" class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Transaction #</th>
                                        <th scope="col">Animal Recipient</th>
                                        <th scope="col">Donor Name</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Amount Donated</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Operaions</th>
                                    </tr>
                                </thead>
                                <?php
                                if ($result) {
                                    foreach ($result as $row) {
                                ?>

                                        <tr>
                                            <td><?php echo $row['ID']; ?></td>
                                            <td><?php echo $row['Recipient']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['pMethod']; ?></td>
                                            <td><?php echo $row['Amount']; ?></td>
                                            <td><?php echo $row['Date']; ?></td>
                                            <td><?php echo $row['Message']; ?></td>
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
            $('#displayTransactionTable').DataTable({
                pagingType: 'full_numbers',
                scrollX: true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Transaction Records"
                }
            });
        });
    </script>
</body>

</html>