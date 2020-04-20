<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <link rel="icon" href="/img/Bookey-06.png" type="image/png" sizes="16x16">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/login.css">
        
    </head>
    <body>
        
        <div class="container">
            <div class="left">
                <div class="logo">
                    <a href="/">
                        <img src="/img/Bookey-08-08.png" alt="Booky logo">
                    </a>
                </div>
                <form class="login" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}   
                    <div class="email">    
                        <h3>Email</h3>
                        <input type="text" name="email" id="email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>      

                    <div class="password">
                        <h3>Password</h3>
                        <input type="password" name="password" id="password" required ><br>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                   
                    <button type="submit">Sign In</button><br>

                    <div class="forget">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                        <a href="/register" class="register">Create an Account</a>
                    </div>
                </form>
            </div>

            <div class="right">
                
            </div>
        </div>
                        {{-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <h3>Email</h3>
                                <input id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <h3>Password</h3>
                                <input id="password" type="password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit">Sign In</button><br>

                        <div class="forget">
                            <a href="href="{{ route('password.request') }}">Forgot Password?</a>
                            <a href="/signup" class="register">Create an Account</a>
                        </div>
                             --}}
                    </form>
                </div>
            </div>
        </div>
