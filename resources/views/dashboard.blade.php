<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">


</head>

<body>
    <nav class="navbar navbar-expand-sm bg-body-tertiary">
        <div class="container-fluid px-5">
            <!-- <a class="navbar-brand disabled" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse row" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex justify-content-center">
                    <a class="nav-link active col" aria-current="page" href="#"></a>
                    <a class="nav-link col" href="" data-bs-toggle="modal"
                        data-bs-target="#voting-result-modal">Voting result</a>
                    <a href="/logout"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>



    <div class="container p-5">
        <div class="row">
            <div class="col-sm-6 col-12 m-auto">
                <h1>Welcome, voter {{ session('voter_username') }}!</h1>
                @if (session('election_department_id') && !session('has_voted'))
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
            <div class="col-sm-6 col-12 m-auto">
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
                                                                name="{{ $position->id }}" id="{{ $candidate->id }}"
                                                                value="{{ $candidate->id }}">
                                                            <label class="form-check-label" for="{{ $candidate->id }}">
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
                        <button type="button" id="voting-submit-form" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#feedback-modal">Cast vote</button>
                    </div>
                </div>
            </div>
        </div>




        @if (session('has_voted') && !session('has_feedback'))
            <div class="modal fade" id="feedback-modal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="feedback-modal-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="feedback-modal-label">Voting System Feedback Form
                            </h1>


                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/feedback" class="form-control" id="feedback-form">
                                @csrf
                                <p>Thank you for participating in our voting system! Your feedback is essential for the
                                    ongoing improvement of our voting system. We welcome all comments, whether positive
                                    or critical, as they provide valuable insights into areas where we can enhance our
                                    service. If you encountered any challenges or have suggestions for improvement,
                                    please take a moment to share them with us. We genuinely appreciate your input and
                                    are dedicated to addressing any concerns to ensure an even better voting experience
                                    for everyone.</p>
                                <p>Rate us:</p>
                                <div class="d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="radio1"
                                            value="1">
                                        <label class="form-check-label" for="radio1">1</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="radio2"
                                            value="2">
                                        <label class="form-check-label" for="radio2">2</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="radio3"
                                            value="3">
                                        <label class="form-check-label" for="radio3">3</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="radio4"
                                            value="4">
                                        <label class="form-check-label" for="radio4">4</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rating" id="radio5"
                                            value="5">
                                        <label class="form-check-label" for="radio5">5</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="feedbackComment">Feedback: (optional)</label>
                                    <textarea name="feedback" class="form-control" id="feedbackComment" rows="3"
                                        placeholder="Your feedback goes here..."></textarea>
                                </div>


                            </form>

                        </div>


                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="button" id="feedback-submit-form" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif















        <div class="modal fade" id="voting-result-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="voting-result-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="voting-result-modal-label">Voting result
                    </h1>


                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <ul>
                        @foreach (session('positions') as $position)
                            <li>{{ $position->position_name }}


                                <ol>
                                    @foreach (session('candidates') as $candidate)
                                        @if ($candidate->position_id == $position->id && $candidate->department_id == session('election_department_id'))
                                            <li>
                                                {{ $candidate->candidate_full_name }}
                                                ({{ $candidate->candidate_party->candidate_party_name }})
                                                -
                                                {{ \App\Http\Controllers\votingResultController::voteCounter($candidate->id) }}
                                                Vote/s
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ul>



                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" id="voting-result-submit-form" class="btn btn-danger">Delete</button> -->
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


            $(document).ready(function() {
                $('#feedback-modal').modal('show');
            });


            var feedbackForm = $("#feedback-form");

            var feedbackButton = $("#feedback-submit-form");

            feedbackButton.click(function() {
                feedbackForm.submit();
            });
        </script>
</body>

</html>
