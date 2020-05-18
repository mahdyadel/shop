@extends('admin.admin_layout')
@section('admin_content')

	@section('title')
		Dashboard
	@endsection
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

		
						
		

			<div class="row-fluid">	

				<a href="{{ url('admin/users') }}" class="quick-button metro yellow span2">
					<i class="icon-group"></i>

					<p>Users {{ $user->count() }}</p>
				</a>
				
				<a href="{{ url('admin/products') }}" class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Products{{ $product->count() }}</p>

				</a>
				<a href="{{ url('admin/orders') }}" class="quick-button metro green span2">
					<i class="icon-envelope"></i>
					<p>Orders{{ $order->count() }}</p>


				</a>
				<a class="quick-button metro pink span2">
					<i class="icon-envelope"></i>
					<p>Messages</p>
					<span class="badge">88</span>
				</a>
				<a class="quick-button metro black span2">
					<i class="icon-calendar"></i>
					<p>Calendar</p>
				</a>
				<a class="quick-button metro red span2">
					<i class="icon-comments-alt"></i>
					<p>Comments</p>
					<span class="badge">46</span>
				</a>
				<div class="clearfix"></div>
								
			</div><!--/row-->
			
       

@endsection