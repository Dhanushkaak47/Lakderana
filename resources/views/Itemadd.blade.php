<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Add</title>
</head>
<body>
@include('include.navbar') 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResSignUP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	
	<link rel="stylesheet" type="text/css" href="signupstyle/style.css">
</head>
<body>
<div class="container">
	<div class="">
		<div class="row justify-content-center">
            <div class="col-12 mt-5  ">
                <div class="card mt-5">
                    <div class="card-header">
                        
                        <h3> Liquor Item Add</h3>
                    </div>
                    <div class="card-body">
                    <form >
                        <div class="container">
                            <div class="row">
                                <div class="col-4 mt-3">
                                    <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="firstname" class="form-control" placeholder="First name" required>
                                    
                                    </div>
                                </div>
                                <div class="col-4 mt-3">
                                    <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                                    
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6 mt-3">
                                            <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" name="resadd1" class="form-control" placeholder="Res Address street 01" required>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-3">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" name="resadd2" class="form-control" placeholder="Res Address Street 02" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-4 mt-3">
                                            <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                           </div>
                                <select name="city" id="" class= "form-control" required>
                                    <option value="Customer">City</option>
                                    <option value="Customer"><b>Colombo</b></option>
                                    <option value="Gampaha"><b>Gampaha</b></option>
                                    <option value="Kalutara"><b>Kalutara</b></option>
                                    <option value="Kandy"><b>Kandy</b></option>
                                    <option value="Kurunagala"><b>Kurunagala</b></option>
                                    <option value="Galle"><b>Galle</b></option>
                                 </select>
                                          </div>
                                        </div>
                                        <div class="col-5 mt-3">
                                            <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" name="email" class="form-control" placeholder="Email" required>
                                            
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-4 mt-3">
                                                    <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone-square" aria-hidden="true"></i> </span>
                                                    </div>
                                                    <input type="text" name="contact" class="form-control" placeholder="Contact No" required>
                                                </div>
                                             </div>
                                        </div>
                                        
                                        
                                <div class="form-group">
                                    <input type="submit" value="ADD" class="btn float-right login_btn">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
	</div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>