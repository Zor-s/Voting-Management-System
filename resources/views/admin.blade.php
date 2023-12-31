<!doctype html>
<html lang="en">

<head>
    <!-- Set the character set and viewport for better compatibility -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Set the title of the page -->
    <title>Log in</title>

    <!-- Include Bootstrap CSS from a CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Include custom CSS from the 'css' directory -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <!-- Main container for content -->
    <div class="container">
        <!-- Two columns layout, one for content and one for login form -->
        <div class="row my-5 mx-1">
            <!-- Content column -->
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

            <!-- Login form column -->
            <div class="my-login-form col-sm-6 col-12 m-auto">
                <!-- Form for user login -->
                <form method="POST" action="/login-admin" class="m-3">
                    <!-- CSRF token for security -->
                    @csrf
                    <h1>Log in</h1>

                    <!-- Dropdown for selecting department -->
                    <label for="department_name">Department:</label>
                    <select class="form-select" id="department_name" name="department_name">
                        <!-- Options for different departments -->
                        <option value="1">Institute of Applied and Aquatic Sciences (IAAS)</option>
                        <option value="2">Institute of Computing (IC)</option>
                        <option value="3">Institute of Leadership, Entrepreneurship and Good Governance (ILEGG)</option>
                        <option value="4">Institute of Teacher Education (ITED)</option>
                        <option value="5">Institute of Advanced Studies (IADS)</option>
                    </select>

                    <br />

                    <!-- Input field for admin username -->
                    <label for="admin_username">Voter username:</label>
                    <input type="text" name="admin_username" id="admin_username" placeholder="Enter username"
                        class="form-control" required />

                    <br />

                    <!-- Input field for admin password -->
                    <label for="admin_password">Voter password:</label>
                    <input type="password" id="admin_password" name="admin_password" placeholder="Enter password"
                        class="form-control" required />
                    <br />

                    <!-- Login button -->
                    <button class="btn btn-outline-success m-1">Log in</button>

                    <br />
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS from a CDN for interactive features -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
