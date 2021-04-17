@extends('layouts.app')

@section('content')
<div id="career-banners" class="xpressbanner csbanner">
                <div class="container">
                        <div class="banner-panel careerservicebanner ">
                                <div class="banner-content col-sm-8 col-xs-10 pull-right padXZ ">
                                        <div class="banner-bottom-content col-sm-12">
                                                <span class="list-img"><img src="https://www.vacancyform.com/img/images/list.png" style="padding-right:10px; margin-top:-10px" width="46" height="42" align="left"></span>
                                                <div> Offline Forms</div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        
<div class="container-fluid SpecialSec">
    <div class="container padXZ pad00">
        <div class="col-md-12 col-xs-12 col-sm-12 padXZ pad00">
            <h2 class="HeadingTitleami"><span>Offline Forms</span></h2>
            <div class="table-responsive">
                            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name of Dept.</th>
                            <th>Title</th>
                            <th>Qualification</th>
                            <th>Age Limit</th>
                            <th>Last Date</th>
                            <th>Details</th>
                            <th>Pdf</th>
                            <th>Online Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vacancies as $key => $vacancy)                
                            <tr>
                                <td>{{ $vacancies->currentPage() + $key}}</td>
                                <td>{{ $vacancy->department_name }}</td>
                                <td>{{ $vacancy->title }}</td>
                                <td>{{ $vacancy->qualification }}</td>
                                <td>{{ $vacancy->age_limit }}</td>
                                <td>{{ $vacancy->last_date }}</td>
        
                                <td>
                              <a style="cursor:pointer;" href="{{ $vacancy->details_link }}" target="_blank">View</a>
                                </td>
                                <td>
                              <a style="cursor:pointer;" href="{{ ($vacancy->pdf) ? \Storage::url( $vacancy->pdf ) : ''}} " target="_blank">PDF View</a>
                                </td>
                                <td>
                                
                                <a href="{{ $vacancy->online_link }}" target="_blank">Click</a></td>
                            </tr>
                         @endforeach
                        

                    </tbody>
                </table>

                {{ $vacancies->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
