@extends('admin.admin_layout')
@section('admin_content')
@include('admin.message')

	@section('title')
		Products
	@endsection
	<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-shopping-cart"></i><span class="break"></span>Products</h2>
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
									  <th>Name</th>
									  <th>Price</th>
									  <th>Description</th>                                          
									  <th>Image</th>                                          
									  <th>Actions</th>                                          


								  </tr>
							  </thead>   
							  <tbody>
								
									@foreach($products as $product)
									<tr>
										<td>{{ $product->id }}</td>
										<td>{{ $product->name }}</td>
										<td>{{ $product->price }}</td>
										<td>{{ $product->description }}</td>
										<td>
											<img src="{{url('uploads').'/'. $product->image }}" alt="{{ $product->image }}" style="width: 100px;height: 100px" class="img-thumnail">
										</td>
										<td>
									{!! Form::open(['route' => ['products.destroy' , $product->id] , 'method' => 'Delete']) !!}

									{!! Form::button('<span class="halflings-icon white trash"></span>' , [ 'type' => 'submit' , 'class' => 'btn btn-danger btn-sm' , 'onclick' => 'return confirm("are you sure you want delete this?")']) !!}

										<a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm"><span class="halflings-icon white plus"></span></a>

		{{ link_to_route('products.edit' , 'Edit' , $product->id  , ['class' => 'btn btn-info btn-sm ti-pencil']) }}
		{{ link_to_route('products.show' , 'Details' , $product->id  , ['class' => 'btn btn-primary btn-sm ti-list']) }}
									
											{!! Form::close() !!}


										</td>


									</tr>

									@endforeach
							  </tbody>
						 </table>  
						
					</div>
				</div><!--/span-->
			</div><!--/row-->

@endsection