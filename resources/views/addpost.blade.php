<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    @include('common');
      <br />
      <div class="container grey lighten-4">
        <div class="row">
          <div class="col s4 offset-s4">
            <h3>POST AN AD!</h3>
          </div>
        </div>
        <div class="row">
          <div class="col s6 offset-s3">
            <form class="center-align" METHOD='POST' action='addpost'>
              <input type="text" name= "title" placeholder="Title"></input>
              <input type="text" name= "college" placeholder="College"></input>
              <div class="input-field">
                <select name = "tim">
                  <option value="" disabled selected>Duration:</option>
                  <option value="1">Days</option>
                  <option value="2">Weeks</option>
                  <option value="3">Months</option>
                </select>
              </div>
              <input type="number" name= "howmany" placeholder="How many?"></input>
              <input type="number" name= "cost" placeholder="Cost"></input>
              <input type="text" name= "details" placeholder="Details"></input>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>

              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="photo">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
              <br />
              <button class="btn btn-large blue" style="position: relative;bottom: 20px;" type="submit">SUBMIT</button>
            </form>
          </div>
        </div>
      </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script>
        $(document).ready(function() {
          $('select').material_select();
        });
      </script>
      <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>