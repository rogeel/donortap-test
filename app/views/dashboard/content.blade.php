@include('dashboard.includes.main-nav')
@include('dashboard.includes.main-menu')

<div id="content-wrapper">
	
		<div class="page-header">
			<div class="row">
				<div class="col-md-3">
					<form name="displaby" class="form-inline inline-block">
						<label>Display by</label>
					    <select name="menu" class="form-control" onChange="window.document.location.href=this.options[this.selectedIndex].value;" >
					        <option value="{{URL::route('dashboard/leads')}}" {{{ Request::segment(2)=='leads'? 'selected="selected' : '' }}}>Leads</option>
					        <option value="{{URL::route('dashboard/pledges')}}" {{{ Request::segment(2)=='pledges'? 'selected="selected' : '' }}}>Pledges</option>
					        <option value="{{URL::route('dashboard/donormatch')}}" {{{ Request::segment(2)=='donormatch'? 'selected="selected' : '' }}}>Donor Match</option>
					    </select>
					</form>
				</div>
				<div class="col-md-3">
					<a href="callto://+5723310090">Call the Skype Echo / Sound Test Service</a>
				</div>
			</div>
		</div>
	
	<div class="row">
		<div class="col-md-6" id="list-donor">
			@include('dashboard.includes.donors')
		</div>

		<div id="profile-donor" class="col-md-3 ">
			@include('dashboard.includes.profile-donor')
		</div>

		<div id ="numbers-donor" class="col-md-3 ">
			@include('dashboard.includes.numbers-donor')
		</div>
	</div>
</div>	




