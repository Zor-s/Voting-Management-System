<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>

<body>
    <!-- Container for the entire content -->
    <div class="container">

        <!-- Row for organizing content, with margin and padding -->

        <div class="row mx-1 my-5">

            <!-- form for user signup -->
            <div class="my-login-form col-sm-6 col-12 m-auto">
                <form id="voterForm" method="POST" action="/signup" class="">
                    @csrf
                    <h1>Sign up</h1>

                    <label for="department_id">Department:</label>
                    <select class="form-select" id="department_id" name="department_name">
                        <option value="1">Institute of Applied and Aquatic Sciences (IAAS)</option>
                        <option value="2">Institute of Computing (IC)</option>
                        <option value="3">Institute of Leadership, Entrepreneurship and Good Governance (ILEGG)
                        </option>
                        <option value="4">Institute of Teacher Education (ITED)</option>
                        <option value="5">Institute of Advanced Studies (IADS)</option>
                    </select>

                    <label for="voter_email">Voter email:</label>
                    <input type="email" name="voter_email" id="voter_email" placeholder="Enter email"
                        class="form-control" required />

                    <label for="voter_username">Voter username:</label>
                    <input type="text" name="voter_username" id="voter_username" placeholder="Enter username"
                        class="form-control" required />

                    <div class="row">
                        <div class="col">
                            <label for="voter_age">Age:</label>
                            <input type="number" name="voter_age" id="voter_age" class="form-control" required />
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <p>Gender:</p>
                                <input class="form-check-input" type="radio" name="voter_gender" id="male"
                                    value="male" required />
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="voter_gender" id="female"
                                    value="female" required />
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>

                    <label for="voterPassword">Voter password:</label>
                    <input type="password" id="voterPassword" name="voter_password" placeholder="Enter password"
                        class="form-control" required />

                    <label for="repeatPassword">Repeat password:</label>
                    <input type="password" id="repeatPassword" name="voter_repeat_password" placeholder="Enter password"
                        class="form-control" required />

                    <input type="submit" class="btn btn-outline-success" value="Sign up">

                    <a href="/">
                        <button type="button" class="btn btn-outline-primary m-1">
                            Log in
                        </button>
                    </a>
                </form>
            </div>
            <!-- Content for the sign up -->
            <div class="my-content col-sm-6 col-12 m-auto pt-3">
                <h1>Register to Vote: Your Voice, Your Choice!</h1>
                <br>
                <p>Welcome to our voter registration page! Exercise your democratic right by signing up to vote in
                    upcoming elections. By registering, you empower yourself to make a difference in your community and
                    beyond. Your voice matters, and this is your opportunity to shape the future. Simply fill out the
                    form below to become a registered voter, and let your opinions count. Together, we can build a
                    stronger, more inclusive democracy. Join us in making a meaningful impact – register now!.</p>
            </div>
        </div>
    </div>




    <!-- Include Bootstrap JavaScript library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


    <script>
        // for the modal form submission and validation
        document.getElementById('voterForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var voterPassword = document.getElementById('voterPassword').value;
            var repeatPassword = document.getElementById('repeatPassword').value;

            if (voterPassword !== repeatPassword) {
                alert('Passwords do not match. Please try again.');
            } else {
                this.submit();
            }
        });
    </script>


</body>

</html>
