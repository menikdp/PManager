@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left"> {{--main content--}}
         <div class="jumbotron">
            <h1>{{$company->name}}</h1>
            <p class="lead">{{$company->description}}</p>
        </div>
        <div class="row" style="background: white; margin: 10px;"> 
            <a href="/projects/create/{{$company->id}}" class="pull-right btn btn-default btn-lg">Add Project</a>
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
                <li><a href="/projects/create/{{$company->id}}">Add Project</a></li>
                <li><a href="/companies/create">Add Company</a></li>
                <li><a href="/companies">My Companies</a></li>
                <li><a href="/companies/{{$company->id}}/edit">Edit Company</a></li>
                <li><a href="#" onclick="var result = confirm('Are you sure you wish to delete this Company?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }">
                  Delete Company
                    </a>
                    <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}" method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                    </form>             
                </li>
            </ol>
        </div>
    </div><!-- /sidebar -->
@endsection

