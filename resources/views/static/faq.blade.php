@extends('layouts.app')
@section('content')
@include('layouts.nav')

    <div class="menz-rechnung menz-faq-content" id="rechnung">
      <div class="container">
        <div class="row">
          <div class="col-md-12 menz-col pb-0">
            <div class="row">
              <h1 class="forgot-title text-center mb-5">FAQ</h1>
                <ol class="">
                  <li>Klicken Sie auf den Link in der E-Mail. </li>
                  <li>Geben Sie Ihre Kundennummer ein und klicken Sie auf Passwort vergessen. Haben Sie keine Kundennummer? Geben Sie Ihre bei uns hinterlegte E-Mail ein (auf die Sie unsere Rechnungen erhalten)  und klicken Sie auf Kundennummer erhalten. </li>
                  <li>Klicken Sie auf den Link in der E-Mail. </li>
                </ol>

                <ul class="mt-3 list-unstyled">
                  <li><b>Schritt 1:</b> Gehen Sie auf <a href="{{ url('/')}}">{{ url('/')}}</a>
                  <br><br>
                  <img class="img-fluid border" src="images/screenshot-01.png" alt="">
                  <br><br>
                  </li>
                  <li><b>Schritt 2:</b> Geben Sie Ihre Kundennummer und Passwort ein. </li>
                  <li><b>Schritt 3:</b> Hiermit erhalten Sie eine Übersicht aller Rech-/Stornorechnungen, Liefer- / Rücklieferscheinen, Aufträgen, Angebote. 
                    <br><br>
                    <img class="img-fluid border" src="images/screenshot-02.png" alt="">
                    <br><br>
                  </li> 
                </ul>
                <ul class="list-unstyled">
                  <li>(a) Sortierung nach Dateidatum/Belegnummer</li>
                  <li>(b) Datum Eingrenzung.</li>
                  <li>(c) Suchfunktion (Alles= Material, Baustelle, Datum, KFZ-Kennzeichen)</li>
                </ul>
          </div>
        </div>
      </div>
    </div>
@endsection