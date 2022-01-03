<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lak Derana</title>
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.1/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/customer.css">
</head>
<body>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="card">
                <div class="col-md-12 text-center">
                    <img src="/SystemIMG/lakLogo.jpg" width="100%;" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="card">
                <div class="col-md-12 text-center">
                  <h1>Customer Inquiry</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="card">
                <div class="col-md-12 text-center">
                <form id="SubmitForm">   
                
                <div class="search">
                    <br>
                <input type="text" name="customer_name" id="customer_name" placeholder="Search Customer Name">   
                <input type="text" name="email" id="email" placeholder="Search Customer by E-mail">  
                <input type="text" name="id" id="id" placeholder="Search Customer by ID">
                
                <div class="button-src">
                    <button type="submit" id="submit_btn">Search Customer</button>
                </div>

                <div class="button-src" id="user_reg" style="display: none;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegisterModal">User Register</button>
             
                </div>
        
                </form>

                </div>
            </div>
        </div>
    </div>

  <!-- The Modal -->
<div class="modal" id="RegisterModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Registration</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form id="register_form">
  <div class="form-group">
    <label for="email">Customer name:</label>
    <input type="text" class="form-control" placeholder="Enter Customer Name" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="pwd">Mobile Number:</label>
    <input type="number" class="form-control" placeholder="Enter Mobile Number" name="phone" id="phone">
  </div>
  <div class="form-group">
    <label for="pwd">Address:</label>
    <input type="text" class="form-control" placeholder="Enter Address" name="address" id="address">
  </div>
  <div class="form-group">
    <label for="pwd">Gender:</label>
    <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="optradio" name="optradio" value="male" checked>Male
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="optradio" name="optradio" value="female">Female
      </label>
    </div>
  </div>
  <div class="form-group">
    <label for="pwd">NIC:</label>
    <input type="text" class="form-control" placeholder="Enter NIC Number" name="nic" id="nic">
  </div>
  <div class="form-group">
    <label for="mail">Email address:</label>
    <input type="text" class="form-control" placeholder="Enter Email Address" name="reg_email" id="reg_email">
  </div>
  <button type="submit" id="register_button" class="btn btn-primary">Submit</button>
</form>
      </div>
    </div>
  </div>
</div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="card"  style="width: 100%;">
                <div class="col-md-12 text-center">
                <table style="width: 100%;"  class="table table-dark table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Customer ID</th>
                        <th>Customer  Name</th>
                        <th>Customer Mobile Number</th>
                        <th>Customer Email</th>
                        <th>Customer Address</th>
                        <th>Gender</th>
                        <th>NIC</th>
                        <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody id="tBody"></tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
       

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

$('#register_form').on('submit',function(e){
    e.preventDefault();

 
    let customer_name = $('#name').val();
    let mobile = $('#phone').val();
    let email = $('#reg_email').val();
    let gender = $('#optradio').val();
    let address = $('#address').val();
    let nic = $('#nic').val();
    
  
   if (customer_name=='') {
   
       Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Customer Name Cannot be Empty',
            footer: ''
            })
   }
   if (mobile=='') {
      
       Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Mobile Number Cannot be Empty',
        footer: ''
        })
   }
   if (email=='') {
     
       Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Email Cannot be Empty',
        footer: ''
        })
   }
   if (nic=='') {
   
   Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Customer NIC Cannot be Empty',
        footer: ''
        })
}
if (address=='') {
  
   Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Customer Address Cannot be Empty',
    footer: ''
    })
}
if (gender=='') {
 
   Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Gender Cannot be Empty',
    footer: ''
    })
}

    if (customer_name && mobile && email && gender && address && nic) {  
   
    $.ajax({
      url: "/customer_registration",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        customer_name:customer_name,
        mobile:mobile,
        email:email,
        gender:gender,
        address:address,
        nic:nic
      
      },
      success:function(resp){
          console.log(resp);
          if (resp['success']) {
              let user_id=resp['success'];
            Swal.fire(
            '',
            'Customer Successfully Registered!.User Id :'+user_id,
            'success'
            )  
            setTimeout(location.reload.bind(location), 4000);      
          }
         else {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'This user already registered in this system!',
            footer: ''
            })
            setTimeout(location.reload.bind(location), 2000);    
          }
  
    
      },
    
     
      });
    }
    });

$('#SubmitForm').on('submit',function(e){
    e.preventDefault();

    let customer = $('#id').val();
    let customer_name = $('#customer_name').val();
    let email = $('#email').val();
   
  
    
    $.ajax({
      url: "/customer",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        customer:customer,
        customer_name:customer_name,
        email:email
      
      },
      success:function(resp){
        $('#successMsg').show();
        console.log(resp);
        console.log(resp['success']);
        var trHTML = '';
        if (resp['success']) {
            $("#tBody").empty();
            
            $.each(resp, function (i, userData) {
                            console.log(resp);
                            
                                trHTML +=
                                    '<tr><td>'
                                    +resp['success']['id']
                                    + '</td><td>'
                                    +resp['success']['cus_id']
                                    + '</td><td>'
                                    + resp['success']['cus_full_name']
                                    + '</td><td>'
                                    + resp['success']['mobile']
                                    + '</td><td>'
                                    + resp['success']['email']
                                    + '</td><td>'
                                    + resp['success']['address']
                                    + '</td><td>'
                                    + resp['success']['gender']
                                    + '</td><td>'
                                    + resp['success']['nic']
                                    + '</td><td>'
                                    +  Date(resp['success']['created_at'])
                                    + '</td></tr>';
                            
                        });
                    }
                    else{
                        document.getElementById("user_reg").style.display = "block";
                        $("#tBody").empty();
                        trHTML +=
                                    '<tr><td colspan=6>Sorry no data found'
                                   
                                    + '</td></tr>';
                    }       
            $('#tBody').append(trHTML);
           
        

      },
    
     
      });
    });
  </script>
</html>