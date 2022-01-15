<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" style="font-size: xx-large;" href="/">Lak Derana Liqour Bar <i class="fa fa-glass" aria-hidden="true"></i></a>
        <img src="img/logo.png" style="width: 5%;" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="text-uppercase justify-content-end collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
           
            <li class="nav-item">
              <a class="nav-link " href="/bardashboard">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/"data-toggle="modal" data-target="#order">New order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/supplier">Supplier Manage</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/CatAdd">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/barsale">Sales Items</a>
            </li>

            <li class="nav-item dropdown active">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                      </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
           
            <li class="nav-item">
              <a class="nav-link " href="/" data-toggle="modal" data-target="#supplier">New supplier</a>
            </li>
           
           </title>
           </ul>
        </div>
      </nav>
</head>
<body>
    <!-- Modal -->
<div class="modal fade" id="supplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header text-light">
        <h3 class="modal-title" id="exampleModalLabel">Add New Supplier</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/Addsuppliers" method="post">
      @csrf
            @foreach($errors->all() as $error)
               <div class="alert alert-danger" role="alert">
                  {{$error}}
               </div>
            @endforeach
            @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
      <div class="modal-body">
      <div class="form-group font-weight-bold text-warning">
                    <label for="name">First Name</label>
                    <input type="text" name="firstname" value="" class="form-control" id="name" aria-describedby="name" placeholder="First Name">
                </div>
                <div class="form-group font-weight-bold text-warning">
                    <label for="name">Last Name</label>
                    <input type="text" name="lastname" value="" class="form-control" id="name" aria-describedby="name" placeholder="Last Name">
                </div>
                <div class="form-group font-weight-bold text-warning">
                    <label for="name">Contact No</label>
                    <input type="text" name="contactno" value="" class="form-control" id="name" aria-describedby="name" placeholder="Contact No">
                </div>
                <div class="form-group font-weight-bold text-warning">
                    <label for="name">Email</label>
                    <input type="text" name="email" value="" class="form-control" id="name" aria-describedby="name" placeholder="Email">
                </div>

                <div class="form-group font-weight-bold text-warning">
                    <label for="exampleInputEmail1">Company Name</label>
                    <input type="text" name="company" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company Name">
                </div>
                
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>
                                </div>   
      </form>
  <!-- Modal -->
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header text-light">
        <h3 class="modal-title" id="exampleModalLabel">Add New Order</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/addorder" method="post">
        @csrf
      <div class="modal-body">
                <div class="form-group font-weight-bold text-warning">
                    <label for="name">Order ID</label>
                    <input type="text" name="orderid" value="" class="form-control" id="name" aria-describedby="name" placeholder="First Name">
                </div>
                
                <div class="form-group font-weight-bold text-warning">
                    <label for="name">Supplier Name</label>
                    <select name="supname" class="form-control">
                      <option value="">select</option>
                      @foreach($data as $datas)
                      <option value="{{$datas->id}}">{{$datas->firstname}}</option>
                      @endforeach
                    </select>
                </div>
                
                <div class="form-group font-weight-bold text-warning">
                    <label for="name">Order Date</label>
                    <input type="Date" name="orderdate" value="" class="form-control" id="name" aria-describedby="name" placeholder="Last Name">
                </div>
               
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
                                </div>   

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>