<html>
<form method="post" action = "usersignup">
<input type = "text" name="name" placeholder = "name">
<input type = "text" name="contact" placeholder = "Contact">
<input type = "text" name="college" placeholder = "College" class = "auto">
<input type = "email" name="email" placeholder = "email">
<input type = "password" name="password" placeholder = "password">
<input type = "password" name="password_confirmation" placeholder = "password confirmation">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
{!!csrf_field()!!}
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
     <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript">


    //autocomplete
    $(".auto").autocomplete({
      source: "{{URL::asset('autocompletecollege')}}",
      minLength: 3,
      select: function(event,ui)
      {
        $('.auto').val(ui.item.value);


      } 

    });

    </script>
    @if(Session::has('message'))
               <div class="signup-form" id="error">
           
            <p id="msg">{{Session::get('message')}}</p>
           
        </div>
         @endif

                           @if($errors->has())
                <p>  {{$errors->first('name',':message')}} </p>
                <p>  {{$errors->first('contact',':message')}} </p>
                <p>  {{$errors->first('email',':message')}} </p>
                <p>  {{$errors->first('college',':message')}} </p>

                <p>  {{$errors->first('password',':message')}} </p>
                <p>  {{$errors->first('password_confirmation',':message')}} </p>
                 
                  @endif
             
<button type = "submit">Submit</button>
</form>
</html>	