<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
  <link type="text/css" rel="stylesheet" href="css/style2.css"  media="screen,projection"/>
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#login-button').click(function(){
      var x =$(this).parent();
      var data = {email: $('input[name=email]', x).val(),
      password: $('input[name=password]', x).val(),
      _token: $('input[name=_token]', x).val()}
      $.post('userlogin', data, function(response){
        if(response == '1'){
          console.log('sda');
          window.location.href = window.location.href; 
        }else{
          console.log("asd");
          $('.err1').show();
        }
      });

    });

    $('#signup-button').click(function(){
      var x = $(this).parent();
      var data = {
        name: $('input[name=name]', x).val(),
        email: $('input[name=email]', x).val(),
        password: $('input[name=password]', x).val(),
        college: $('input[name=college]', x).val(),
        contact: $('input[name=contact]', x).val(),
        _token: $('input[name=contact]', x).val()
      };

      var data2 = {
        name: $('input[name=name]', x).val(),
        email: $('input[name=email]', x).val(),
      }

      console.log(data);

      $.post('usersignup', data, function(response){
        if(response == '1'){
          //var token;
          console.log('ass');
          window.location.href = window.location.href + 'dashboard';

        }else{
          $('.err1').hide();
        }
      });
    });

$('.err2').hide();
$('.err1').hide();
});
</script>
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
          <li><a href="myadds">My Ads</a></li>
          <li><a href="mycart">My Cart</a></li>
          <li><a href="myrenthistory">My Rent History</a></li>
          <li><a href="myacc">My Account</a></li>
          <li class="divider"></li>
          <li><a href="logout">Sign Out</a></li>
        </ul>
        @else
        <li><a href="#modal2" class = "modal-trigger">SIGNUP</a></li>
        <li><a href="#modal3" class = "modal-trigger">LOGIN</a></li>
        <div id="modal2" class="modal">
          <div class="modal-content">
            <h3 class="center-align blue-text">SIGN UP</h3>
            <div class="row">
              <div class="col s12">
                <form class="center-align" method="post" action="usersignup">
                  <input style="color:#000" type="text" name="name" placeholder="Name"></input>
                  <input style="color:#000" type="email" name="email"placeholder="Email ID"></input>
                  <input style="color:#000" type="password" name="password" placeholder="Password"></input>
                  <input style="color:#000" type="password" placeholder="Confirm Password"></input>
                  <input style="color:#000" type="text" name="college" placeholder="College"></input>
                  <input style="color:#000" type="number" name="number" placeholder="Contact"></input>
                  <input type='hidden' name="_token" value="{{ csrf_token() }}">
                  <button type="button" class="btn btn-large blue" id="signup-button">SUBMIT</button>
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
                <form class="center-align" method="post" action="userlogin">
                  <input style="color:#000" type="email" name="email" placeholder="Email ID"></input>
                  <input style="color:#000" type="password" name="password" placeholder="Password"></input>
                  <input type='hidden' name="_token" value="{{ csrf_token() }}">
                  <p class="center-align red-text text-darken-2 err1">
                    What??<bt>Username and password don't match!!</p>
                    <button type='button' class="btn btn-large blue vertical-align" id="login-button">Login</button>
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