<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">


</head>

<body>
    <nav class="navbar navbar-expand-sm bg-body-tertiary">
        <div class="container-fluid mx-5">
            <!-- <a class="navbar-brand disabled" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse row" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex justify-content-center">
                    <a class="nav-link active col" aria-current="page" href="#">Home</a>
                    <a class="nav-link col" href="#">Voting result</a>
                    <a class="nav-link col" href="/admin">logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container m-5">

        <h1>Welcome admin {{ session('admin_username') }}!</h1>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Start a new election
        </button>
        
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">New election for: {{
                        session('department_name')}}
                    </h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add-election" class="form-control" id="electionForm">
                        @csrf
                        <p>


                        </p>
                        <div class="row">
                            <div class="col-6">
                                <label for="election_start">Election Start(date and time):</label>
                                <input class="form-control" type="datetime-local" id="election_start"
                                    name="election_start">
                            </div>

                            <div class="col-6">
                                <label for="election_end">Election Start(date and time):</label>
                                <input class="form-control" type="datetime-local" id="election_end" name="election_end">
                            </div>

                        </div>


                    </form>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="electionFormSubmit" class="btn btn-success">Create</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Get the form element by its id
        var form = document.getElementById("electionForm");

        // Get the button element by its id
        var button = document.getElementById("electionFormSubmit");

        // Add a click event listener to the button
        button.addEventListener("click", function () {
            // Submit the form
            form.submit();
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>