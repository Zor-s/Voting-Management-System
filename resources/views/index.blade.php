<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <style>
        /* * {

            border: 3px solid red;

        } */


        @media screen and (max-width: 768px) {
            .container .row {
                flex-direction: column;
            }
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row d-md-flex justify-content-evenly m-5">
            <div class="col my-content  m-2">
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

            <div class="col my-login-form  m-2">
                <form method="POST" action="/voter" class="m-3">
                    <h1>Log in</h1>

                    <label for="department_name">Department:</label>
                    <select class="form-select" id="department_name" name="department_name">
                        <option selected>Department</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
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
                    <a href="/signup">
                        <button type="button" class="btn btn-outline-primary">
                            Sign up
                        </button>
                    </a>

                    <br />

                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="">forgot password?</a>
                </form>

            </div>
        </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>