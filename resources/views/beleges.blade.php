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
                             <!--  <p class="section-text mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                                  a type specimen book. </p> -->
                          </div>
                      </div>
                  </div>
                  
                   <div class="col-md-12 daterange-outer">
                    
                     <input type="text" class="daterange-picker" name="daterange" value="{{ @request()->start .'-'. @request()->end}}" />  

                     <a class="menz-edit mt-3" href="javascript::void(0)" onclick="return window.location.href='{{ Request::url() }}'">
                        Zurücksetzen
                    </a>
                    
                  </div>
                  
                  <div class="col-md-12 menz-col pb-0 pull-right mobile-more" id="menz-mobile-sort">
                    
                   <select style="width: auto;" onchange="sortOrderBy('receiptdate', this.value)" name="orderBy" class="form-control">
                      <option value="">Dateidatum <i class="fa fa-caret-up"> <i class="fa fa-caret-down"></option>
                      <option value="DESC" {{ @request()->d == 'DESC' ? 'selected' : ''}}>Dateidatum absteigend</option>
                      <option value="ASC" {{ @request()->d == 'ASC' ? 'selected' : ''}}>Dateidatum aufsteigend</option>
                    </select> 

                    <select style="width: auto;" onchange="sortOrderBy('number', this.value)"  name="orderBy" class="form-control">
                      <option value="">Belegnummer <i class="fa fa-caret-up"> <i class="fa fa-caret-down"></option>
                      <option value="DESC" {{ @request()->d == 'DESC' ? 'selected' : ''}}>Belegnummer absteigend</option>
                      <option value="ASC" {{ @request()->d == 'ASC' ? 'selected' : ''}}>Belegnummer aufsteigend</option>
                    </select> 

                  </div>

                    <div class="col-md-12 menz-col pb-0" id="menz-cat-single">

                    <table class="table table-striped menz-table">
                     <thead class="position-relative">
                                <tr class="menz-table-row">
                                 <th scope="col" class="menz-date-filter">
                                    Dateidatum                    
                                    <a class="d-none d-md-inline-block" onclick="sortOrderBy('receiptdate', 'ASC')"  href="javascript:void(0)">
                                      <i class="fa fa-caret-up"></i></a>
                                    <a class="d-none d-md-inline-block" onclick="sortOrderBy('receiptdate', 'DESC')"  href="javascript:void(0)">
                                      <i class="fa fa-caret-down"></i></a>
                                </th>
                                <th scope="col">Belegart</th>
                               <th scope="col" class="menz-date-filter">
                                    Belegnummer                    
                                    <a class="d-none d-md-inline-block" onclick="sortOrderBy('number', 'ASC')"   href="javascript:void(0)">
                                      <i class="fa fa-caret-up"></i></a>
                                    <a class="d-none d-md-inline-block" onclick="sortOrderBy('number', 'DESC')"  href="javascript:void(0)">
                                      <i class="fa fa-caret-down"></i></a>
                                </th>
                                <th scope="col">Ansicht</th>
                                <th scope="col">Herunterladen</th>
                                </tr>
                            </thead>
                      <tbody>

                         @foreach(@$beleges as $belege)

                         <tr>
                          <td class="menz-mono-font">{{ \Carbon\Carbon::parse($belege->receiptdate)->format('d.m.Y') }}</td>
                          <td class="menz-cat-{{ \Str::lower($belege->doctype) }}"><span>{{  $belege->doctype }}</span></td>
                          <td>{{  $belege->doc_number }}</td>
                          <td> <a href="{{ route('view',['id' => $belege->number] )}}" target="_blank">Ansicht</a> </td>
                          <td> <a href="{{ route('download',['id' => $belege->number] )}}" target="_blank">Herunterladen</a> </td>
                        </tr>
                            @endforeach

                      
                      </tbody>
                    </table>
                  </div>

                  {{ $beleges->withQueryString()->links() }}

              </div>
          </div>
      </div>
<style type="text/css">
 .daterange-outer {
    padding: 0 1.5em;
}
</style>
     
@endsection

