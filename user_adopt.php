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
    <link rel="stylesheet" href="./css/style.css">
    <title>Pawsitive Impact</title>
</head>

<body>

    <!-- Top Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg" id="headerNav">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img class="img-fluid" src="./images/pawsitive-logo.png" alt="">
                </a>
                <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link active" href="user_events.php">Events</a> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="user_adopt.php">Adopt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_donate.php">Donate</a>
                        </li>


                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <?php if (isset($_SESSION['auth_user'])) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <?= $_SESSION['auth_user']['user_name']; ?>
                                </a>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" href="#">My Profile</button>
                                    <form action="functions.php" method="POST">
                                        <button type="submit" name="logoutButton" class="dropdown-item">Log Out</button>
                                    </form>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target="#SignIn"><i class="fa-solid fa-user"></i> Log in</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sign In Modal -->
    <div class="modal fade" id="SignIn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title w-100" id="exampleModalLabel">Log in</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="loginUser.php" method="POST">
                        <div class="form-group">
                            <label for="inputLoginEmail">Email address</label>
                            <input type="email" class="form-control" name="userEmail" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <label for="inputLoginPassword">Password</label>
                            <input type="password" class="form-control" name="userPassword" placeholder="Enter Password">
                        </div>
                        <div class="modal-footer">
                            <p class="mr-auto">Not Signed In Yet? <a class="" type="button" data-toggle="modal" data-target="#CreateAccount" data-dismiss="modal"> Create Account</a></p>
                            <div type="button" class="btn btn-secondary" data-dismiss="modal">Close</div>
                            <button type="submit" name="loginButton" class="btn btn-1">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Account Modal -->
    <div class="modal fade" id="CreateAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title w-100" id="exampleModalLabel">Create Account</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName">First Name</label>
                            <input required type="text" class="form-control" id="addUserFirstName" placeholder="Enter First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName">Last Name</label>
                            <input required type="text" class="form-control" id="addUserLastName" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputGender">Gender</label>
                            <select required type='text' class="form-control" id="addUserGender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputBirthdate">Birthdate</label>
                            <input required type="date" class="form-control" id="addUserBirthdate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input required type="text" class="form-control" id="addUserAddress" placeholder="Enter Home Address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputContactNo">Contact Number</label>
                            <input required type="text" class="form-control" id="addUserContact" placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email Adress</label>
                            <input required type="email" class="form-control" id="addUserEmail" placeholder="Enter Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password*</label>
                        <input required type="password" class="form-control" id="addPassword" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="inputConfirmPassword">Confirm Password*</label>
                        <input required type="password" class="form-control" id="addConfirmPassword" placeholder="Confirm Entered Password">
                    </div>
                    <input type="hidden" id="addUserType" value="User">
                </div>
                <div class="modal-footer">
                    <p class="mr-auto">Already Have An Account? <a class="" type="button" data-toggle="modal" data-target="#SignIn" data-dismiss="modal"> Sign In</a></p>
                    <div type="button" class="btn btn-secondary" data-dismiss="modal">Close</div>
                    <button type="button" class="btn btn-1" onclick="InsertUser()">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Adoption Post Modal -->
    <div class="modal fade" id="PostAdoption" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Adoption Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="addAdoption.php" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">
                        <h6 class="text-center">Animal Details</h6>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAnimalName">Animal Name</label>
                                <input required type="text" class="form-control" id="addAnimalName" name="addAnimalName" placeholder="Enter Animal Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAnimalName">Animal Type (Dog, Cat, etc.)</label>
                                <input required type="text" class="form-control" id="addAnimalType" name="addAnimalType" placeholder="Enter Animal Type">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAnimalName">Animal Age (# years and # months | # months)</label>
                                <input required type="text" class="form-control" id="addAnimalAge" name="addAnimalAge" placeholder="Enter Animal Age">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAnimalName">Animal Gender</label>
                                <select required type='text' class="form-control" id="addAnimalGender" name="addAnimalGender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAnimalName">Animal Breed (Optional)</label>
                                <input required type="text" class="form-control" id="addAnimalBreed" name="addAnimalBreed" placeholder="Enter Animal Breed">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAnimalName">Animal Weight (KGs)</label>
                                <input required type="text" class="form-control" id="addAnimalWeight" name="addAnimalWeight" placeholder="Enter Animal Weight">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Kapon Date (Optional)</label>
                            <input type="date" class="form-control" id="addAnimalKapon" name="addAnimalKapon">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Anti-Rabies Date (Optional)</label>
                            <input type="date" class="form-control" id="addAnimalArv" name="addAnimalArv">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Deworm Date (Optional)</label>
                            <input type="date" class="form-control" id="addAnimalDeworm" name="addAnimalDeworm">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Animal Profile Image</label>
                            <input required type="file" class="form-control" id="addAnimalImage" name="addAnimalImage">
                        </div>

                        <h6 class="text-center">Adoption Description</h6>
                        <div class="form-group">
                            <label for="inputAnimalName">Reason for Adoption (50 Words Only)</label>
                            <input type="text" class="form-control" id="addAdoptionDescription" name="addAdoptionDescription" placeholder="Enter Reason for Adoption">
                        </div>
                        <input type="hidden" id="addAdoptionStatus" name="addAdoptionStatus" value="Ongoing">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="postAdoptionButton" class="btn btn-1">Post Adoption</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Title -->
    <h1 class="text-center">"Be the hero in a shelter animal's story - adopt and save a life today."</h1>

    <!-- If user is loggedin -->
    <?php if (isset($_SESSION['auth_user'])) : ?>
        <h6 class="text-center"><button class="btn btn-1" data-toggle="modal" data-target="#PostAdoption">Post an Animal for Adoption? Click Here!</button></h6>
        <!-- If user is not loggedin -->
    <?php else : ?>
        <h6 class="text-center">Want to post an Animal for Adoption? <a href="" data-toggle="modal" data-target="#SignIn">Sign in Now.</a></h6>
    <?php endif; ?>

    <!-- Session Messages -->
    <?php include('sessionMessage.php') ?>

    <!-- Main Contents -->
    <div class="container-fluid mt-3 py-3">
        <div class="row">

            <?php
            $sql = "SELECT 
                concat_ws(' ', u.user_fname, u.user_lname) AS Username,
                u.user_email AS Email ,
                u.user_contactno AS Contact,
                a.animal_name AS Name,
                a.animal_type AS Type,
                a.animal_age AS Age,
                a.animal_gender AS Gender,
                a.animal_breed AS Breed,
                a.animal_weight AS Weight,
                a.kapon_date AS Kapon,
                a.arv_date AS Arv,
                a.deworm_date AS Deworm,
                a.animal_image AS Image,
                d.adoption_description AS Description,
                d.date_listed AS PostedOn,
                d.adoption_status AS Status
            FROM adoption_listing as d
            JOIN animal_identification as a
                ON a.animal_id = d.animal_adoption_id
            JOIN user_details as u
                ON u.user_id = d.user_adoption_id
            WHERE d.adoption_status = 'Ongoing';";
            $result = mysqli_query($con, $sql);
            $check_result = mysqli_num_rows($result) > 0;

            if ($check_result) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="col-xl-6">
                        <div class="card mb-3 m-1 shadow-lg" style="background-color:rgba(255, 156, 0, );">
                            <div class="row no-gutters">
                                <div class="col-md-5">
                                    <img src="./uploads/animals/<?php echo $row['Image']; ?>" class="rounded mx-auto img-fluid" style="height: 100%; width:100%; object-fit:fill; object-position: 50% 50%;" alt="Animal Image">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                    <h5 class=" card-title"><?php echo $row['Name']; ?></h5>
                                        <p class="card-text">
                                            <b>Please Contact:</b> <?php echo $row['Username']; ?> | <?php echo $row['Contact']; ?> | <?php echo $row['Email']; ?><br>
                                            <b>Type:</b> <?php echo $row['Type']; ?> <br>
                                            <b>Age:</b> <?php echo $row['Age']; ?> <br>
                                            <b>Gender:</b> <?php echo $row['Gender']; ?> <br>
                                            <b>Breed:</b> <?php echo $row['Breed']; ?> <br>
                                            <b>Weight (KGs):</b> <?php echo $row['Weight']; ?> <br>
                                            <b>Kapon:</b> <?php echo $row['Kapon']; ?> <br>
                                            <b>Anti-Rabies:</b> <?php echo $row['Arv']; ?> <br>
                                            <b>Deworm:</b> <?php echo $row['Deworm']; ?> <br>
                                            <!-- <b>Status:</b> <?php echo $row['Status']; ?> <br> -->
                                        </p>
                                        <div class="card p-2 bg-light shadow-sm" style="min-height: 150px;">
                                            <p class="card-text"><?php echo $row['Description']; ?></p>
                                        </div>
                                        <p class="card-text"><small class="text-muted"><b>Posted On: <?php echo $row['PostedOn']; ?></b></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php

                }
            } else {
                echo "No Data Found.";
            }
            ?>


        </div>
    </div>

    <!-- Footer -->
    <footer class="footerNav">
        <div class="container my-5 ">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-fluid" src="./images/pawsitive-logo.png" alt="Pawsitive Impact Logo">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam at culpa perferendis commodi quisquam! Dignissimos, dicta fugiat. Recusandae, numquam deserunt.<a href="#"> Read More...</a>
                    </p>
                    <a class="p-2" href=""><i class="fa-brands fa-2x fa-facebook"></i></a>
                    <a class="p-2" href=""><i class="fa-brands fa-2x fa-twitter"></i></a>
                    <a class="p-2" href=""><i class="fa-brands fa-2x fa-instagram"></i></a>
                    <a class="p-2" href=""><i class="fa-brands fa-2x fa-youtube"></i></a>
                </div>
                <div class="col-md-3">
                    <h3>Important Links</h3>
                    <a class="mylinks" href="">Privacy Policy</a><br>
                    <a class="mylinks" href="">Youtube Channel</a><br>
                    <a class="mylinks" href="">Community Articles</a><br>
                    <a class="mylinks" href="">Social Media</a><br>
                </div>
                <div class="col-md-3">
                    <h3>Our Services</h3>
                    <a href="" class="mylinks">Web Develpment</a><br>
                    <a href="" class="mylinks">Grooming and Bathing</a><br>
                    <a href="" class="mylinks">Training and Obedience Classes</a><br>
                    <a href="" class="mylinks">Veterinary Services</a><br>
                    <a href="" class="mylinks">Pet Adoption and Rescue</a><br>
                    <a href="" class="mylinks">End-of-Life Care</a><br>
                </div>
                <div class="col-md-3">
                    <h3>Contact Us</h3>
                    <a href="tel:+63987654321"><i class="fa-solid fa-phone"></i> +(63) 0987654321</a><br>
                    <a href="mailto:pawsitiveimpact@email.com"><i class="fa-solid fa-envelope"></i> pawsitiveimpact@email.com</a><br>
                    <iframe class="embed-responsive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.9988708477917!2d121.00965781451596!3d14.599140081027153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9dd97a1439b%3A0x44e1b969e7f1f67a!2sPUP%20Main%20-%20A.%20Mabini%20Campus%2C%20Sta.%20Mesa%2C%20Manila!5e0!3m2!1sen!2sph!4v1676006290584!5m2!1sen!2sph" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row copyrightFooter">
                <div class="col ">Copyright © 2023 Pawsitive Impact</div>
                <div class="col text-right">Powered by Pawsitive Impact</div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/userFunctions.js"></script>

</body>

</html>