@extends('layouts.app')

@section('content')
     <!-- Banner Area --> 
     <div class="menz-logo">
       <img class="img-fluid" src="{{ url(asset('images/logo-blue.svg')) }}" alt="Menz Logo">
     </div>
      <section class="menz-bnr">
        <div class="container">
          <div class="row">
              <div class="col-md-12">
                <div class="menz-formBox">
                  <div class="alert alert-success" style="display:none;" id="alert-success" role="alert">
                    </div>
                  <h2 class="formHeading text-center">Rechnung Menz Shop</h2>
            
                    
          
                   <form method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="login-form">
                          <div class="inputBox">
                            <input type="text" class="form-control menz-input @error('kundennummer') is-invalid @enderror" name="kundennummer" id="idInput" value="{{ old('kundennummer') }}" required placeholder="Kundennumer" autofocus autocomplete="kundennummer" title="Please Fill Out This Field">
                            <div class="lds-spinner" id="idLoader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                            <div id="nextBtn" class="arrowBtn" disabled title="Please Fill Out This Field">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                            <span id="kundennummer-error" 
                                class="invalid-feedback2" role="alert">
                            </span>
                            @error('kundennummer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="inputBox">
                            <input type="password" class="form-control menz-input psInput display-none @error('password') is-invalid @enderror" placeholder="Passwort" name="password" required autocomplete="current-password" id="psInput" title="Please Fill Out This Field">
                            <a id="submitBtn" class="arrowBtn display-none" disabled title="Please Fill Out This Field">
                                <div><i class="fa fa-arrow-right"></i></div>
                            </a>

                            <!-- <button type="submit" id="submitBtn" class="arrowBtn display-none" disabled title="Please Fill Out This Field">
                                <i class="fa fa-arrow-right"></i>
                            </button> -->

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
                      <div class="text-center no-access mb-2" >
                        <a href="{{ route('password.request') }}" class="links">Kundennummer oder Passwort vergessen</a><br>
                      </div>

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
