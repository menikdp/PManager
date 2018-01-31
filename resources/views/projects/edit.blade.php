@extends('layouts.app')

@section('content')
    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left"> {{--main content--}}
        <h2>Update Project</h2>
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;"> 
           <form method="post" action="{{route('projects.update', [$project->id])}}" >
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="project-name">Name <span class="required">*</span> </label>
                    <input name="name"
                        value="{{$project->name}}"
                        placeholder="Enter name"
                        id="name"
                        class="form-control" 
                        spellcheck="false" 
                        required />
                </div>
                <div class="form-group">
                    <label for="project-description">Description <span class="required">*</span> </label>
                    <textarea name="description"
                        placeholder="Enter description"
                        id="description"
                        style="resize: vertical"
                        rows="5"
                        class="form-control autosize-target text-left"
                        spellcheck="false">{{$project->description}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
           </form>
        </div> 
    </div> {{--/main content--}}

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right"> {{--side bar--}}
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

