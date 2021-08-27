<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

        <!-- load jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- provide the csrf token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

    </head>
    <body class="antialiased">

        <!-- Navigation section -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
            <a class="navbar-brand" href="#">Online Voting</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">{{ strtoupper(Auth::guard('voter')->user()->username) }}</a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('voterLogout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Voter Profile</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">Voter information</button>
                                    <button type="button" class="list-group-item list-group-item-action">
                                        Username:
                                        {{ Auth::guard('voter')->user()->username }}</button>

                                    <button id="voteNow" onclick="redirectHome()" class="btn btn-info mt-2">Vote Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @forelse ($categories as $category)
                        <div class="card" >
                            @if (count($category->candidates) > 0)
                            <div class="card-header">
                                <h4>{{ $category->name }}</h4>
                            </div>
                            <div class="card-body">
                                <!-- table bordered -->
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>ID</th>
                                                <th>Election</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($category->candidates as $candidate)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="radio" id="voted" name="candidate_id" value="{{ $candidate->id }}" class="form-check-input form-check-info vote" id="customColorCheck5">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-bold-500">{{ $candidate->id }}</td>
                                                    <td class="text-bold-500">{{ $candidate->name }}</td>
                                                    <td class="text-bold-500">{{ $candidate->category->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                        </div>
                    @empty
                        <h2>No Candidates</h2>
                    @endforelse
                </div>
            </div>
        </div>


        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".vote").click(function(e){
                var candidateIds = new Array;
                e.preventDefault();
                $('input:radio:checked').each(function() {
                    var value = $(this).val();
                    candidateIds.push(value)
                });
                console.log(candidateIds);
    
                $.ajax({
                   type:'POST',
                   url:"{{ route('vote') }}",
                   data:({candidate_id:candidateIds}),
                   success:function(data){
                    console.log(data.success)
                   },
                });
            });
            function redirectHome(){
                window.location = 'http://127.0.0.1:8000/home'
            }
        </script>
        
    </body>
</html>
