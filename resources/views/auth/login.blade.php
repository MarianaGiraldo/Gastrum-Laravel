<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>LOgin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{ asset('images/form-wizard-1.jpg') }}" alt="">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>{{ __('Login') }}</h3>
                        </div>
                        <p>Please fill with your details</p>
                        <br/>
                        <div class="form-row">
                            <div class="form-holder">
                                <input placeholder="Your Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-holder">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="form-holder">
                                <p>Not registered yet? <a href="/register">Register here</a></p>
                            </label>
                        </div>

                    </div>
                </div>
            </section>
        </form>
    </div>

    <!-- JQUERY -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- JQUERY STEP -->
    <script src="{{ asset('js/jquery.steps.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
