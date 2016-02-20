<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#btn1').click(function(e) {
      console.log("hi"); 
      $('html,body').animate({
       scrollTop: $("#content").offset().top},
       'slow');
    });

    $('#login-button').click(function(){
      var x =$(this).parent();
      var data = {email: $('input[name=email]', x).val(),
      password: $('input[name=password]', x).val(),
      _token: $('input[name=_token]', x).val()}
      $.post('userlogin', data, function(response){
        if(response == '1'){
          window.location.href = window.location.href + 'dashboard'; 
        }else{
          $('.err2').show();
        }
      });

    });

    $('#signup-button').click(function(){
      var x = $(this).parent();
      var data = {
        name: $('input[name=name]', x).val(),
        email: $('input[name=email]', x).val(),
        password: $('input[name=password]', x).val(),
        password_confirmation: $('input[name=confirm]').val(), 
        college: $('input[name=college]', x).val(),
        contact: $('input[name=number]', x).val(),
        _token: $('input[name=_token]', x).val()
      };

      var data2 = {
        name: $('input[name=name]', x).val(),
        email: $('input[name=email]', x).val(),
      }

      console.log(data);

      $.post('usersignup', data, function(response){
        if(response == '1'){
          //var token;
          window.location.href = window.location.href + 'dashboard'

        }else{
          $('.err1').show();
        }
      });
    });

$('.err2').hide();
$('.err1').hide();

});
</script>
</head>

<body>
  <div id="head">
    <div id="log">
      <a class="btn-large waves-effect waves-light yellow darken-4 modal-trigger" href="#modal1">SIGNUP</a>&nbsp &nbsp
      <a class="btn-large waves-effect waves-light yellow darken-4 modal-trigger" href="#modal2">LOGIN</a>


      <!--Modal1 structure-->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h3 class="center-align blue-text">SIGN UP</h3>
          <div class="row">
            <div class="col s12">
              <form class="center-align" method="post" action="usersignup">
                <input style="color:#000" type="text" name="name" placeholder="Name" required></input>
                <input style="color:#000" type="email" name="email"placeholder="Email ID" required></input>
                <input style="color:#000" type="password" name="password" placeholder="Password" required></input>
                <input style="color:#000" type="password" name ="confirm" placeholder="Confirm Password"></input>
                <input style="color:#000" type="text" name="college" placeholder="College"></input>
                <input style="color:#000" type="text" name="number" placeholder="Contact"></input>
                <input type='hidden' name="_token" value="{{ csrf_token() }}">
                <p class="center-align red-text text-darken-2 err1" >
                  What??<bt>Username and password don't match!!</p>
                  <button type="button" class="btn btn-large blue" id="signup-button">SUBMIT</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!--Modal2 structure-->
        <div id="modal2" class="modal">
          <div class="modal-content">
            <h3 class="centre-align blue-text">LOGIN</h3>
            <div class="row">
              <div class="col s12">
                <form class="center-align" method="post" action="userlogin">
                  <input style="color:#000" type="email" name="email" placeholder="Email ID" required></input>
                  <input style="color:#000" type="password" name="password" placeholder="Password" required></input>
                  <input type='hidden' name="_token" value="{{ csrf_token() }}">
                  <p class="center-align red-text text-darken-2 err2" >
                    What??<bt>Username and password don't match!!</p>
                    <button type='button' class="btn btn-large blue vertical-align" id='login-button'>Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <img src="img/logo.jpeg" id="logo">
        <h5 class="white-text" id="subtxt">THE ONLINE PORTAL TO RENT STUFF IN YOUR COLLEGE</h5>
        <br />
        <a class="btn-floating btn-large waves-effect waves-light red" id="btn1" href="#content"><i class="material-icons">keyboard_arrow_down</i></a>
      </div>

      <div id="content">
        <div class="row">
          <div class="col s12 offset-s3">
            <h4 id="subhead">POST FREE AD FOR YOUR COLLEGE PEERS</h4>
          </div>
        </div>
        <div class="row">
          <div class="col s4 context">
            <img src="img/upload.svg" class="svg">
            <p class="svgtext">Post a Free Ad on your college marketplace to sell used books, novels, drafters etc. or to find flat/flatmates, arrange carpools</p>
          </div>
          <div class="col s4 verticalLine context">
            <img src="img/chaticon.svg" class="svg">
            <p class="svgtext">Your college peers interested in your Ad will message you using our in-built chat.</p>
          </div>
          <div class="col s4 verticalLine context">
            <img src="img/meet.svg" class="svg">
            <p class="svgtext">Meet the person (your college peer/junior/senior) inside the campus to complete the deal.</p>
          </div>
        </div>
        <a class="btn btn2 btn-large waves-effect waves-light red">Post an AD</a>
      </div>

      <div id="search">
        <div class="row">
          <div class="col s12 offset-s3 white-text">
            <h4 id="subhead">FIND ADS IN AND AROUND YOUR COLLEGE</h4>
          </div>
          <form action="collegesearch" method="post">
            <input type="text" id="inp" class = "auto"  name="college" placeholder=" Search your College"></input>
            {!!csrf_field()!!}
            <button type = "submit"  class="btn btn-large waves-effect waves-light green darken-2" id="btn3">Search</button>
          </form>
        </div>
        <div class="row">
          <div class="col s4 context sertxt">
            <img src="img/college.svg" class="svg">
            <p class="svgtext white-text">Select your college and open its marketplace from the search bar.</p>
          </div>
          <div class="col s4 verticalLine context sertxt">
            <img src="img/search.svg" class="svg">
            <p class="svgtext white-text">Browse through listed Ads. If interested in any Ad, chat with your peer who has posted that Ad.</p>
          </div>
          <div class="col s4 verticalLine context sertxt">
            <img src="img/meet.svg" class="svg">
            <p class="svgtext white-text">Meet the person (your college peer/junior/senior) inside the campus to complete the deal.</p>
          </div>
        </div>
      </div>

      <footer id="foo">
        <div id="fav">
          <i class="mdi mdi-facebook"></i>
        </div>
      </footer>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <script type="text/javascript">
    //autocomplete
    $(".auto").autocomplete({
      source: "{{URL::asset('autocompletecollege')}}",
      minLength: 1,
      select: function(event,ui)
      {
        $('.auto').val(ui.item.value);


      }

    });
    $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
          });

    </script>


  </body>
  </html>