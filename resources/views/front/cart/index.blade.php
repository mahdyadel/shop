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
	<meta name="csrf-token" content="{{ csrf_token() }}">

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
		
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{url('/')}}"><img src="{{asset('frontend/images/home/logo.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
							
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header><!--/header-->
				<h2 class="mt-5"><i class="fa fa-shopping-cart"></i>Shopping Cart</h2>
				<hr>
				@if(Cart::instance('default')->count() > 0)
				<h4 class="mt-5">{{ Cart::instance('default')->count() }} items(s) in Shopping Cart</h4>
				<div class="cart-items">
					<div class="row">
						<div class="col-md-12">
							@if(session()->has('msg'))
								<div class="alert alert-success">{{ session()->get('msg') }}</div>

							@endif

							@if(session()->has('errors'))
								<div class="alert alert-warning">{{ session()->get('errors') }}</div>

							@endif

			<table class="table">
				<tbody>
					@foreach(Cart::instance('default')->content() as $item)
					<tr>
				    	<td>
			     	    	<img src="{{ url('/uploads').'/'.$item->model->image }}" style="width:100px;height:100px">
						</td>
						<td>
	     					<strong>{{ $item->model->name }}</strong><br> {{ $item->model->description }}
						</td>
						<td>
							<form action="{{ route('cart.destroy' , $item->rowId) }}" method="post">
								@csrf
								@method('delete')
		     				<button class="btn btn-danger"  type="submit">Remove</button>
		     				</form>

		     				<form action="{{ route('cart.saveLater' , $item->rowId) }}" method="post">
		     					@csrf
							<button type="submit"  class="btn btn-primary" >saveForLater	</button>
							</form>

						</td>
						<td>
					<select name="" id="" class="form-control quantity" style="" data-id="{{ $item->rowId }}">
							   <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
							   <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
							   <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
							   <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
							   <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>

							 

							</select>

						</td>
						<td>${{ $item->total() }}</td>
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>

					<!-- price Dtails -->
					<div class="col-md-6">
						<div class="sub-total">
							<table class="table table-borderd table-hover">
								<thead>
									<tr>
										<th colspan="2">Price Details</th>

									</tr>
								</thead>
								<tr>
									<td>Sub Total</td>
									<td>${{ Cart::subtotal() }}</td>

								</tr>
								<tr>
									<td>Tax</td>
									<td>${{ Cart::tax() }}</td>

								</tr>
								<tr>
									<td>Total</td>
									<td>${{Cart::total()}}</td>

								</tr>
							</table>
						</div>
					</div>
					<!-- Save For Later -->
					<div class="col-md-12">
						<a href="/" class="btn btn-warning">Continue Sopping</a>
						<a href="/checkout" class="btn btn-info">Procerd to Check</a> 
						<hr>

					</div>
					@else
					<h3 class="alert alert-danger">There Is Not Item In Your Cart</h3>
						<a href="/" class="btn btn-warning">Continue Sopping</a>

					<hr>

					@endif


					@if(Cart::instance('saveForLater')->count() > 0 )

					<div class="col-md-12">
						<h4>{{ Cart::instance('saveForLater')->count() }}items Save For Later</h4>
						<table class="table">
							
							<tbody>	@foreach(Cart::instance('saveForLater')->content() as $item)
					<tr>
				    	<td>
			     	    	<img src="{{ url('/uploads').'/'.$item->model->image }}" style="width:100px;height:100px">
						</td>
						<td>
	     					<strong>{{ $item->model->name }}</strong><br> {{ $item->model->description }}
						</td>
						<td>
							<form action="{{ route('cart.destroy' , $item->rowId) }}" method="post">
								@csrf
								@method('delete')
		     				<button class="btn btn-danger" type="submit">Remove</button>
		     				</form>

		     				<form action="{{ route('cart.movecart' , $item->rowId) }}" method="post">
		     					@csrf
							<button type="submit" class="btn btn-primary">Move to cart	</button>
							</form>

						</td>
						<td>
							<select name="" id="" class="form-control" style="">
							   <option value="">1</option>
							   <option value="">2</option>
							</select>

						</td>
						<td>${{ $item->total() }}</td>
					</tr>

					@endforeach
							</tbody>
						</table>
					</div>
					@endif
					</div>
				</div>
	
  
    <script src="{{ url('frontend/js/jquery.js')}}"></script>
	<script src="{{ url('frontend/js/price-range.js')}}"></script>
    <script src="{{ url('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ url('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ url('frontend/js/main.js')}}"></script>
    @section('script')
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
    	
        const className = document.querySelectorAll('.quantity');

        Array.from(className).forEach(function (el) {
            el.addEventListener('change', function () {
                const id = el.getAttribute('data-id');
                axios.patch(`/cart/update/${id}`, {
                    quantity: this.value
                })
                    .then(function (response) {
//                        console.log(response);
                          location.reload();
                    })

                    .catch(function (error) {
                        console.log(error);
                        location.reload();
                    });
            });
        });
    </script>
    @endsction

</body>
</html>