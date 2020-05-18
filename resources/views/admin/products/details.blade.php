@extends('admin.admin_layout')
@section('admin_content')
@include('admin.message')

	@section('title')
		Products Details
	@endsection
	<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-shopping-cart"></i><span class="break"></span>Products Details</h2>
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
									  <td>{{ $product->id }}</td>
									</tr>
									<tr>
									  <th>Name</th>
									  <td>{{ $product->name }}</td>
									  </tr>
									  	<tr>
									  <th>Price</th>
									  <td>{{ $product->price }}</td>
									  	</tr>
									  		<tr>
									  <th>Description</th>
									  <td>{{ $product->description }}</td>
									  	</tr>
									  	<tr>
									  <th>Createed At</th>
									  <td>{{ $product->created_at->diffForHumans() }}</td>
									  	</tr>
									  		<tr>
									  <th>Updated At</th>
									  <td>{{ $product->updated_at->diffForHumans() }}</td>
									  	</tr>
									  	<tr>
									  <th>Image</th>
									  <td><img src="{{ url('uploads').'/'.$product->image }}" alt="img-thumbnail" style="width: :100px;height: 100px"></td>
									  	</tr>


							  </thead>  

							 
						 </table>  
						 <a href="{{ url('admin/products') }}" class="btn btn-info">Back Products</a>

						
					</div>
				</div><!--/span-->
			</div><!--/row-->

@endsection