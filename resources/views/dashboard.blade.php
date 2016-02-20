@extends('common')

@section('content')

    <div class="grey lighten-2">
      <div class="row">
        <div class="col s12">
          <h3 class="centre grey-text text-darken-2 centre">{{$clg}}</h3>
        </div>
      </div>
      <div class="row">
        <div class="col s5 offset-s3">
          <form method = "post" action = "searchitem">
            <input type="text" name="item" placeholder="Search Item" class = "auto" id="input"></input>
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
                @foreach($products as $pro)

          <a href="#">
            <div class="card black-text">
              <div class="row">
                <div class="col s3">
                  <img src="img/guitar.jpg" class="materialboxed">
                </div>
                <div class="col s5" id="border">
                  <h4>{{$pro[0]->name}}</h4>
                  <p>Duration: {{$pro[0]->rent_time}}</p>
                  <p>Details : {!!$pro[0]->details!!}</p>
                </div>
                <div class="col s4">
                  <h5>Cost:</h5><h1>&#8377 {{$pro[0]->cost}}</h1>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
      @stop