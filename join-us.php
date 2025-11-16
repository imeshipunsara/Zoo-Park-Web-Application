<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo park - Event</title>

    <?php include 'layout-header.php'; ?>
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 10px;
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    $active_page = 'join-us';

    include 'nav.php';


    ?>

    <?php

    session_start();

    require_once './models/CommunityMember.php';
    require_once './my_exception.php';

    // when login form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "FORM POST";
    
        $member = new CommunityMember();
        try {
            if (!isset($_POST['email']) || !isset($_POST['password'])) {
                throw new MyException("Username and password are required");
            }

            $email = $_POST['email'];
            $password = $_POST['password'];
            $member->login($email, $password);

            $member_id = $member->get_id();
            $_SESSION['member_id'] = $member_id;
            $_SESSION['IS_MEMBER_LOGGED_IN'] = true;
            $_SESSION['MEMBER_USERNAME'] = $member->get_email();
        } catch (Exception $ex) {
            echo "<p class='error-message'>" . $ex->getMessage() . "</p>";

        }
    }

    // if admin already logged in then redirect to admin panel
    if (isset($_SESSION['IS_MEMBER_LOGGED_IN']) && $_SESSION['IS_MEMBER_LOGGED_IN'] == true) {
        header('Location: ' . $APP_BASE_PATH . '/member/?manage=edu_informations');
        exit();
    }

    ?>

    <h1>Join us for our Commiunity</h1>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Login</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email1" required
                        placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password1" required
                        placeholder="Enter your password">
                </div>
                <div class="d-grid">
                    <button class="btn btn-warning">Login</button>
                </div>
            </form>
        </div>
    </div>
    <p>volunteer Registraion ....</p>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Registration</h2>
            <form id="my-registration-form">
                <!-- First Name -->
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" required placeholder="Enter your first name">
                </div>
                <!-- Last Name -->
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" required placeholder="Enter your last name">
                </div>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" required placeholder="Enter your email">
                </div>
                <!-- Contact Number -->
                <div class="mb-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="tel" class="form-control" id="contactNumber" placeholder="Enter your contact number">
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required
                        placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password2" required placeholder="Confirm password">
                </div>
                <!-- Gender -->
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" required>
                        <option selected>Select your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <!-- Age -->
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" required placeholder="Enter your age">
                </div>
                <!-- Submit Button -->
                <div class="d-grid">
                    <div onclick="SubmitForm()" id="form-submit-button" class="btn btn-success">Register</div>
                </div>
                <div id="form-submit-success" style="display: none;">
                    <div class="alert alert-success" role="alert">
                        Registration success
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>


        // dev code :
        // after registraion completed we will remove this code
        setTimeout(() => {
            $("#firstName").val('Imeshi');
            $("#lastName").val('Punsara');
            $("#email").val('imeshipunsara@gmail.com');
            $("#contactNumber").val('0545346546');
            $("#password").val('123456');
            $("#password2").val('123456');
            $("#gender").val('female');
            $("#age").val('22');
        }, 1000);

        function SubmitForm() {
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var email = $("#email").val();
            var contactNumber = $("#contactNumber").val();
            var password = $("#password").val();
            var password2 = $("#password2").val();
            var gender = $("#gender").val();
            var age = $("#age").val();

            if (firstName === "" || lastName === "" || email === "" || contactNumber === "" || password === "" || age == "") {
                alert("All fields are required");
                return;
            }
            if (gender != 'male' && gender != 'female') {
                alert("Please select gender");
                return;
            }

            if (password !== password2) {
                alert("Password and Confirm Password should be same");
                return;
            }


            console.log(
                {
                    firstName: firstName,
                    lastName: lastName,
                    email: email,
                    contactNumber: contactNumber,
                    password: password,
                    password2: password2,
                    gender: gender,
                    age: age,
                }
            );

            // send data to server
            $.post({
                url: 'community-member-registration.php',
                data: {
                    first_name: firstName,
                    last_name: lastName,
                    email: email,
                    contact_number: contactNumber,
                    password: password,
                    gender: gender,
                    age: age,
                }
            }).done(function (data) {
                console.log(data);
                if (data === 'success') {
                    $("#form-submit-success").css("display", "inline");
                    $("#form-submit-button").hide();
                    $('#my-registration-form')[0].reset();
                } else {
                    alert(data);
                }
            }).fail(function (data) {
                console.log(data);
            });

        }
    </script>

    <?php include 'layout-footer.php'; ?>
</body>

</html>