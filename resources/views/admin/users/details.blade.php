@extends('admin.admin_layout')
@section('admin_content')

	@section('title')
		Users
	@endsection
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
																					{{ $orders[0]->user->name }}

						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>Order ID</th>
									  <th>Product Name</th>
									  <th>Address</th>
									  <th>Quantity</th>
									  <th>Total Price</th>                                          
									  <th>Order Date</th>                                          
									  <th>Status</th>                                          


								  </tr>
							  </thead>   
							  <tbody>
							  	<tr>
							  	@foreach($orders as $order)
							  	<td>{{ $order->id }}</td>
							  	<td>{{ $order->products[0]->name }}</td>
							  	<td>{{ $order->address }}</td>
							  	<td>{{ $order->orderItems[0]->quantity }}</td>
							  	<td>{{ $order->orderItems[0]->price }}</td>
							  	<td>{{ $order->date }}</td>
							  	<td>
							  		@if($order->status)
							  		<span class="label label-success">Confirmed</span>
							  		@else
							  		<span class="label label-warning">Pending</span>

							  		@endif
							  	</td>
							  	

							  	@endforeach
							  	</tr>
								                               
							  </tbody>
						 </table>  
						
					</div>
				</div><!--/span-->
			</div><!--/row-->
			
						 <a href="{{ url('admin/users') }}" class="btn btn-success">Back Order</a>
			

@endsection