@extends('layouts.app')

@section('content')
<section class="login py-5 bg-primary">
        <div class="container">
          <div class="row1 g-0">
            <div class="col-lg-5 text-center">
              <img src="{{asset('frontend/img/login.svg')}}" class="img-fluid" alt="" />
              <h3>Create New Account ?</h3>
              <p>Join us for safe travels</p>
              <a
                href="/register"
                class="btn btn-outline-primary rounded"
                id="sign-up-btn"
                
              >
                Sign up
              </a>
              <a href="/" class="fa fa-home btn btn-outline-primary btn-lg" title="Go to Home">
              </a>
            </div>
            <div class="col-lg-7 text-center py-5">
              <h1 class="animate__animated animate__rubberBand">
                Welcome to our Journey
              </h1>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-row py-auto pt-5">
                  <div class="offset-1 col-lg-10">
                    <i
                      class="fas fa-at"
                      style="margin-right: 10px"
                    ></i>
                    
                    <input
                      class="inp px-3 @error('email') is-invalid @enderror" role="alert"
                      type="email"
                      placeholder="Email Address"
                      name="email"
                      value="{{ old('email') }}"
                    />
                    @error('email')
                        <span class="invalid-feedback ">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <br/>
                <div class="form-row py-auto">
                  <div class="offset-1 col-lg-10">
                    <i
                      class="fas fa-lock"
                      style="margin-right: 10px"
                    ></i>
                    <input
                      class="inp px-3 @error('password') is-invalid @enderror" role="alert"
                      type="password"
                      placeholder="Password"
                      name="password"
                      
                    />
                    @error('password')
                        <span class="invalid-feedback ">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                {{-- @if (session('error'))
                      <div class="alert alert-danger">
                        {{ session('error') }}
                      </div>
                @endif --}}
                <div class="form-row py-3">
                  <div class="offset-1 col-lg-10">
                    <button type="submit" class="btn1">
                      Login
                    </button>
                  </div>
                </div>
              </form>
              <p>Or Login with</p>
              <span>
                <i class="fab fa-facebook"></i>
              </span>
              <span>
                <i class="fab fa-google-plus"></i>
              </span>
            </div>
          </div>
        </div>
      </section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
