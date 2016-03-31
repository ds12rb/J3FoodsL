@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection


@section('content')
<div id="customer-overview-container" class="container ">
  <div class="row ">


    <div class="panel panel-default">

      <!-- Default panel contents -->
      <div class="panel-heading">
        <h1>Currently Open
        <span class="badge">{{$restaurants->count()}}</span></h1>
       </div>


      <div class="panel-body">
        <h3>For More Information Click on a Restaurant Below</h3>
			
			<div class="row">
				@foreach ($restaurants as $rest)
                  <div class="col-sm-3 text-center">
                      <a href="{{ route('customermenuoverviewlink' , ['restaurant' => $rest->id] ) }}">
                          <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                      </a>
                      <h5>
                          <a href="{{ route('customermenuoverviewlink' , ['restaurant' => $rest->id] ) }}">{{$rest->name}}</a>
						  <a class= "btn btn-default" href="#"> <span class="glyphicon glyphicon-star-empty"></span> </a>
						  <!-- use <span class="glyphicon glyphicon-star"> when the user has it favourited, might be some if statement to determine, like if favourited then use this glyphicaon
						  i guess we need to also find out a way to do it in real time!-->
                      </h5>
                  </div>
				@endforeach
            </div>
			
    </div>
  </div>
</div>
@endsection
