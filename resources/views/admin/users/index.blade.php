@extends('admin.admin_layout')
@section('admin_content')

	@section('title')
		Users
	@endsection
	<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-group"></i><span class="break"></span>Users</h2>
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
									  <th>Email</th>
									  <th>Register At</th>                                          
									  <th>Actions</th>                                          


								  </tr>
							  </thead>   
							  <tbody>
								
								
								
								<tr>
									@foreach($users as $user)
									<td>{{$user->id}}</td>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->created_at->diffForHumans()}}</td>

									<td>{{ link_to_route('user.details' , 'Details' , $user->id , ['class' => 'btn btn-success btn-sm']) }}</td>

									
								</tr>

									@endforeach
								</tr>                                   
							  </tbody>
						 </table>  
						
					</div>
				</div><!--/span-->
			</div><!--/row-->

@endsection