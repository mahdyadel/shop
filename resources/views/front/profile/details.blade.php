<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
    	@section('title')
    	Sign Up
    	@endsection
    </title>
    <link href="{{ url('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ url('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ url('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ url('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{ url('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{ url('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{asset('frontend/images/home/logo.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							 <li><a href="{{ url('user/profile') }}"><i class="fa fa-user"></i> {{auth()->check()? auth()->user()->name:'Account'}}</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
 								@if(! auth()->check())
                                <li><a href="{{ url('user/login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                @else
                                <li><a href="{{ url('user/logout') }}"><i class="fa fa-lock"></i>Logout</a></li>
                                @endif							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header><!--/header-->
					
		<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Orders</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>ID</th>
									  <th>Date</th>
									  <th>Quantity</th>
									  <th>Price</th>
									  <th>Address</th>                                          
									  <th>status</th>                                          


								  </tr>
							  </thead>   
							  <tbody>
								
								
								
								<tr>
									<td>{{ $order->id }}</td>
									<td>{{ $order->date }}</td>
									<td>{{ $order->orderItems[0]->quantity }}</td>
									<td>{{ $order->orderItems[0]->price }}</td>
									<td>{{ $order->address}}</td>
									


									<td>
										@if($order->status)
										<span class="label label-success">Confirmed</span>
										@else
										<span class="label label-warning">Pending</span>
										@endif
									</td>
									

								
								</tr>                                   
							  </tbody>
						 </table>  
						
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<div class="row-fluid sortable ui-sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>User Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
								  	<td>ID</td>
								  	<td>{{$order->user->id}}</td>
								  </tr>
								  <tr>
								  	<td>UserName</td>
								  	<td>{{$order->user->name}}</td>
								  </tr>
								  <tr>
								  	<td>Email</td>
								  	<td>{{$order->user->email}}</td>
								  </tr>
								    <tr>
								  	<td>Register At</td>
								  	<td>{{$order->user->created_at->diffForHumans()}}</td>
								  </tr>
							  </thead>   
							  <tbody>
								
								
								                            
							  </tbody>
						 </table>  
						  
					</div>
				</div><!--/span-->
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Product Details </h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped">
							  <thead>
								  <tr>
								  	<td>ID</td>
								  	<td>{{$order->products[0]->id}}</td>
								  </tr>
								   <tr>
								  	<td>Name</td>
								  	<td>{{$order->products[0]->name}}</td>
								  </tr>
								   <tr>
								  	<td>Price</td>
								  	<td>{{$order->products[0]->price}}</td>
								  </tr>
								   <tr>
								  	<td>Image</td>
								  	<td>
								  		<a href="{{ url('uploads/',$order->products[0]->image) }}" target="_blank"><img src="{{ url('uploads/',$order->products[0]->image) }}" alt="{{ $order->products[0]->image }}" class="img-thumbnail" style="width:100px;height:100px"></a>
								  	</td>
								  </tr>
							
								           
							  </thead>   
							  <tbody>
								                   
							  </tbody>
						 </table>  

					</div>
				</div><!--/span-->
			</div>
						 <a href="{{ url('user/profile') }}" class="btn btn-success">Back Profile</a>
  
    <script src="{{ url('frontend/js/jquery.js')}}"></script>
	<script src="{{ url('frontend/js/price-range.js')}}"></script>
    <script src="{{ url('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ url('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ url('frontend/js/main.js')}}"></script>
</body>
</html>