@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection


@section('content')
<section id="profile-section">
  <div class="container text-center" id="profile-container" >
    <div class="row row-centered">
      <div class="col-sm-5 panel panel-default col-centered " id="profile-panel">
        <div class="panel-header center-block">
          @include('includes.customer-profilecontentbar')
        </div>


  <div class="panel-body">
	  <form class="form-horizontal" role="form" method="POST" action="{{ route('customerupdateinfo')    }}">
	  {!! csrf_field() !!}
          <div class="form-group">

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			  
              <label class="sr-only" for="email">Email:</label>
              <input type="text" class="form-control" name="email" id="email" value="{{$currentUser->email}}" />
			  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
              @endif
              </div>

              <div class="input-row row">
              <label class="sr-only" for="firstname">Name:</label>
              <input type="text" class="form-control" name="name" id="name"  value="{{$currentUser->name}}"/>
              </div>


              <div class="form-group{{ $errors->has('phoneno') ? ' has-error' : '' }}">
              <label class="sr-only" for="phonenumber">Phone Number:</label>
              <input type="text" class="form-control" name="phoneno" id="phoneno"  value="{{$currentCustomer->phoneno}}"/>
			  @if ($errors->has('phoneno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phoneno') }}</strong>
                                    </span>
              @endif
              </div>


          </div>

      <div class="input-row row text-right" >
        <button type='submit'  class="btn  btn-primary   " />Save Changes</button>
      </div>



          </form>

      </div>
  </div>
  </div><!-- container --->
</div>
</div>
</section>
@endsection


@section('javascript')
<script>
$(function() {

$("#cpcontent-profile").addClass("active");



});
</script>
@endsection
