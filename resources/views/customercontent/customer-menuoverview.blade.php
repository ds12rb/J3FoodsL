@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection

@section("styles")
	<style>
		.menu-item{
			position: relative;
			display: inline-block;
		}
	
		.menu-item img{
			width: 250px;
			height: 150px;
		}
		
		.menu-item .name {
			margin-top: 0px;
			margin-bottom: 0px;
			color: white;
			background: rgb(75, 75, 75);
			padding: 4px;
		}
		
		.menu-item .price {
			margin-top: 0px;
			color: white;
			background: rgb(120, 120, 120);
			padding: 4px;
		}
	</style>
@endsection


@section('content')
<div class="container">
  <div id="restaurant-hdrcontainer" >
  <div class="row">
              <div id="rhdr-left" class="col-sm-3">
              <img src="../../images/logoplaceholder.PNG" />
              </div>
              <div id="rhdr-center" class="col-sm-6 text-center">
                                      <div id="avgrating">
                                                  <span id="avgrating-emptystar" class="glyphicon glyphicon-star-empty"></span>
                                                  <span id="avgrating-star" class="glyphicon glyphicon-star"></span>
                                      </div>
              </div>
              <div id="rhdr-right" class="col-sm-3">
                        <a data-toggle="collapse" data-target="#shopping-cart"><span class="glyphicon glyphicon-shopping-cart" id="rhdr-shoppingicon"  data-toggle="tooltip" title="Click to show Shopping Cart"></span></a> <?php //TODO: add a popover to explain what the button does clicking activates a popoutmenu  ?>
                                      <div id="rhdr-info">
                                      <p>
                                      <span class="glyphicon glyphicon-map-marker"></span> {{$restaurantInfo->address}}
                                      </p>

                                      <p>
                                                  <span class="glyphicon glyphicon-earphone"></span> {{$restaurantInfo->phoneno}}
                                      </p>

                                      <p>
                                      <span class="glyphicon glyphicon-envelope"></span> {{$restaurant->email}}
                                      </p>

                                      </div>


              </div>
  </div>
  </div>
  <hr />

<div id="menu-test-contrainer" class="row">
	@foreach ($items as $item)
		<div class="col-sm-4 menu-items">
		<div class="menu-item">
			<img src="{{$item->image}}"/>
			<h3 class="name">{{$item->name}}</h2>
			<h4 class="price">${{$item->price}}</h2>
		</div>
	</div>
	@endforeach
</div>


  <div id="menu-specials-container" class="row">
  <h1>Specials</h1>

  <div class="row"> <!-- start of row -->
    <div class="col-sm-4 menu-items">
      <a data-toggle="modal" data-target="#item-subscreen">
        <div class="card ">
          <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
            <div class="row">
              <div class="item-description col-sm-8">
                <p class="card-text"> pizza
                and chicken</p>
              </div>
              <div class="item-price col-sm-4">
                <p class="card-text">$50.00</p>
              </div>
            </div>
      </div>
    </a>
    </div>

    <div class="col-sm-4 menu-items">
      <a data-toggle="modal" data-target="#item-subscreen">
        <div class="card ">
          <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
            <div class="row">
              <div class="item-description col-sm-8">
                <p class="card-text"> pizza
                and chicken</p>
              </div>
              <div class="item-price col-sm-4">
                <p class="card-text">$50.00</p>
              </div>
            </div>
      </div>
    </a>
    </div>


    <div class="col-sm-4 menu-items">
      <a data-toggle="modal" data-target="#item-subscreen">
        <div class="card ">
          <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
            <div class="row">
              <div class="item-description col-sm-8">
                <p class="card-text"> pizza
                and chicken</p>
              </div>
              <div class="item-price col-sm-4">
                <p class="card-text">$50.00</p>
              </div>
            </div>
      </div>
    </a>
    </div>
  </div> <!-- end of row -->

  </div>
  <hr />

  <div id="menu-appetizers-container" >
    <h1>Appetizers</h1>
  <div class="row"> <!-- start of row -->
  <div class="col-sm-3 menu-items">
    <a data-toggle="modal" data-target="#item-subscreen">
      <div class="card ">
        <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
          <div class="row">
            <div class="item-description col-sm-8">
              <p class="card-text"> pizza
              and chicken</p>
            </div>
            <div class="item-price col-sm-4">
              <p class="card-text">$50.00</p>
            </div>
          </div>
    </div>
  </a>
  </div>

  <div class="col-sm-3 menu-items">
    <a data-toggle="modal" data-target="#item-subscreen">
      <div class="card ">
        <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
          <div class="row">
            <div class="item-description col-sm-8">
              <p class="card-text"> pizza
              and chicken</p>
            </div>
            <div class="item-price col-sm-4">
              <p class="card-text">$50.00</p>
            </div>
          </div>
    </div>
  </a>
  </div>


  <div class="col-sm-3 menu-items">
    <a data-toggle="modal" data-target="#item-subscreen">
      <div class="card ">
        <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
          <div class="row">
            <div class="item-description col-sm-8">
              <p class="card-text"> pizza
              and chicken</p>
            </div>
            <div class="item-price col-sm-4">
              <p class="card-text">$50.00</p>
            </div>
          </div>
    </div>
  </a>
  </div>


  <div class="col-sm-3 menu-items">
    <a data-toggle="modal" data-target="#item-subscreen">
      <div class="card ">
        <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
          <div class="row">
            <div class="item-description col-sm-8">
              <p class="card-text"> pizza
              and chicken</p>
            </div>
            <div class="item-price col-sm-4">
              <p class="card-text">$50.00</p>
            </div>
          </div>
    </div>
  </a>
  </div>

  </div> <!-- end of row -->


  </div>
  <hr />

  <div id="menu-mains-container" class="row">
    <h1>Mains</h1>

    <div class="row"> <!-- start of row -->
      <div class="col-sm-3 menu-items">
        <a data-toggle="modal" data-target="#item-subscreen">
          <div class="card ">
            <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
              <div class="row">
                <div class="item-description col-sm-8">
                  <p class="card-text"> pizza
                  and chicken</p>
                </div>
                <div class="item-price col-sm-4">
                  <p class="card-text">$50.00</p>
                </div>
              </div>
        </div>
      </a>
      </div>

      <div class="col-sm-3 menu-items">
        <a data-toggle="modal" data-target="#item-subscreen">
          <div class="card ">
            <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
              <div class="row">
                <div class="item-description col-sm-8">
                  <p class="card-text"> pizza
                  and chicken</p>
                </div>
                <div class="item-price col-sm-4">
                  <p class="card-text">$50.00</p>
                </div>
              </div>
        </div>
      </a>
      </div>


      <div class="col-sm-3 menu-items">
        <a data-toggle="modal" data-target="#item-subscreen">
          <div class="card ">
            <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
              <div class="row">
                <div class="item-description col-sm-8">
                  <p class="card-text"> pizza
                  and chicken</p>
                </div>
                <div class="item-price col-sm-4">
                  <p class="card-text">$50.00</p>
                </div>
              </div>
        </div>
      </a>
      </div>


      <div class="col-sm-3 menu-items">
        <a data-toggle="modal" data-target="#item-subscreen">
          <div class="card ">
            <img class="card-img-top center-block" src="http://placehold.it/140x100" alt="Card image caption">
              <div class="row">
                <div class="item-description col-sm-8">
                  <p class="card-text"> pizza
                  and chicken</p>
                </div>
                <div class="item-price col-sm-4">
                  <p class="card-text">$50.00</p>
                </div>
              </div>
        </div>
      </a>
      </div>

    </div> <!-- end of row -->
  </div>
  <hr />


  <!-- Modal -->
  <div id="item-subscreen" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{route('validcustomerloginlink')}}" method="post" role="form">
            <div class="list-group">
                        <a href="#" class="list-group-item">
                          <h4 class="list-group-item-heading">Pizza Size</h4>
                          <label for="pizzasize" class="sr-only">Pizza Sizes</label>
                          <select class="form-control" id="pizzasize">
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>Extra Large</option>
                          </select>
                        </a>

                        <a href="#" class="list-group-item">
                          <h4 class="list-group-item-heading">Pizza Sauces</h4>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
                        </a>

                        <a href="#" class="list-group-item">
                          <h4 class="list-group-item-heading">Pizza Toppings</h4>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
                          <label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
                        </a>
            </div>
          <input type="hidden" value="{{Session::token()}}" name="_token" />
          </form>
        </div>
        <div class="modal-footer">
          <div class = "btn-group btn-group-lg">
            <a data-dismiss="modal"><button type="button" class="btn btn-default" >Add to Shopping Cart</button></a>
            <a data-dismiss="modal"><button type="button" class="btn btn-default" >Return</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
@include('includes.shoppingcart')

@endsection
