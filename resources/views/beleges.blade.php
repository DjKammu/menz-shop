@extends('layouts.app')

@include('layouts.nav')

@section('content')


    <div class="menz-rechnung" id="rechnung">
      <div class="container">
        <div class="row">
          <div class="col-md-12 menz-col pb-0">
            <div class="row">
              <div class="col-md-12 text-center">
                <h1 class="section-title">Rechnung</h1>
                <p class="section-text mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 menz-col">  

            @foreach(@$beleges as $belege)
              <div class="menz-pdf-box">
                <div class="menz-pdf">
                  <i class="far fa-file-pdf"></i>
                </div>
                <div class="menz-card-body">
                  <a class="menz-view" href="#">View rechnung</a>
                  <p> {{ \Carbon\Carbon::parse($belege->Dateidatum)->format('d F, Y') }}</p>
                </div>
              </div>
              @endforeach
          </div>
        </div>

        {!! $beleges->render() !!}
        
      </div>
    </div> 
     
@endsection
