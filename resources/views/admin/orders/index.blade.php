@extends('admin.admin_layout')
@section('admin_content')

	@section('title')
		Orders
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
									  <th>User</th>
									  <th>Product</th>
									  <th>Quantity</th>                                          
									  <th>Address</th>                                          
									  <th>status</th>                                          
									  <th>Actions</th>                                          


								  </tr>
							  </thead>   
							  <tbody>
								
								
								
								<tr>
									@foreach($orders as $order)
									<td>{{$order->id}}</td>
									<td>

										<?php if(empty($order->user->name)) { 
                                               echo "ddd";
                                            } else{
                                             	echo $order->user->name ;

										}
                                       ?>

									</td>
									<td>
										@foreach($order->products as $pro)
										{{ $pro->name }}
										@endforeach
									</td>
									<td>
										@foreach($order->orderItems as $item)
										{{ $item->quantity }}
										@endforeach
									</td>
									<td>{{$order->address}}</td>

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
												{{ link_to_route('orders.show' , 'Details' , $order->id  , ['class' => 'btn btn-primary btn-sm ti-list']) }}

										
										

									</td>
								</tr>

									@endforeach
								</tr>                                   
							  </tbody>
						 </table>  
						
					</div>
				</div><!--/span-->
			</div><!--/row-->

@endsection