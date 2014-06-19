<div class="list-group">
	@foreach($donors as $lead)
		<a href="#" class="list-group-item donor" rel="{{$lead->id}}">
			<div class="row">
				<div class="col-md-2 col-xs-4">
					<span class="avg">${{{$lead->ask}}}</span>
				</div>
				<div class="col-md-6 col-xs-8">
					<h3 class="list-group-item-heading">{{{$lead->firstname}}} {{{$lead->lastname}}}</h3>
					<p class="list-group-item-text">{{$lead->location}}</p>
					<p class="list-group-item-text">{{$lead->politicalparty}}</p>
					
					
				</div>

				<div class="col-md-4 col-xs-12">
					<span class="last-contact">
					{{round(abs(strtotime(date('Y:m:d h:m:s'))-strtotime($lead->updated_at))/86400)}} days since last contact
					</span>
					
				</div>
			</div>
		</a>	    
	@endforeach
				
</div>

{{$donors->links()}}

<script type="text/javascript">
var baseurlDonor = "{{URL::route('dashboard/donor')}}";
</script>