@extends('layouts.app')

@section('content')
     <!-- Banner Area --> 
     <div class="menz-logo">
       <img class="img-fluid" src="images/logo-blue.svg" alt="Menz Logo">
     </div>
      <section class="menz-bnr">
        <div class="container">
          <div class="row">
              <div class="col-md-12">
                <div class="menz-formBox">
                  <h2 class="formHeading text-center">Rechnung Menz Shop</h2>
                   <form method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="login-form">
                          <div class="inputBox">
                            <input type="text" class="form-control menz-input @error('email') is-invalid @enderror" name="email" id="idInput" value="{{ old('email') }}" required placeholder="Kundennumer" autofocus autocomplete="email" title="Please Fill Out This Field">
                            <div class="lds-spinner" id="idLoader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                            <button id="nextBtn" class="arrowBtn" disabled title="Please Fill Out This Field">
                                <i class="fa fa-arrow-right"></i>
                            </button>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="inputBox">
                            <input type="password" class="form-control menz-input psInput display-none @error('password') is-invalid @enderror" placeholder="Passwort" name="password" required autocomplete="current-password" id="psInput" title="Please Fill Out This Field">
                            <button type="submit" id="submitBtn" class="arrowBtn display-none" disabled title="Please Fill Out This Field">
                                <i class="fa fa-arrow-right"></i>
                            </button>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                      </div>
                      <label for="" class="remember">
                          <input type="checkbox" name="" id="remember_me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                          Remember Me
                      </label>
                      <div class="text-center no-access" >
                        Noch keinen Zugang? <a href="#" class="links">Kontakt</a><br>
                      </div>
                  </form>
                </div>

              </div>
          </div>  
        </div>
      </section>


@endsection
