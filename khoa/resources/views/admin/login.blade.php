<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Khoa Pham</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/')}}resources/assets/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('/')}}resources/assets/admin/css/shop-homepage.css" rel="stylesheet">
    <link href="{{asset('/')}}resources/assets/admin/css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
      <div class="col-md-4">
         @if(count($errors)>0)
                @foreach($errors->all() as $errors)
                    <p>{{$errors}}</p>
                @endforeach
         @endif
         @if(isset($loi))
                <p> {{$loi}} </p>
          @endif
        </div>
    	<div class="row carousel-holder">
        
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
				    	<form action="{{route('postlogin')}}" method="POST">
              <input type="hidden" name="_token" value = "{{csrf_token()}}">
							<div>
				    			<label>Email</label>
							  	<input type="text" class="form-control" placeholder="username" name="username" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

 
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="{{asset('/')}}resources/assets/admin/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('/')}}resources/assets/admin/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}resources/assets/admin/js/my.js"></script>

</body>

</html>

