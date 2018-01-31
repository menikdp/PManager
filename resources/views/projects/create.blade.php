@extends('layouts.app')

@section('content')
    {{-- <div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
    </div> --}}
    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left"> {{--main content--}}
        <h2>Create new project</h2>
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;"> 
           <form method="post" action="{{route('projects.store')}}" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="project-name">Name <span class="required">*</span> </label>
                    <input name="name"
                        placeholder="Enter name"
                        id="name"
                        class="form-control" 
                        spellcheck="false" 
                        required />
                    <input type="hidden"
                        name="company_id"
                        value="{{$company_id}}">
                </div>
                <div class="form-group">
                    <label for="project-description">Description <span class="required">*</span> </label>
                    <textarea name="description"
                        placeholder="Enter description"
                        id="description"
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
    </div> {{--/main content--}}

    <div class="col-sm-3 col-md-3 col-lg-3 pull-right"> {{--side bar--}}
       <div class="sidebar-module">
            <h4>Actions</h4>
           <ol class="list-unstyled">
                <li><a href="/projects/create">Add Project</a></li>
                {{-- <li><a href="/companies/create">Add Company</a></li> --}}
                <li><a href="/projects">My Projects</a></li>
            </ol>
        </div>
    </div><!-- /sidebar -->
@endsection

