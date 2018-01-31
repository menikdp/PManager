@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 pull-left"> {{--main content--}}
         <div class="well well-lg">
            <h1>{{$project->name}}</h1>
            <p class="lead">{{$project->description}}</p>
        </div>
        <div class="row" style="background: white; margin: 10px;"> 
            <a href="/projects/create" class="pull-right btn btn-default btn-sm">Add Project</a>
            <br>
            <div class="row container-fluid">
                <form method="post" action="{{route('comments.store')}}" >
                    {{ csrf_field() }}
                   
                    <input type="hidden" name="commentable_type" value="Project">
                    <input type="hidden" name="commentable_id" value="{{$project->id}}">

                    <div class="form-group">
                        <label for="comment-content">Comment <span class="required">*</span> </label>
                        <textarea name="body"
                            placeholder="Enter comment"
                            id="comment-content"
                            style="resize: vertical"
                            rows="5"
                            class="form-control autosize-target text-left"
                            spellcheck="false"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Proof of work done (Url/photos) <span class="required">*</span> </label>
                        <textarea name="url"
                            placeholder="Enter Url or screenshots"
                            id="comment-url"
                            style="resize: vertical"
                            rows="5"
                            class="form-control autosize-target text-left"
                            spellcheck="false"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
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

