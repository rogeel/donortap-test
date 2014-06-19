@include('admin.includes.main-nav')
@include('admin.includes.main-menu')

<div id="content-wrapper">
	<div class="page-header">
			
		<div class="row">
			<!-- Page header, center on small screens -->
			<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-users page-header-icon"></i>&nbsp;&nbsp;Donors</h1>

			
		</div>
	</div>

	
	<div class="panel">
		<div class="panel-heading">
			<span class="panel-title">Donors</span>
			<a href="{{URL::route('admin/newdonor')}}" class="fancybox"><button class="btn btn-success pull-right">New Donor</button></a>
			<br>
			<br>
		</div>
		<div class="panel-body">
			<div class="row">
				
				<div class="col-sm-12">
					<!-- Success table -->
					<div class="table-success">
						<div class="table-header">
							<div class="table-caption">
								
							</div>
						</div>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Location</th>
									<th>Political Party</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							@foreach($donors as $donor)
								<tr>
									<td><a href="#{{$donor->id}}"><i class="fa fa-eye"></i></a></td>
									<td>{{$donor->firstname}}</td>
									<td>{{$donor->lastname}}</td>
									<td>{{$donor->email}}</td>
									<td>{{$donor->profile->location->location}}</td>
									<td>{{$donor->profile->politicalparty->politicalparty}}</td>
									<td><button class="btn btn-primary">Edit</button>&nbsp;<button class="btn btn-danger">Delete</button></td>
								</tr>
							@endforeach
								
							</tbody>
						</table>
						<div class="table-footer">
							{{$donors->links()}}
						</div>
					</div>
					<!-- / Success table -->
				</div>

			</div>

		</div>
	</div>

</div>



