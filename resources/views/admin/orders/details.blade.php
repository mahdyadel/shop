@extends('admin.admin_layout')
@section('admin_content')

	@section('title')
		Orders Details
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
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>ID</th>
									  <th>Date</th>
									  <th>Quantity</th>
									  <th>Price</th>
									  <th>Address</th>                                          
									  <th>status</th>                                          
									  <th>Actions</th>                                          


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
									<td>
										@if($order->status)
										{{ link_to_route('order.pending' , 'Pending' , $order->id , ['class' => 'btn btn-warning btn-sm'])}}
										@else
										{{ link_to_route('order.confirm' , 'Confirm' , $order->id , ['class' => 'btn btn-success btn-sm'])}}
										@endif
										

									</td>
								</tr>

								
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
						 <a href="{{ url('admin/orders') }}" class="btn btn-success">Back Order</a>
			

@endsection