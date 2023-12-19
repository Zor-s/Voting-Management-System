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

                <h1>Welcome, admin {{ session('admin_username') }}!</h1>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#election-creation-modal">
                    Start a new election
                </button>

            </div>
            <div class="col-6">
                <h1>Elections: </h1>
                @if (session('election_department_id'))
                <p>
                    {{session('department_name')}}
                </p>

                <p>Start: {{session('election_start')}}</p>
                <p>End: {{session('election_end')}}</p>

                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#candidate-creation-modal">
                    Add candidates
                </button>

                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                    data-bs-target="#election-edit-modal">
                    Edit election
                </button>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#election-deletion-modal">
                    Delete election
                </button>


                <p>List of candidates</p>

                <ol>
                    @foreach (session('positions') as $position)
                    <li>{{ $position->position_name }}

                        <a href=""
                            class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                            data-bs-toggle="modal" data-bs-target="#position-deletion-modal"
                            data-position-id="{{ $position->id }}">Delete</a>
                        <ol>
                            @foreach (session('candidates') as $candidate)
                            @if ($candidate->position_id == $position->id && $candidate->department_id == session('election_department_id'))                            <li>
                                {{ $candidate->candidate_full_name }} ({{
                                $candidate->candidate_party->candidate_party_name }})
                                <a href=""
                                    class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                    data-bs-toggle="modal" data-bs-target="#candidate-deletion-modal"
                                    data-candidate-id="{{ $candidate->id }}">Delete</a>
                            </li>
                            @endif
                            @endforeach
                        </ol>
                    </li>
                    @endforeach
                </ol>





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
                                <label for="election_end">Election End(date and time):</label>
                                <input class="form-control" type="datetime-local" id="election_end" name="election_end">
                            </div>

                        </div>



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





    <div class="modal fade" id="candidate-creation-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="candidate-creation-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="candidate-creation-modal-label">Add candidate for the election of:
                        {{
                        session('department_name')}}
                    </h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add-candidate" class="form-control" id="candidate-creation-form">
                        @csrf


                        <div class="row">
                            <div class="col-4">
                                <label class="text-nowrap" for="position_name">Candidate position:</label>
                                <input class="form-control" type="text" name="position_name" id="position_name">
                            </div>

                            <div class="col-4">
                                <label for="candidate_full_name">Candidate:</label>
                                <input class="form-control" type="text" name="candidate_full_name"
                                    id="candidate_full_name">
                            </div>

                            <div class="col-4">
                                <label for="candidate_party_name">Candidate party:</label>
                                <input class="form-control" type="text" name="candidate_party_name"
                                    id="candidate_party_name">
                            </div>

                        </div>

                    </form>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="candidate-creation-submit-form" class="btn btn-success">Add</button>
                </div>
            </div>
        </div>
    </div>

















    <div class="modal fade" id="election-edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="election-edit-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="election-edit-modal-label">Edit election for: {{
                        session('department_name')}}
                    </h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/edit-election" class="form-control" id="election-edit-form">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <label for="edit_election_start">Election Start(date and time):</label>
                                <input class="form-control" type="datetime-local" id="edit_election_start"
                                    name="edit_election_start">
                            </div>

                            <div class="col-6">
                                <label for="edit_election_end">Election End(date and time):</label>
                                <input class="form-control" type="datetime-local" id="edit_election_end"
                                    name="edit_election_end">
                            </div>

                        </div>



                    </form>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="election-edit-submit-form" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </div>
    </div>








    <div class="modal fade" id="candidate-deletion-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="candidate-deletion-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="candidate-deletion-modal-label">Delete candidate
                    </h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/delete-candidate" class="form-control" id="candidate-deletion-form">
                        @csrf
                        <input type="hidden" name="candidate_id" id="candidate_id" value="">

                        <p>Are you sure you want to delete this candidate?</p>
                    </form>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="candidate-deletion-submit-form" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
















    <div class="modal fade" id="position-deletion-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="position-deletion-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="position-deletion-modal-label">Delete position
                    </h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/delete-position" class="form-control" id="position-deletion-form">
                        @csrf
                        <input type="hidden" name="position_id" id="position_id" value="">

                        <p>Are you sure you want to delete this position?</p>
                    </form>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="position-deletion-submit-form" class="btn btn-danger">Delete</button>
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
        // Gelement by its id
        var electionCreationForm = $("#election-creation-form");

        // Get the button element by its id
        var electionCreationButton = $("#election-creation-submit-form");

        // Add a click event listener to the button
        electionCreationButton.click(function () {
            // Submit the form
            electionCreationForm.submit();
        });


        var electionDeletionForm = $("#election-deletion-form");

        var electionDeletionButton = $("#election-deletion-submit-form");

        electionDeletionButton.click(function () {
            electionDeletionForm.submit();
        });


        var candidateCreationForm = $("#candidate-creation-form");

        var candidateCreationButton = $("#candidate-creation-submit-form");

        candidateCreationButton.click(function () {
            candidateCreationForm.submit();

        });


        var electionEditForm = $("#election-edit-form");

        var electionEditButton = $("#election-edit-submit-form");

        electionEditButton.click(function () {
            electionEditForm.submit();
        });


        var candidateDeletionForm = $("#candidate-deletion-form");

        var candidateDeletionLink = $("#candidate-deletion-submit-form");

        candidateDeletionLink.click(function () {
            candidateDeletionForm.submit();
        });








        var positionDeletionForm = $("#position-deletion-form");

        var positionDeletionLink = $("#position-deletion-submit-form");

        positionDeletionLink.click(function () {
            positionDeletionForm.submit();
        });












        $(document).ready(function () {
            // Select all the anchor tags with data-candidate-id attribute
            $("a[data-candidate-id]").on("click", function () {
            // the candidate id from the data attribute
                var candidate_id = $(this).data("candidate-id");
                // Set the candidate id to the hidden input field in the form
                $("#candidate_id").val(candidate_id);
            });

            
        });


        $(document).ready(function () {
            // Select all the anchor tags with data-candidate-id attribute
            $("a[data-position-id]").on("click", function () {
            // the candidate id from the data attribute
                var position_id = $(this).data("position-id");
                // Set the candidate id to the hidden input field in the form
                $("#position_id").val(position_id);
            });

            
        });




    </script>
</body>

</html>