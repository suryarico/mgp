@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-md-5 mx-auto">
      <div id="first">
         <div class="myform form ">
            <div class="logo mb-3">
               <div class="col-md-12 text-center">
                  <h1>Login</h1>
               </div>
            </div>
            <form action="{{ route('login') }}" method="POSt" name="login">
               {{ csrf_field() }}
               <div class="form-group">
                  <label for="exampleInputEmail1">Email address </label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" aria-describedby="emailHelp" placeholder="Enter email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror

                  @if ($errors->has('email'))
                  <span class="help-block">
                     <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" aria-describedby="emailHelp" placeholder="Enter Password">
                  @if ($errors->has('password'))
                  <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
               </div>
               <div class="form-group">
                  <p class="text-right">
                     @if (Route::has('password.request'))
                     <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                     </a>
                     @endif
                  </p>

               </div>
               <div class="col-md-12 text-center ">
                  <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm"> {{ __('Login') }}</button>
               </div>
               <!--     <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div> -->
               <div class="form-group">
                  <p class="text-center">Don't have account? <a href="#" id="signup">Sign up here</a></p>
               </div>
            </form>

         </div>
      </div>
      <div id="second">
         <div class="myform form ">
            <div class="logo mb-3">
               <div class="col-md-12 text-center">
                  <h1>Signup</h1>
               </div>
            </div>
            <form method="POST" action="{{ route('register') }}">
               @csrf
               <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="password-confirm">{{ __('Confirm Password') }}</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
               </div>
               <div class="col-md-12 text-center mb-3">
                  <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Register</button>
               </div>
               <div class="col-md-12 ">
                  <div class="form-group">
                     <p class="text-center"><a href="#" id="signin">Already have an account?</a></p>
                  </div>
               </div>
         </div>
         </form>
      </div>
   </div>
</div>
@endsection