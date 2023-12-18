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
                    <a class="nav-link col" href="/">logout</a>
                </div>
            </div>
        </div>
    </nav>



    <div class="container m-5">
        <div class="row">
            <div class="col-6">
                <h1>Welcome! {{ session('voter_username') }}</h1>
                @if (session('election_department_id'))
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#voting-modal">
                        Vote now!
                    </button>
                @else
                    <button disabled type="button" class="btn btn-primary">
                        Vote now!
                    </button>
                @endif

            </div>
            <div class="col-6">
                <h1>Elections: </h1>
                @if (session('election_department_id'))
                    <p>
                        {{ session('department_name') }}
                    </p>
                    <p>Start: {{ session('election_start') }}</p>
                    <p>End: {{ session('election_end') }}</p>

                    <p>List of candidates:</p>

                    <ul>
                        @foreach (session('positions') as $position)
                            <li>{{ $position->position_name }}


                                <ol>
                                    @foreach (session('candidates') as $candidate)
                                        @if ($candidate->position_id == $position->id && $candidate->department_id == session('election_department_id'))
                                            <li>
                                                {{ $candidate->candidate_full_name }}
                                                ({{ $candidate->candidate_party->candidate_party_name }})
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No elections added</p>
                @endif
            </div>
        </div>






        <!-- Modal -->
        <div class="modal fade" id="voting-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="voting-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="voting-modal-label">Vote for the election of:
                            {{ session('department_name') }}
                        </h1>


                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/vote" class="form-control" id="voting-form">
                            @csrf
                            <p>List of candidates:</p>


                            <ul>
                                @foreach (session('positions') as $position)
                                    <li>{{ $position->position_name }}

                                        <ol>
                                            @foreach (session('candidates') as $candidate)
                                                @if ($candidate->position_id == $position->id && $candidate->department_id == session('election_department_id'))
                                                    <li>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="{{ $position->id }}"
                                                                id="{{ $candidate->id }}">
                                                            <label class="form-check-label"
                                                                for="{{ $candidate->id }}">
                                                                {{ $candidate->candidate_full_name }}
                                                                ({{ $candidate->candidate_party->candidate_party_name }})
                                                            </label>
                                                        </div>

                                                    </li>
                                                @endif
                                            @endforeach
                                        </ol>
                                    </li>
                                @endforeach
                            </ul>

                        </form>

                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="voting-submit-form" class="btn btn-success">Cast vote</button>
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
            var votingForm = $("#voting-form");

            var votingButton = $("#voting-submit-form");

            votingButton.click(function() {
                votingForm.submit();
            });
        </script>
</body>

</html>
