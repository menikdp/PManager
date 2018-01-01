@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
        {{-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> --}}
    </div>
    <div class="row col-md-9 col-lg-9 col-sm-9 pull-left"> {{--main content--}}
        <h2>Update Company</h2>
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px;"> 
           <form method="post" action="{{route('companies.update', [$company->id])}}" >
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="company-name">Name <span class="required">*</span> </label>
                    <input name="name"
                        value="{{$company->name}}"
                        placeholder="Enter name"
                        id="name"
                        class="form-control" 
                        spellcheck="false" 
                        required />
                </div>
                <div class="form-group">
                    <label for="company-description">Description <span class="required">*</span> </label>
                    <textarea name="description"
                        placeholder="Enter description"
                        id="description"
                        style="resize: vertical"
                        rows="5"
                        class="form-control autosize-target text-left"
                        spellcheck="false">{{$company->description}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
           </form>
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
                <li><a href="/companies/{{$company->id}}">View Company</a></li>
                <li><a href="/companies">List Companies</a></li>
            </ol>
        </div>
    </div><!-- /sidebar -->
@endsection

