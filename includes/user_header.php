<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.3.0-web/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="./css/style.css">
    <link type="text/javascript" href="./js/functions.js">
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
                            <a class="nav-link" href="user_home.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="user_events.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="user_adopt.php">Adopt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_donate.php">Donate</a>
                        </li>
                    </ul>
                    <!-- Login Button -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <div type="button" class="nav-link btn" data-toggle="modal" data-target="#SignIn"><i class="fa-solid fa-user"></i> Log in</div>
                        </li>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <p class="mr-auto">Not Signed In Yet? <a class="" type="button" data-toggle="modal" data-target="#CreateAccount" data-dismiss="modal"> Create Account</a></p>
                    <div type="button" data-dismiss="modal">Close</div>
                    <button type="submit" name="loginButton" class="btn btn-primary">Log in</button>
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
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirstName">First Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLastName">Last Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputGender">Gender</label>
                                <select type='text' class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputBirthdate">Birthdate</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputContactNo">Contact Number</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail">Email Adress</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password*</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputConfirmPassword">Confirm Password*</label>
                            <input type="password" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p class="mr-auto">Already Have An Account? <a class="" type="button" data-toggle="modal" data-target="#SignIn" data-dismiss="modal"> Sign In</a></p>
                    <div type="button" data-dismiss="modal">Close</div>
                    <button type="button" class="btn btn-primary">Sign Up</button>
                </div>
            </div>
        </div>
    </div>