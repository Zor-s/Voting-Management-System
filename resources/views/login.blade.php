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
                        <option value="3">Institute of Leadership, Entrepreneurship and Good Governance (ILEGG)</option>
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