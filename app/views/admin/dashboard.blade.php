@include('admin.includes.main-nav')
@include('admin.includes.main-menu')

<div id="content-wrapper">
	<div class="page-header">
			
		<div class="row">
			<!-- Page header, center on small screens -->
			<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-dashboard page-header-icon"></i>&nbsp;&nbsp;Dashboard</h1>

			
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">

			<script>
				init.push(function () {
					var uploads_data = [

					@foreach($monthcontributions as $contribution)
					<?php $date = new DateTime($contribution->date); ?>
					{day:'{{$date->format('Y-m-d')}}', v:{{$contribution->amount}} },


					@endforeach
						
					];
					Morris.Line({
						element: 'hero-graph',
						data: uploads_data,
						xkey: 'day',
						ykeys: ['v'],
						labels: ['Value'],
						lineColors: ['#fff'],
						lineWidth: 2,
						pointSize: 4,
						gridLineColor: 'rgba(255,255,255,.5)',
						resize: true,
						gridTextColor: '#fff',
						xLabels: "day",
						xLabelFormat: function(d) {
							return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec'][d.getMonth()] + ' ' + d.getDate(); 
						},
					});
				});
			</script>
			<!-- / Javascript -->

			<div class="stat-panel">
				<div class="stat-row">
					<div class="stat-cell col-sm-4 padding-sm-hr bordered no-border-r valign-top">
							<h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-plus text-primary"></i>&nbsp;&nbsp;Contributions</h4>
							<ul class="list-group no-margin">
							@foreach($politicalpcontributions as $contribution)
								<li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius">
									{{$contribution->politicalparty}}<span class="label label-pa-success pull-right">{{$contribution->total}}</span>
								</li> 

							@endforeach
								
								
							</ul>
						</div>
					<div class="stat-cell col-sm-8 bg-primary padding-sm valign-middle">
						<div id="hero-graph" class="graph" style="height: 230px;"></div>
					</div>
				</div>
			</div> 	
		</div>

		<div class="col-md-4">
			<div class="row">
				<div class="col-sm-4 col-md-12">
					<div class="stat-panel">
						<!-- Danger background, vertically centered text -->
						<div class="stat-cell bg-success valign-middle">
							<!-- Stat panel bg icon -->
							<i class="fa fa-trophy bg-icon"></i>
							<!-- Extra large text -->
							<span class="text-xlg"><span class="text-lg text-slim">$</span><strong>{{$totalcontributions}}</strong></span><br>
							<!-- Big text -->
							<span class="text-bg">Total Contributions</span><br>
							<!-- Small text -->
							
						</div> 
					</div> 
				</div>	

				<div class="col-sm-4 col-md-12">
					<div class="stat-panel">
						<!-- Danger background, vertically centered text -->
						<div class="stat-cell bg-warning valign-middle">
							<!-- Stat panel bg icon -->
							<i class="fa  fa-star-half-o bg-icon"></i>
							<!-- Extra large text -->
							<span class="text-xlg"><span class="text-lg text-slim">$</span><strong>{{$totalpledges}}</strong></span><br>
							<!-- Big text -->
							<span class="text-bg">Total Pledges</span><br>
							<!-- Small text -->
							
						</div> 
					</div> 
				</div>	


			</div>
		</div>
	</div>
</div>



