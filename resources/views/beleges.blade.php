@extends('layouts.app')

@section('content')

@include('layouts.nav')

    <div class="menz-rechnung" id="rechnung">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 menz-col pb-0">
                      <div class="row">
                          <div class="col-md-12 text-center">
                              <h1 class="section-title">{{ @ucfirst(request()->slug) }}</h1>
                              <p class="section-text mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                                  a type specimen book. </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 menz-col pb-0 pull-right">
                    
                    <select style="width: auto;" onchange="return window.location.href='{{ url(request()->slug)}}?d='+this.value" name="orderBy" class="form-control">
                      <option value="">Dateidatum auswählen</option>
                      <option value="DESC" {{ @request()->d == 'DESC' ? 'selected' : ''}}>Dateidatum DESC</option>
                      <option value="ASC" {{ @request()->d == 'ASC' ? 'selected' : ''}}>Dateidatum ASC</option>
                    </select> 

                  </div>

                    <div class="col-md-12 menz-col pb-0">

                    <table class="table table-striped menz-table">
                      <thead>
                        <tr class="menz-table-row">
                          <th scope="col">Dateidatum</th>
                          <th scope="col">Belegart</th>
                          <th scope="col">Ansicht</th>
                          <th scope="col">Herunterladen</th>
                        </tr>
                      </thead>
                      <tbody>

                         @foreach(@$beleges as $belege)

                         <tr>
                          <td>{{ \Carbon\Carbon::parse($belege->Dateidatum)->format('d-m-Y') }}</td>
                          <td>{{  $belege->Belegart }}</td>
                          <td> <a href="" target="_blank">Ansicht</a> </td>
                          <td> <a href="" target="_blank">Herunterladen</a> </td>
                        </tr>
                            @endforeach

                      
                      </tbody>
                    </table>
                  </div>

                   {!! $beleges->render() !!}

              </div>
          </div>
      </div>

     
@endsection
