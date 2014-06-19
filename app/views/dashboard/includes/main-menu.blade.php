<div id="main-menu" role="navigation">
		<div id="main-menu-inner">
			<div class="menu-content top" id="menu-content">
				<!-- Menu custom content demo
					 CSS:        styles/pixel-admin-less/demo.less or styles/pixel-admin-scss/_demo.scss
					 Javascript: html/assets/demo/demo.js
				 -->
				<div>  
					<div class="text-bg"><span class="text-bold">{{{$user->firstname}}} {{{$user->lastname}}}</span></div>
				</div>
			</div>
			<ul class="navigation">
				<li>
					<a href="#"><i class="menu-icon fa  fa-bullseye"></i><span class="mm-text">SMART RAISE</span></a>
				</li>
				<li class="mm-dropdown active open">
					<a href="#"><i class="menu-icon fa fa-tasks"></i><span class="mm-text">FUNDRAISE</span></a>
					<ul>
						<li class="{{{ Request::segment(2)=='leads'? 'active' : '' }}}">
							<a tabindex="-1" href="{{URL::route('dashboard/leads')}}"><i class="menu-icon fa  fa-phone"></i><span class="mm-text">LEADS</span></a>
						</li>
						<li class="{{{ Request::segment(2)=='pledges'? 'active' : '' }}}">
							<a tabindex="-1" href="{{URL::route('dashboard/pledges')}}"><i class="menu-icon fa fa-usd"></i><span class="mm-text">PLEDGES</span></a>
						</li>
						<li class="{{{ Request::segment(2)=='donormatch'? 'active' : '' }}}">
							<a tabindex="-1" href="{{URL::route('dashboard/donormatch')}}"><i class="menu-icon fa fa-users"></i><span class="mm-text">DONOR MATCH</span></a>
						</li>
						
						
					</ul>
				</li>

				<li>
					<a href="#"><i class="menu-icon fa  fa-sort-amount-desc"></i><span class="mm-text">MANAGE LIST</span></a>
				</li>
				
				
				

				
			</ul> <!-- / .navigation -->
			
		</div> <!-- / #main-menu-inner -->
	</div>

	<div id="main-menu-bg"></div>