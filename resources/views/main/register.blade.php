@extends('main.template.body')

@section('body')
	<section class="signup spad">
        <div class="container">
            <div class="row">

                <div class="col-12 text-white">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            {{$error}} <br>
                        @endforeach
                    @endif
                </div>

                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Register</h3>
                        <form action="{{route('register.post')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="input__item">
                                <input type="text" placeholder="Your Name" name="name">
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Email address" name="email">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" placeholder="Password" name="password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Register now</button>
                        </form>
                        <h5>Already have an account? <a href="#">Log In!</a></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>Login With:</h3>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a>
                            </li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection