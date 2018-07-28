<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raar Ads | Login </title>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    @yield('customeCss')
    
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
</head>
<body>
    <div class="container">
        <div class="columns is-mobile" style="margin-top: 11rem">
            <form action="{{ route('login.post') }}" method="POST" class="box column is-half is-offset-one-quarter">
                @if(count($errors) > 0)
                <div class="notification is-danger">
                    {{ $errors->first() }}
                </div>
                @endif
                {!! csrf_field() !!}
                <div class="field">
                    <div class="control has-icons-left">
                        <input class="input @if(count($errors) > 0) is-danger @endif" type="email" placeholder="Email" name="email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input @if(count($errors) > 0) is-danger @endif" type="password" placeholder="Password" name="password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>  
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-success">Login</button>
                    </div>
                    <div class="control">
                        <a type="submit" class="button is-info" href="{{ route('login.github') }}">Github Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>