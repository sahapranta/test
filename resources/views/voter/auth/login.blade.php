<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @push('styles')
        @notifyCss
    @endpush
</head>

<body>
    <div class="card login-card">
        <x:notify-messages/>
        <form action="{{ route('voterAuthenticate') }}" method="POST">
            @csrf
           <h2 class="title">Voter Log in</h2>
    
           <div class="email-login">
              <label for="email"> <b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username">
              @error('username')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password">
              @error('password')
                  <span class="text-danger">
                      {{ $message }}
                    </span>
              @enderror
           </div>
           <button type="submit" class="cta-btn">Log In</button>
        </form>
    </div>

    @push('script')
        @notifyJs
    @endpush
</body>

</html>