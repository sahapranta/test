<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voter Profile</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <style>
        body{
            padding: 2rem 0rem;
            }
            .avatar {
            border: 0.3rem solid rgba(#fff, 0.3);
            margin-top: -6rem;
            margin-bottom: 1rem;
            max-width: 9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card">
              <img class="card-img-top" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/oslo.jpg" alt="Bologna">
              <div class="card-body text-center">
                <img class="avatar rounded-circle" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/robert.jpg" alt="Bologna">
                <h4 class="card-title">{{ $voter->username }}</h4>
                <p class="card-text">Dear voter you have submitted your vote. Thanks for your vote. Stay home stay safe</p>
                <form action="{{ route('voterLogout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        Logout
                    </button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>