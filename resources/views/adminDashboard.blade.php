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
        <div class="row">
            <div class="col-6">

                <h1>Welcome admin {{ session('admin_username') }}!</h1>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#election-creation-modal">
                    Start a new election
                </button>
            </div>
            <div class="col-6">
                <h1>Elections: </h1>
                @if (session('election_name'))
                <p>
                    {{session('department_name')}}
                </p>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                    data-bs-target="#election-deletion-modal">
                    Edit election
                </button>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#election-deletion-modal">
                    Delete election
                </button>
                @else
                <p>No elections added</p>
                @endif


            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="election-creation-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="election-creation-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="election-creation-modal-label">New election for: {{
                        session('department_name')}}
                    </h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add-election" class="form-control" id="election-creation-form">
                        @csrf

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


                        <hr>

                        <!-- <div class="row">
                            <div class="col-4">
                                <label for="department_name">Department:</label>
                                <select class="form-select" id="department_name" name="department_name">
                                    <option value="1">Institute of Applied and Aquatic Sciences (IAAS)</option>
                                    <option value="2">Institute of Computing (IC)</option>
                                    <option value="3">Institute of Leadership, Entrepreneurship and Good Governance
                                        (ILEGG)</option>
                                    <option value="4">Institute of Teacher Education (ITED)</option>
                                    <option value="5">Institute of Advanced Studies (IADS)</option>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="department_name">Department:</label>
                                <select class="form-select" id="department_name" name="department_name">
                                    <option value="1">Institute of Applied and Aquatic Sciences (IAAS)</option>
                                    <option value="2">Institute of Computing (IC)</option>
                                    <option value="3">Institute of Leadership, Entrepreneurship and Good Governance
                                        (ILEGG)</option>
                                    <option value="4">Institute of Teacher Education (ITED)</option>
                                    <option value="5">Institute of Advanced Studies (IADS)</option>
                                </select>
                            </div>




                            <div class="col-4">
                                <label for="department_name">Department:</label>
                                <select class="form-select" id="department_name" name="department_name">
                                    <option value="1">Institute of Applied and Aquatic Sciences (IAAS)</option>
                                    <option value="2">Institute of Computing (IC)</option>
                                    <option value="3">Institute of Leadership, Entrepreneurship and Good Governance
                                        (ILEGG)</option>
                                    <option value="4">Institute of Teacher Education (ITED)</option>
                                    <option value="5">Institute of Advanced Studies (IADS)</option>
                                </select>
                            </div>
                        </div> -->


                    </form>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="election-creation-submit-form" class="btn btn-success">Create</button>
                </div>
            </div>
        </div>
    </div>





















    <div class="modal fade" id="election-deletion-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="election-deletion-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="election-deletion-modal-label">Delete election: {{
                        session('department_name')}}
                    </h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/delete-election" class="form-control" id="election-deletion-form">
                        @csrf

                        <p>Are you sure you want to delete this election?</p>
                    </form>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="election-deletion-submit-form" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script>
        // Get the form element by its id
        var creationForm = $("#election-creation-form");

        // Get the button element by its id
        var creationButton = $("#election-creation-submit-form");

        // Add a click event listener to the button
        creationButton.click(function () {
            // Submit the form
            creationForm.submit();
        });


        var deletionForm = $("#election-deletion-form");

        var deletionButton = $("#election-deletion-submit-form");

        deletionButton.click(function () {
            // Submit the form
            deletionForm.submit();
        });


    </script>
</body>

</html>