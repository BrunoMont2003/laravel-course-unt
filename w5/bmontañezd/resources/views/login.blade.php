<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="/atlantis/assets/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


    <link rel="stylesheet" href="/login/css/styles.css">
    <title>Login</title>
</head>

<body>
    <div class="container login-form">
        <h2 class="login-title"> - Please Login -</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="POST" action="{{ route('verificar') }}">
                    @csrf
                    <div class="input-group
                    login-userinput">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input id="txtUser" type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" name="name" placeholder="Username">
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group ">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input id="txtPassword" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Password">

                        <span id="showPassword" class="input-group-btn">
                            <button class="btn btn-default reveal" type="button"><i
                                    class="glyphicon glyphicon-eye-open"></i></button>
                        </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>
                        Login</button>
                    <div class="checkbox login-options">
                        <label><input type="checkbox" /> Remember Me</label>
                        <a href="#" class="login-forgot">Forgot Username/Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/atlantis/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/atlantis/assets/js/core/popper.min.js"></script>
    <script src="/atlantis/assets/js/core/bootstrap.min.js"></script>
    <script src="/login/js/main.js"></script>

</body>

</html>
