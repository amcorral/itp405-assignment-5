<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Main Twitter </title>
    <link rel="stylesheet" <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>

  <body>
    <header>
      Fake Twitter
    </header>

    <div class="container">

      @if (session('successStatus'))
      <div class="alert alert-success" role="alert">
          {{ session('successStatus') }}
      </div>
      @endif

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
    <div id="top">
    <br>
      <form action="/newTweet" method="post">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="tweet"> Tweets </label>
              <input type="text" name="tweet" id="tweet" class="form-control" value="{{old('tweet')}}">
            </div>
          <button type="submit" class='btn btn-primary'> Create </button>
      </form>
    </div>

    <div id="bottom">
      <br><br>
      <table class="table">

         <thead>
           <th colspan="4"> Twitter Feed </th>
         </thead>
         <tbody>

         @foreach ($tweets as $tweet)
         <tr>
           <td>
             {{$tweet->tweet}}
           </td>
           <td>
             <a href="/tweets/{{$tweet->id}}/edit" class="btn"> Edit </button></a>
           </td>
           <td>
             <a href="/tweets/{{$tweet->id}}" class="btn"> View </button></a>
           </td>
           <td>
             <a href="/tweets/{{$tweet->id}}/delete" class="btn"> X </button></a>
           </td>
         </tr>
         @endforeach


        </tbody>
      </table>
    </div>

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

    #top {
      width: 90%;
      padding-left: 5%;
    }

    #bottom {
      width: 90%;
      padding-left: 5%;
    }

</style>
