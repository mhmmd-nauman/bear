@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="jumbotron">
            <h3>Welcome to {!! env('PROJECT_NAME') !!}-{!! env('APP_NAME') !!} Administration</h3> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{url('/visitor')}}">
            <button type=button class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-user" aria-hidden=true></span>Visitors Module
            </button> 
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{url('/student')}}">
            <button type=button class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-user" aria-hidden=true></span>Students Module
            </button> 
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{url('/program')}}">
            <button type=button class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-book" aria-hidden=true></span>Programs Module
            </button> 
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{url('/department')}}">
            <button type=button class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-ok-circle" aria-hidden=true></span>Department Module
            </button> 
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{url('/#')}}">
            <button type=button class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-star" aria-hidden=true></span>Admissions Module
            </button> 
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{url('/#')}}">
            <button type=button class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-book" aria-hidden=true></span>Courses Module
            </button> 
            </a>
        </div>
    </div>
    
    
  
</div>

@endsection