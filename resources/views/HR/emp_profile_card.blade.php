<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 30%;
      margin: auto;
      text-align: center;
      font-family: arial;
    }

    .title {
      color: grey;
      font-size: 18px;
    }

    button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    a {
      text-decoration: none;
      font-size: 22px;
      color: black;
    }

    button:hover, a:hover {
      opacity: 0.7;
    }
</style>
</head>
<body>

  @foreach($employee as $datas)
      <div class="card">
        <hr>
        <h2 style="text-align: center; margin-top:10px;">Lak Derana Hotel Group</h2><hr>
        {{-- <img src="/w3images/team2.jpg" alt="John" style="width:100%"> --}}
        <img src="{{asset('empPictures/'.(($datas->emp_pic)))}}" style="max-width:100%; height:100%;" alt=""> 
        <h1>{{$datas->First_name}} {{$datas->Last_name}}</h1>
        <p class="title">{{$datas->departmentName}}</p>
        <p>{{$datas->rolename}}</p>
        <div style="margin: 24px 0;">
          
        </div>
        <p><button>Contact</button></p>
      </div>
  @endforeach
</body>
</html>
