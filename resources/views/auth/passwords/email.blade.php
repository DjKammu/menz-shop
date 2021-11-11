@extends('layouts.app')

@section('content')

@include('layouts.nav')

 <div class="menz-rechnung" id="rechnung">
      <div class="container">
        <div class="row">
          <div class="col-md-12 menz-col pb-0">
            <div class="row">
              <h1 class="forgot-title">Haben Sie Probleme beim Anmelden?</h1>
                <p class="section-text mt-4">Bitte geben Sie Ihre Kundennummer ein, um loszulegen.</p>
                @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                  <div class="form-element mb-2">
                    <input class="form-textbox form-textbox-text @error('kundennummer') is-invalid @enderror" id="forgotPassInput" type="text" name="kundennummer" value="{{ old('kundennummer') }}" required autocomplete="kundennummer" autofocus />
                      <span aria-hidden="true" class="form-label" id="forgotPassLabel">Kundennummer</span>   

                      @error('kundennummer')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                  </div>


                  <button type="submit" class="button" id="continueBtn" disabled>
                        Passwort zurücksetzen
                  </button>
                </form>
                <p class="section-text mt-2">Ein Link zum Zurücksetzen des Passworts wird an Ihre registrierte E-Mail gesendet.</p>
          </div>
          <div class="row mt-5">
            <h1 class="forgot-title mb-4">Geben Sie Ihre registrierte E-Mail ein, um Ihre Kundennummer zu finden</h1>
            @if (session('status-kundennummer'))
                <div class="alert alert-success" role="alert">
                    {{ session('status-kundennummer') }}
                </div>
            @endif
              <form method="POST" action="{{ route('password.email-kundennummer') }}">
                        @csrf
                <div class="form-element  mb-2">
                    <input class="form-textbox form-textbox-text @error('email') is-invalid @enderror" id="forgotidInput" type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                      <span aria-hidden="true" class="form-label" id="forgotPassLabel">E-Mail-Adresse</span>   

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                </div>
                <button type="submit" class="button" id="idcontinueBtn" disabled>
                      Kundennummer abrufen
                </button>
              </form>
              <p class="section-text mt-2">Ihre Kundennummer wird an Ihre registrierte E-Mail gesendet.</p>
        </div>
        </div>
      </div>
    </div>
    

@endsection
