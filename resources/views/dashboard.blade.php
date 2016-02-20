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
        <a href="#" class="brand-logo">&nbspRent<em>All</em></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#">SIGNUP</a></li>
          <li><a href="#">LOGIN</a></li>
          <li><a href="#">POST AD</a></li>
          <li><a href="#" class="dropdown-button" data-activates="dropdown1">DASHBOARD<i class="material-icons right">keyboard_arrow_down</i></a></li>
        </ul>
      </div>
    </nav>

    <!--Dropdown Structure-->
    <ul id='dropdown1' class='dropdown-content'>
      <li><a href="#!">Hi, username</a></li>
      <li><a href="#!">My Ads</a></li>
      <li><a href="#!">My Cart</a></li>
      <li><a href="#!">My Rent History</a></li>
      <li><a href="#!">My Account</a></li>
      <li class="divider"></li>
      <li><a href="#!">Sign Out</a></li>
    </ul>

    <div class="grey lighten-2">
      <div class="row">
        <div class="col s12">
          <h3 class="centre grey-text text-darken-2 centre">COLLEGE NAME</h3>
        </div>
      </div>
      <div class="row">
        <div class="col s5 offset-s3">
          <form>
            <input type="text" placeholder="Search Item" id="input"></input>
          </form>
        </div>
        <div class="col s3">
          <button class="btn" id="btn1">Search</button>
        </div>
      </div>
    </div>
    
    <!--Modal trigger-->
    <div class="row">
      <div class="col s5 offset-s5">
        <a class="btn btn-large red centre-align modal-trigger" href="#modal1">Change College</a>
      </div>
    </div>
    
    <!--Modal Structure-->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <div class="row">
          <div class="col s9">
            <form>
              <input type="text" placeholder="Search Item" id="input"></input>
            </form>
          </div>
          <div class="col s3">
            <button class="btn" id="btn1">Search</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s6 offset-s3 red lighten-4">
        <p class="center-align red-text text-darken-2">No result found for your search!</p>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col s12">
          <a href="#">
            <div class="card black-text">
              <div class="row">
                <div class="col s3">
                  <img src="img/guitar.jpg" class="materialboxed">
                </div>
                <div class="col s5" id="border">
                  <h4>Acoustic Guitar</h4>
                  <p>Duration: 1 week</p>
                  <p>College: JSSATE, Noida</p>
                  <p>Details : Lorem ipsum dolor sit amet, consectetur adipisicing...</p>
                </div>
                <div class="col s4">
                  <h5>Cost:</h5><h1>&#8377 25</h1>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
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