<div id="topbar-logged" class="topbar">

  <nav class="navbar  topbar-loggednav navbar-default  navbar-fixed-top ">
    <div class="container-fluid">
      <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="navbar-collapse-1" aria-expanded="false">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                      </button>

                      <a class="navbar-brand" href="{{ route('customeroverviewlink'  ) }}">
                      <span class="glyphicon glyphicon-road"></span> J3 Delivery
                      </a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse-1">



          <ul class="nav navbar-nav navbar-right">
          <li>
            <form class="navbar-form" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">   <span class="glyphicon glyphicon-search"></span>  </button>
            </form>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span>Categories</span>
            <span class="caret"></span></a>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Chicken</a></li>
              <li><a href="#">Pizza</a></li>
              <li><a href="#">Pasta</a></li>
            </ul>
          </li>
          <li>
              <a href="#" >
                  <span class="glyphicon glyphicon-shopping-cart"></span><?php //TODO: add a popover to explain what the button does clicking activates a popoutmenu  ?>
                   </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user"></span>
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Welcome</a></li>
              <li><a href="{{ route('customeroverviewlink'  ) }}">Overview</a></li>
              <li><a href="{{ route('customerprofilelink'  ) }}">Edit Profile</a></li>
              <li><a href="#">Help</a></li>
              <li class="separator"> </li>
              <li><a href=" {{ url('/logout') }}">Logout NOW</a></li>
            </ul>
          </li>

        </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
