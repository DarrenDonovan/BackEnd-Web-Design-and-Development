<?php
use Illuminate\Http\Request;

$request = Request::capture();
$user = $request->cookie('user');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{asset('css/loginstyle.css')}}" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Login Page</title>
    </head>
    <body>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="php/check_username.php" method="post" id="form1">
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"
                            ><i class="fab fa-facebook-f"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-google-plus-g"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-linkedin-in"></i
                        ></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="hidden" name="submit_type" value="signup" />
                    <input
                        type="text"
                        placeholder="Your Name"
                        name="name"
                        required
                    />
                    <input
                        type="text"
                        placeholder="Username"
                        name="username"
                        id="username"
                        required
                    />
                    <div
                        id="username-error"
                        class="usiror"
                        style="display: none"
                    >
                        Username already exists.
                    </div>
                    <input
                        type="password"
                        placeholder="Password"
                        name="password"
                        required
                    />
                    <input
                        type="submit"
                        value="sign up"
                        class="button"
                        id="submit-btn"
                    />
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form method="post" id="form2">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"
                            ><i class="fab fa-facebook-f"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-google-plus-g"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-linkedin-in"></i
                        ></a>
                    </div>
                    <span>or use your account</span>
                    <input type="hidden" name="submit_type" value="login" />
                    <input
                        type="text"
                        placeholder="Username"
                        name="username"
                        id="username1"
                        value="{{ $user }}"
                        required
                    />
                    <div
                        id="username-error"
                        class="userir"
                        style="display: none"
                    >
                        Wrong username.
                    </div>
                    <input
                        type="password"
                        placeholder="Password"
                        name="password"
                        id="password"
                        autocomplete="off"
                        required
                    />
                    <div
                        id="username-error"
                        class="useror"
                        style="display: none"
                    >
                        Wrong password.
                    </div>
                    <a href="#">Forgot your password?</a>
                    <input
                        type="submit"
                        value="sign in"
                        class="button"
                        id="sub-btn"
                    />
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>
                            To keep connected with us please login with your
                            personal info
                        </p>
                        <input
                            type="submit"
                            value="sign in"
                            id="signIn"
                            class="button"
                        />
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>
                            Enter your personal details and start journey with
                            us
                        </p>
                        <input
                            type="submit"
                            value="sign up"
                            id="signUp"
                            class="button"
                        />
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('js/loginscript.js')}}"></script>
    </body>
</html>
