@extends('common')

@section('content')

    <div class="grey lighten-2">
      <div class="row">
        <style type="text/css">
        .ui-autocomplete
{
    z-index:1999 !important;
}</style>
        <div class="col s12">
          <h3 class="centre grey-text text-darken-2 centre">{{$clg}}</h3>
        </div>
      </div>
      <div class="row">
        <div class="col s5 offset-s3">
          <form method = "post" action = "searchitem">
            <input type="text" name="item" placeholder="Search Item"   id="input"></input>
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
            <form method = "post" action ="collegesearch">
              <input type="text" placeholder="Search College"  class ="auto1" name="college" id="inputclg" autocomplete="on"></input>
              {!!csrf_field()!!}
          </div>
          <div class="col s3">
            <button class="btn" id="btn1">Search</button>

          </div>

            </form>
        </div>
      </div>
    </div>
    @if(count($products) == 0)
    <div class="row">
      <div class="col s6 offset-s3 red lighten-4">
        <p class="center-align red-text text-darken-2">No result found for your search!</p>
      </div>
    </div>
    @endif
    <div class="container">
      <div class="row">
        <div class="col s12">
                @foreach($products as $pro)

          <a href="#">
            <div class="card black-text">
              <div class="row">
                <div class="col s3">
                  <img src="img/guitar.jpg" class="materialboxed">
                </div>
                <div class="col s5" id="border">
                  <h4>{{$pro->name}}</h4>
                  <p>Duration: {{$pro->rent_time}}</p>
                  <p>Details : {!!$pro->details!!}</p>
                </div>
                <div class="col s4">
                  <h5>Cost:</h5><h1>&#8377 {{$pro->cost}}</h1>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
          <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <script type="text/javascript">
    //autocomplete
    $("#inputclg").autocomplete({
      source: "{{URL::asset('autocompletecollege')}}",
      minLength: 1,
      select: function(event,ui)
      {
        $('#inputclg').val(ui.item.value);


        }

      });
    
    $(".auto1").autocomplete({
      source: "{{URL::asset('autocompletecollege')}}",
      minLength: 1,
      select: function(event,ui)
      {
        $('.auto1').val(ui.item.value);


        }

      });
      $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
          });

      </script>

      @stop