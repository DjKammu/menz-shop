@extends('layouts.app')

@section('content')

@include('layouts.nav')



<div class="menz-rechnung">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="searchInputBox">
                    <input type="text" class="form-control developerSearchInput" value="{{ @$search }}"  placeholder="Nach Schlagwörtern suchen">
                    <span>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="19px" height="19px" viewBox="0 0 19 19" enable-background="new 0 0 19 19" xml:space="preserve">
                                <path fill="#333" d="M17.632,16.955l-4.761-4.762c1.109-1.188,1.795-2.776,1.795-4.527c0-3.667-2.982-6.649-6.649-6.649
                                c-3.667,0-6.649,2.982-6.649,6.648c0,3.667,2.982,6.647,6.649,6.647c1.391,0,2.682-0.432,3.75-1.164l4.834,4.834L17.632,16.955z
                                M2.824,7.666c0-2.863,2.33-5.192,5.192-5.192c2.864,0,5.192,2.329,5.192,5.192c0,2.861-2.328,5.191-5.192,5.191
                                C5.154,12.855,2.824,10.527,2.824,7.666z"/>
                        </svg>
                    </span>
                </div>
                <nav class="mt-2 mt-md-5">
                    <div class="nav nav-tabs menz-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="tab-all" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All</button>
                        
                        @foreach(@$dBeleges as $bk => $dBelege)

                          <button class="nav-link" id="tab-1" data-bs-toggle="tab" data-bs-target="#nav-tab-{{ $bk }}" type="button" role="tab" aria-controls="nav-tab-1" aria-selected="false">{{ $bk }}</button>

                        @endforeach

                    </div>
                </nav>
                <div class="tab-content mt-4" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="tab-all">
                        <table class="table table-striped menz-table">
                            <thead>
                                <tr class="menz-table-row">
                                <th scope="col">Dateidatum</th>
                                <th scope="col">Belegart</th>
                                <th scope="col">Belegnummer</th>
                                <th scope="col">Ansicht</th>
                                <th scope="col">Herunterladen</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach(@$beleges as $belege)

                           <tr>
                            <td>{{ \Carbon\Carbon::parse($belege->Dateidatum)->format('d-m-Y') }}</td>
                            <td class="menz-{{ \Str::lower($belege->Belegart) }}">{{  $belege->Belegart }}</td>
                            <td>{{  $belege->Belegnummer }}</td>
                            <td> <a href="{{ route('view',['id' => $belege->Belegnummer] )}}" target="_blank">Ansicht</a> </td>
                            <td> <a href="{{ route('download',['id' => $belege->Belegnummer] )}}" target="_blank">Herunterladen</a> </td>
                          </tr>
                              @endforeach

                            </tbody>
                            </table>
                    </div>

                    @foreach(@$dBeleges as $bk => $dBelege)

                      <div class="tab-pane fade" id="nav-tab-{{ $bk }}" role="tabpanel" aria-labelledby="tab-{{ $bk }}">
                        <table class="table table-striped menz-table">
                            <thead>
                                <tr class="menz-table-row">
                                <th scope="col">Dateidatum</th>
                                <th scope="col">Belegart</th>
                                <th scope="col">Belegnummer</th>
                                <th scope="col">Ansicht</th>
                                <th scope="col">Herunterladen</th>
                                </tr>
                            </thead>
                            <tbody>
                          @foreach(@$dBelege as $belege)

                           <tr>
                            <td>{{ \Carbon\Carbon::parse($belege->Dateidatum)->format('d.m.Y') }}</td>
                            <td class="menz-{{ Str::lower($belege->Belegart)}}">{{  $belege->Belegart }}</td>
                            <td>{{  $belege->Belegnummer }}</td>
                            <td> <a href="{{ route('view',['id' => $belege->Belegnummer] )}}" target="_blank">Ansicht</a> </td>
                          <td> <a href="{{ route('download',['id' => $belege->Belegnummer] )}}" target="_blank">Herunterladen</a> </td>
                          </tr>
                              @endforeach

                            </tbody>
                            </table>
                    </div>


                   @endforeach


                    
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                        No results were found. 
                    </div>
                </div>

                {!! $beleges->render() !!}

            </div>
        </div>
    </div>
</div>
@endsection
