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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-1" onclick="InsertUser()">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Carousel -->
    <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/bg-homepage-1.jpg" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Adoption Success Stories</h5>
                        <p>Highlight heartwarming stories of pets who have found their forever homes through the organization.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/bg-homepage-2.jpg" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Health and Wellness Tips</h5>
                        <p>Provide advice on how to keep pets healthy and happy, including exercise, nutrition, and mental health.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/bg-homepage-3.jpg" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lost and Found Database</h5>
                        <p>Allow pet owners to post lost and found listings to increase the chances of reuniting pets with their families.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section>

    <!-- Content -->
    <section>
        <div class="container my-5">
            <div class="row align-items-center">
            <?php include('sessionMessage.php'); ?>
                <div class="col-lg-6 text-center">
                    <img src="./images/dog-2.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 mx-auto">
                    <h1>We Love Your Pet, Just as You Do!</h1><br>
                    <p>Pawsitive Impact is a non-profit organization located in the Philippines, dedicated to improving the lives of animals. Our mission is to make a positive impact in the animal community through animal donations, adoptions, and fostering a community of animal lovers. We believe in providing loving homes and expert care to every animal in need. Our team works tirelessly to create a safe and nurturing environment for every pet, promoting compassion and kindness towards all creatures. Join us in making a difference and creating a pawsitive impact in the lives of animals.</p><br>
                    <!-- <a href="about.php" class="btn btn-1">Know more...</a> -->
                </div>
            </div>
        </div>
    </section>

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