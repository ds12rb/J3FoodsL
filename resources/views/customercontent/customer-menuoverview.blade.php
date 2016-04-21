@extends('layouts.master')
@section('title')
J3 Foods - Online Food Ordering
@endsection

@section('navigation')
@include('includes.customer-topbar')
@endsection

@section("styles")
  <style>

  body{
        background-image: none;
  }
    .menu-items {
      display: block;
      border: none;
    }

    .menu-item {
      position: relative;
      display: inline-block;
      width: 250px;
      vertical-align: top;
    }

    .menu-item:hover {
      cursor: pointer;
    }
  
    .menu-item img {
      width: 250px;
      height: 150px;
    }
    
    .menu-item .name {
      margin-top: 0px;
      margin-bottom: 0px;
      color: white;
      background: rgb(75, 75, 75);
      padding: 4px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .menu-item:hover .name {
      white-space: normal;
    }
    
    .menu-item .price {
      margin-top: 0px;
      color: white;
      background: rgb(120, 120, 120);
      padding: 4px;
    }

    .menu-category {
      display: block;
    }

    .old-price {
      text-decoration: line-through;
      color: rgb(180, 180, 180);
    }

    .new-price {
      padding-left: 8px;
    }

    #filters .form-group {
      display: inline-block;
      width: auto;
    }

    #filters .form-group:nth-child(2) {
      vertical-align: top;
    }

    #filters .form-group:first-child {
      padding-right: 16px;
    }

    .menu-category {
      background-color: #f4f4f4;
      border: 1px solid #dddddd;
      border-radius: 2px;
      padding: 8px;
    }

    .menu-category:not(.menu-specials) {
      margin-bottom: 8px;
    }

    .menu-category h1 {
      font-size: 2em;
      font-weight: bold;
      display: inline-block;
      margin-left: 0;
    }

    .menu-category hr {
      margin-top: 10px;
      margin-bottom: 10px;
      border-color: #dddddd;
    }

    .category-title {
      padding-left: 4px;
    }

    .category-title:hover {
      background-color: #e0e0e0;
      cursor: pointer;
    }

    #rest-img {
      width: 200px;
      height: 200px;
    }

    #rhdr-info {
      padding: 12px;
      background-color: #eeeeee;
      border: 1px solid #dddddd;
      margin: 16px;
    }

    #avgrating {
      padding: 4px 0 0 2px;
      background-color: #eeeeee;
      margin-top: 16px;
      border: 1px solid #dddddd;
      border-radius: 2px;
    }

    #reviews {
      margin: 16px 0 0 0;
    }

    .review {
      width: 48%;
      display: inline-block;
      background-color: #eeeeee;
      vertical-align: top;
      padding: 4px 8px 0 8px;
      border: 1px solid #dddddd;
      border-radius: 2px;
      float: right;
    }

    .review:first-child {
      float: left;
    }

    .review .rating .material-icons {
      font-size: 20px;
    }

    .review .name {
      float: right;
    }

    .review .name::before {
      content: "- ";
    }

    .review .body {
      max-height: 20px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .review .body::before {
      content: open-quote;
    }

    .review .body::after {
      content: close-quote;
    }

    #restaurant-hdrcontainer{
      background-image: url("http://ellementlife.com/wp-content/uploads/revslider/home-11/slide15-1200x500.jpg");
    }

    #rhdr-info hr {
      border-color: #888888;
      margin: 10px 0 10px 0;
    }

    #rhdr-info .hours {
      margin-bottom: 0;
    }

    #all-hours {
      font-size: 12px;
      color: #78C3AE;
      text-decoration: underline;
      cursor: pointer;
      float: right;
      padding-top: 4px;
    }

    #hours-table thead tr {
      font-weight: bold;
    }
  </style>
@endsection


@section('content')

<div class="container">
  <div id="restaurant-hdrcontainer" >
    <div class="row">
      <div id="rhdr-left" class="col-sm-4 col-md-3">
        <img id="rest-img" src="{{$restaurantInfo->image}}" />
      </div>
      <div id="rhdr-center" class="col-sm-5 col-md-6 text-center">
        <div id="avgrating">
          <p>Average rating:</p>
          @for($i=0; $i<floor($restaurant->aveRating()); $i++)
            <i class="material-icons">star</i>
          @endfor
          @if(floor($restaurant->aveRating()) != ceil($restaurant->aveRating()))
            <i class="material-icons">star_half</i>
          @endif
          @for($i=0; $i<5-ceil($restaurant->aveRating()); $i++)
            <i class="material-icons">star_border</i>
          @endfor
        </div>
        <div class="row" id="reviews">
          <?php
            $reviews = $restaurant->reviews;
            if($reviews->count() >= 2){
              $reviews = $reviews->random(2);
            }
          ?>
          @foreach($reviews as $review)
            <div class="review">
              <div class="rating">
                @for($i=0; $i<$review->rating; $i++)
                  <i class="material-icons">star</i>
                @endfor
                @for($i=0; $i<5-$review->rating; $i++)
                  <i class="material-icons">star_border</i>
                @endfor
              </div>
              <p class="body">{{$review->comment}}</p>
              <p class="name">{{$review->poster->user->name}}</p>
            </div>
          @endforeach
        </div>
      </div>
      <div id="rhdr-right" class="col-sm-3">
        <div id="rhdr-info">
          <p>
          <span class="glyphicon glyphicon-map-marker"></span> 
            <a href="http://maps.google.com/?q={{{ $restaurantInfo->address or '' }}},{{{ $restaurantInfo->city or '' }}},{{$restaurantInfo->province}}">
              {{{ $restaurantInfo->address or 'N/A' }}}
            </a>
          </p>

          <p>
            <span class="glyphicon glyphicon-earphone"></span> {{$restaurantInfo->phoneno}}
          </p>

          <hr/>

          <h4>
            Hours
            <span id="all-hours">See all</span>
          </h4>

          <p class="hours">
            <strong>Today:</strong>
            &nbsp;
            <span id="today-hours">{{$restaurant->todayHours()}}</span>
          </p>

          <p class="hours">
            <strong>Tomorrow:</strong>
            &nbsp;
            <span id="tomorrow-hours">{{$restaurant->tomorrowHours()}}</span>
          </p>
      </div>
      </div>
  </div>
</div>

  <hr />



  <div id="filters">
    <div class="form-group">
      <label for="sort-by">Sort by</label>
      <select id="sort-by" class="form-control">
        <option value="alpha-asc">Alphabetical A-Z</option>
        <option value="alpha-des">Alphabetical Z-A</option>
        <option value="price-asc">Price low-high</option>
        <option value="price-des">Price high-low</option>
      </select>
    </div>

    <div class="form-group">
      <label for="item-search">Search menu</label>
      <input id="item-search" type="text" class="form-control"/>
    </div>
    <button id="item-search-btn" class="btn btn-primary">
      <span class="glyphicon glyphicon-search"></span>     
    </button>
  </div>

  <?php
    $sortMethod = isset($_GET["sort"]) ? $_GET["sort"] : "alpha-asc";
    $searchQuery = isset($_GET["search"]) ? $_GET["search"] : "";
  ?>

  <div class="menu-category menu-specials">
    <div class="category-title">
      <span class="glyphicon glyphicon-plus hidden"></span>
      <span class="glyphicon glyphicon-minus"></span>
      <h1>Specials</h1>
    </div>
    <div class="category-body">
      <hr/>
      <div class="menu-items">
      <?php
        //Get all specials for the restaurant and sort them appropriately
        $specials = $restaurant->specials;

        if($searchQuery != ""){
          $specials = $specials->filter(function($special) use ($searchQuery){
            $pos = strpos(strtolower($special->item->name), strtolower($searchQuery));
            return $pos !== false;
          });
        }

        if ($sortMethod == "alpha-des") {
          //Sort by descending alphabetical order
          $specials = $specials->sortBy(function($special){
            return $special->item->name;
          })->reverse();

        } elseif ($sortMethod == "price-asc") {
          //Sort by ascending price order, using special prices if appropriate
          $specials = $specials->sortBy(function($special){
            return $special->price;
          });

        } elseif ($sortMethod == "price-des") {
          //Sort by descending price order, using special prices if appropriate
          $specials = $specials->sortBy(function($special){
            return $special->price;
          })->reverse();

        } else{
          //Sort by ascending alphabetical order
          $specials = $specials->sortBy(function($special){
            return $special->item->name;
          });

        }
      ?>
      @foreach ($specials as $special)
        <div class="menu-item" data-itemid="{{$special->item->item_id}}">
          <img src="{{$special->item->image}}"/>
          <h3 class="name">{{$special->item->name}}</h3>
          <h4 class="price"><span class="old-price">${{$special->item->price}}</span><span class="new-price">${{$special->spec_price}}</span></h4>
        </div>
      @endforeach
      </div>
    </div>
  </div>
  <hr/>

  <?php
    $categories = $restaurant->categories;
    $categories = $categories->sortBy(function($category){
      return $category->category_order;
    });
  ?>
  @foreach($categories as $category)
    <div class="menu-category">
      <div class="category-title">
        <span class="glyphicon glyphicon-plus hidden"></span>
        <span class="glyphicon glyphicon-minus"></span>
        <h1>{{$category->category_name}}</h1>
      </div>
      <div class="category-body">
        <hr/>
        <div class="menu-items">

        <?php
          //Get all items in category and sort them appropriately
          $items = $category->items;

          if($searchQuery != ""){
            $items = $items->filter(function($item) use ($searchQuery){
              $pos = strpos(strtolower($item->name), strtolower($searchQuery));
              return $pos !== false;
            });
          }

          if ($sortMethod == "alpha-des") {
            //Sort by descending alphabetical order
            $items = $items->sortBy(function($item){
              return $item->name;
            })->reverse();

          } elseif ($sortMethod == "price-asc") {
            //Sort by ascending price order, using special prices if appropriate
            $items = $items->sortBy(function($item){
              if($item->spec_id != NULL){
                return $item->special->spec_price;
              } else {
                return $item->price;
              }
            });

          } elseif ($sortMethod == "price-des") {
            //Sort by descending price order, using special prices if appropriate
            $items = $items->sortBy(function($item){
              if($item->spec_id != NULL){
                return $item->special->spec_price;
              } else {
                return $item->price;
              }
            })->reverse();

          } else{
            //Sort by ascending alphabetical order
            $items = $items->sortBy(function($item){
              return $item->name;
            });

          }
        ?>

        @foreach ($items as $item)
          <div class="menu-item" data-itemid="{{$item->item_id}}">
            <img src="{{$item->image}}"/>
            <h3 class="name">{{$item->name}}</h3>
            @if($item->spec_id != NULL)
              <h4 class="price"><span class="old-price">${{$item->price}}</span><span class="new-price">${{$item->special->spec_price}}</span></h4>
            @else
              <h4 class="price">${{$item->price}}</h4>
            @endif
          </div>
        @endforeach
        </div>
      </div>
    </div>
  @endforeach

  <!-- Modal -->
  <div id="item-options-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Item options</h4>
        </div>
        <div class="modal-body">
          <form action="{{route('addtocart')}}" method="post" role="form">
            <div id="item-option-group" class="form-group"></div>
            <div id="item-quantity" class="form-group">
              <label for="qty">Quantity</label>
              <input type="number" name="qty" min="1" max="99" value="1" class="form-control"/>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Add to order</button>
            </div>
            <input type="hidden" name="itemid" id="add-form-itemid" />
            <input type="hidden" value="{{Session::token()}}" name="_token" />
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="hours-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Restaurant hours</h4>
        </div>
        <div class="modal-body">
          <table id="hours-table" class="table table-striped">
            <thead>
              <th>Day</th>
              <th>Open time</th>
              <th>Close time</th>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>
@include('includes.shoppingcart')

@endsection

@section('javascript')
  <script type="text/javascript">
    //On page load
    $(document).ready(function(){
      //Set sort box to correct selection based on URL parameters
      if(getUrlParameter("sort") != undefined){
        $("#sort-by").val(getUrlParameter("sort"));
      }

      //Set item search box to contain current search query
      if(getUrlParameter("search") != undefined){
        $("#item-search").val(decodeURIComponent(getUrlParameter("search")));
      }

      //Event handler for changing sort
      $("#sort-by").change(function(e){
        //Get current URL, without query string
        currentUrl = window.location.href.split("?")[0];

        searchQuery = "";
        if(getUrlParameter("search") != undefined){
          searchQuery = "&search=" + getUrlParameter("search");
        }

        //Redirect to this page with appropriate sort query
        window.location.replace(currentUrl + "?sort=" + e.target.value + searchQuery);
      });

      //Open options window on clicking an item
      $(".menu-item").click(function(e){
        itemid = $(e.target).parent(".menu-item").data("itemid");
        $("#add-form-itemid").val(itemid);
        $.get("{{route("menuitemoptions", ["item"=>""])}}/"+itemid, function(response){
          if(response != null){
            $("#item-option-group").html(response);
          }
          $("#item-options-modal").modal("show");
        });
      });

      //On enter key press in item search
      $("#item-search").on("keypress", function(e){
        if(e.which == 13){
          searchMenu();
        }
      });

      //On click of item search button
      $("#item-search-btn").click(function(e){
        searchMenu();
      });

      $(".category-title").click(function(e){
        target = $(e.target);
        clickedTitle = (target.hasClass("category-title")) ? target : target.parents(".category-title");
        plusMinus = clickedTitle.find(".glyphicon");
        plusMinus.toggleClass("hidden");
        categoryBody = clickedTitle.parent().find(".category-body");
        categoryBody.slideToggle();
      });

      $("#all-hours").click(function(e){
        $.get("{{route("restHours", ["restaurant"=>$restaurant->id])}}", function(response){
          if(response != null){
            $("#hours-table tbody").html(response);
          }
          $("#hours-modal").modal("show");
        });
      });
    });

    function searchMenu(){
      currentUrl = window.location.href.split("?")[0];
      queryString = "";
      searchQuery = $("#item-search").val();
      if(searchQuery != ""){
        queryString = "?";
        if(getUrlParameter("sort") != undefined){
          queryString += "sort=" + getUrlParameter("sort") + "&";
        }

        queryString += "search=" + encodeURIComponent(searchQuery);

        window.location.replace(currentUrl + queryString);
      } else if(getUrlParameter("sort") != undefined){
        queryString += "?sort=" + getUrlParameter("sort");
      }
      window.location.replace(currentUrl + queryString);
    }

    @include('includes.js-get-url-params');
  </script>
@endsection