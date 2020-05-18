@extends('admin.admin_layout')
@section('admin_content')

@section('title')
		Products Edit
	@endsection
<div class="box span12">
	@include('admin.message')
					<div class="box-header" data-original-title="">
						<h2><i class="halflings-icon edit"></i><span class="break"></span> Create Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					

					<div class="box-content">
						{!! Form::open(['url' => ['admin/products' , $product->id], 'files' => true , 'method' =>'put'] ) !!}
						
							  @include('admin.products.files')
							
							 
							  <div class="form-group">
  					   {!! Form::submit('Add',['class'=>'btn btn-primary']) !!}
							  </div>
						
						{!! Form::close() !!}
					</div>
				</div>
@endsection