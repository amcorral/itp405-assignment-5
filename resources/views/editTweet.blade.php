<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Edit Tweet </title>
    <link rel="stylesheet" <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <header>
    Fake Twitter
    </header>

    <div class="container">
      @if(count($errors) > 0)
      <div class ="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li> {{$error}} </li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>

    <h3> This is the tweet you are editing! </h3>
    <div id="top">
      <form action="/tweets/{{$tweets->id}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="tweets"> Tweet </label>
            <input type="text" name="tweet" id="tweet" class="form-control" value="{{$tweets->tweet}}">
          </div>
          <button type="submit" class='btn btn-primary'> Edit </button>
      </form>
    </div>

    <a href="/"> <h4> Return To Fake Twitter </h4> </a>
  </body>
</html>

<style>

    header{
      background-color: #91AFFF;
      padding: 1em;
      height: 75px;
      font-size: 25px;
      text-align: center;
      font-family: "verdana";
    }

    h3 { margin: 25px; }

    h4 { margin: 25px; }

    #top {
      width: 90%;
      margin: 25px;
      height: 200px;
      border-style: solid;
      border-width: thin;
      font-size: 20px;
      padding-left: 10px;
      padding-top: 10px;
      border-radius: 10px;
      font-family: verdana;
    }

  </style>
