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
                <input type="text" name="customer" id="customer" placeholder="Search Customer by ID">
                <div class="button-src">
                    <button type="submit">Search Customer</button>
                </div>
                </div>
                </form>

                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="card"  style="width: 100%;">
                <div class="col-md-12 text-center">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                        <th>Customer ID</th>
                        <th>Customer First Name</th>
                        <th>Customer Last Name</th>
                        <th>Customer Mobile Number</th>
                        <th>Customer Email</th>
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

$('#SubmitForm').on('submit',function(e){
    e.preventDefault();

    let customer = $('#customer').val();
    console.log(customer);
  
    
    $.ajax({
      url: "/customer",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        customer:customer
      
      },
      success:function(resp){
        $('#successMsg').show();
        console.log(resp);
        var trHTML = '';
                        $.each(resp, function (i, userData) {
                            console.log(resp['success']['created_at']);
                            
                                trHTML +=
                                    '<tr><td>'
                                    +resp['success']['cus_id']
                                    + '</td><td>'
                                    + resp['success']['first_name']
                                    + '</td><td>'

                                    + resp['success']['last_name']
                                    + '</td><td>'
                                    + resp['success']['mobile']
                                    + '</td><td>'
                                    + resp['success']['email']
                                    + '</td><td>'
                                    + resp['success']['created_at']
                                    + '</td></tr>';
                            
                        });
                        $('#tBody').append(trHTML);

      },
     
      });
    });
  </script>
</html>