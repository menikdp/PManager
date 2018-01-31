@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left"> {{--main content--}}
         <div class="well well-lg">
            <h1>{{$project->name}}</h1>
            <p class="lead">{{$project->description}}</p>
        </div>
        <div class="row" style="background: white; margin: 10px;"> 
            <a href="/projects/create" class="pull-right btn btn-default btn-lg">Add Project</a>
           {{--  @foreach ($project->projects as $project)
                <div class="col-lg-4">
                    <h2>{{$project->name}}</h2>
                    <p>{{$project->description}}</p>
                  <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View details &raquo;</a></p>
                </div>
            @endforeach --}}
        </div> 
    </div> {{--/main content--}}

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/projects/{{$project->id}}/edit">Edit Project</a></li>
                <li><a href="/projects/create">Add Project</a></li>
                <li><a href="/projects">My Projects</a></li>
                @if ($project->user_id == Auth::user()->id)
                    <li><a href="#" onclick="var result = confirm('Are you sure you wish to delete this Project?');
                            if( result ){
                                    event.preventDefault();
                                    document.getElementById('delete-form').submit();
                              }">
                            Delete Project
                        </a>
                        <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                        </form>             
                    </li>
                @endif
            </ol>
        </div>
    </div><!-- /sidebar -->
@endsection

