<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
      <link type="text/css" rel="stylesheet" href="css/style2.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

    <nav class="black lighten-2">
      <div class="nav-wrapper">

        <a href="#" class="brand-logo">Rent<em>All</em></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          @if(Auth::check())

          <li><a href="#">POST AD</a></li>
          <li><a href="#" class="dropdown-button" data-activates="dropdown1">Hi,Username<i class="material-icons right">keyboard_arrow_down</i></a></li>
          <!--Dropdown Structure-->
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">My Ads</a></li>
            <li><a href="#!">My Cart</a></li>
            <li><a href="#!">My Rent History</a></li>
            <li><a href="#!">My Account</a></li>
            <li class="divider"></li>
            <li><a href="#!">Sign Out</a></li>
          </ul>
        @else
          <li><a href="#modal2" class = "modal-trigger">SIGNUP</a></li>
          <li><a href="#modal3" class = "modal-trigger">LOGIN</a></li>
          <div id="modal2" class="modal">
              <div class="modal-content">
                <h3 class="center-align blue-text">SIGN UP</h3>
                <div class="row">
                  <div class="col s12">
                    <form class="center-align">
                      <input type="text" placeholder="Name"></input>
                      <input type="email" placeholder="Email ID"></input>
                      <input type="password" placeholder="Password"></input>
                      <input type="password" placeholder="Confirm Password"></input>
                      <input type="text" placeholder="College"></input>
                      <input type="number" placeholder="Contact"></input>
                      <button class="btn btn-large blue">SUBMIT</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
            <!--Modal2 structure-->
            <div id="modal3" class="modal">
              <div class="modal-content">
                <h3 class="centre-align blue-text">LOGIN</h3>
                <div class="row">
                  <div class="col s12">
                    <form class="center-align">
                      <input type="email" placeholder="Email ID"></input>
                      <input type="password" placeholder="Password"></input>
                      <button class="btn btn-large blue vertical-align">Login</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        @endif
          </ul>
      </div>
    </nav>
        @yield('content')
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script>
        $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal-trigger').leanModal();
        });
      </script>
      <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>