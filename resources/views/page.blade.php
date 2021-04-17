@extends('layouts.app')

@section('content')

 <section class="bg-yellow py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="font-weight-bold">{{ @$page->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center bg-transparent m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ @$page->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="pages">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-12">
                    {!! @$page->body !!} 
                </div>
            </div>
        </div>
    </section>
@endsection
