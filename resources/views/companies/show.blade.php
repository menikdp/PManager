@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
        {{-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> --}}
    </div>
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left"> {{--main content--}}
        <div class="row" style="background: white; margin: 10px;"> 
            @foreach ($company->projects as $project)
                <div class="col-lg-4">
                    <h2>{{$project->name}}</h2>
                    <p>{{$project->description}}</p>
                  <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View details &raquo;</a></p>
                </div>
            @endforeach
        </div> 
    </div> {{--/main content--}}

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right"> {{--side bar--}}
        {{--<div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>--}}
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>
              <li><a href="#">Delete</a></li>
              <li><a href="#">Add new member</a></li>
            </ol>
        </div>
    </div><!-- /sidebar -->
@endsection

