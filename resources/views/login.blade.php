<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <style>
        /* * {

            border: 3px solid red;

        } */


        /* @media screen and (max-width: 768px) {
            .container .row {
                flex-direction: column;
            }
        } */
    </style>

</head>


<body>


    <div class="container">
        <div class="row my-5 mx-1">
            <div class="my-content col-sm-6 col-12 m-auto">
                <h1>Voting Management System</h1>
                <br />
                <p>
                    In today's dynamic world, conducting fair and efficient
                    elections is crucial for organizations of all sizes. Our
                    user-friendly Voting Management System is designed to
                    streamline the entire election process, from voter
                    registration to ballot generation and result tabulation.
                </p>
            </div>

            <div class="my-login-form col-sm-6 col-12 m-auto">
                <form method="POST" action="/login" class="m-3">
                    @csrf
                    <h1>Log in</h1>

                    <label for="department_name">Department:</label>
                    <select class="form-select" id="department_name" name="department_name">
                        <option value="1">Institute of Applied and Aquatic Sciences (IAAS)</option>
                        <option value="2">Institute of Computing (IC)</option>
                        <option value="3">Institute of Leadership, Entrepreneurship and Good Governance (ILEGG)
                        </option>
                        <option value="4">Institute of Teacher Education (ITED)</option>
                        <option value="5">Institute of Advanced Studies (IADS)</option>
                    </select>

                    <br />

                    <label for="voter_username">Voter username:</label>
                    <input type="text" name="voter_username" id="voter_username" placeholder="Enter username"
                        class="form-control" />

                    <br />

                    <label for="voter_password">Voter password:</label>
                    <input type="password" id="voter_password" name="voter_password" placeholder="Enter password"
                        class="form-control" />
                    <br />

                    <button class="btn btn-outline-success m-1">Log in</button>
                    <a href="/signup-page">
                        <button type="button" class="btn btn-outline-primary">
                            Sign up
                        </button>
                    </a>

                    <br />

                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="" data-bs-toggle="modal" data-bs-target="#forgot-password-modal">forgot
                        password?</a>
                </form>

            </div>
        </div>
    </div>


    <div class="modal fade" id="forgot-password-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="forgot-password-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="forgot-password-modal-label"> Forgot password
                    </h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/forgot-password" class="form-control" id="forgot-password-form">
                        @csrf

                        <label for="voter_email">Voter email:</label>
                        <input type="email" name="voter_email" id="voter_email" placeholder="Enter email"
                            class="form-control" />

                        <label for="voterPassword">Voter password:</label>
                        <input type="password" id="voterPassword" name="voter_password" placeholder="Enter password"
                            class="form-control" />

                        <label for="repeatPassword">Repeat password:</label>
                        <input type="password" id="repeatPassword" name="voter_repeat_password"
                            placeholder="Enter password" class="form-control" />

                    </form>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="forgot-password-submit-form" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script>
        var forgotPasswordForm = $("#forgot-password-form");
        var forgotPasswordButton = $("#forgot-password-submit-form");

        forgotPasswordButton.click(function() {
            var voterPassword = $('#voterPassword').val();
            var repeatPassword = $('#repeatPassword').val();

            if (voterPassword !== repeatPassword) {
                alert('Passwords do not match. Please try again.');
            } else {
                // Passwords match, submit the form
                forgotPasswordForm.submit();
            }
        });
    </script>
</body>

</html>
