@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.topbar')
@endsection


@section('content')
<div class="container text-center" id="login-container" >
  <div class="row row-centered">
    <div class="col-sm-5 panel panel-default col-centered " id="login-panel">
      <div class="panel-header text-center">  <h1>Customer Login</h1></div>
      <div class="panel-body">
        @if(count($errors)>0)
        <div >
        <ul  class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{$error}}</li>
            @endforeach
          </ul>
        </div >
        @endif
        <form action="{{route('validcustomerloginlink')}}" method="post" role="form">
              <div class="form-group">
                <label class="sr-only" for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>

                <label class="sr-only" for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
              </div>
              <div id="forgotpass"><a href='#'>Forgot Password?</a> </div>
              <div id="loginsign-up">New to J3Foods?
                  <a href="{{ route('customerregisterlink'  ) }}">Sign up</a>
                  <button class='btn btn-sm btn-default ' /> Enter as a Guest</button>
              </div>


      </div>
        <div class="sign-up ">
        </div>

      <button type='submit'  class="login-btn btn btn-lg btn-primary  center-block btn-block" />Log In</button>

        <input type="hidden" value="{{Session::token()}}" name="_token" />
        </form>
    </div>
</div>
</div><!-- container --->
</div>
</div>
@endsection
