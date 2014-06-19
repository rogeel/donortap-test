$( document ).ready(function() {
	var requestDonor;
	$('#list-donor .donor').click(function(e){
		getDonor($(this));
		e.preventDefault();
		var donor = $(this);
		
	})

	function getDonor(donor){

		var donorId = donor.attr('rel');
		donor.addClass('active');
		donor.siblings().removeClass('active');
		requestDonor = $.ajax({
		  url: baseurlDonor + '/' + donorId,
		  type: "GET"
		}); 

		requestDonor.done(function( msg ) {
		  $('#profile-donor .name').html('<span>' + msg.donor.firstname + " " + msg.donor.lastname + '</span>');
		  $('#profile-donor .location span').html( msg.donor.profile.location.location );
		  $('#profile-donor .politicalparty span').html(msg.donor.profile.politicalparty.politicalparty);
		  $('#profile-donor .phone span').html( msg.donor.phone );
		  $('#profile-donor .profession span').html( msg.donor.profile.profession.profession );

		 $('#numbers-donor .ask span').html( msg.donor.ask );
		 $('#numbers-donor .average span').html( msg.donor.average );
		 $('#numbers-donor .best span').html( msg.donor.max );
		 $('#numbers-donor .notifications-list').empty();
		 $.each( msg.contributions, function( key, value ) {
			  
			  var contenedor = $('<div class="notification">');
			  var title = $('<div class="notification-title text-success">');
			  title.html(value.candidate.firstname + ' ' + value.candidate.lastname);
			  contenedor.append(title);
			  var date = $('<div class="notification-ago">');
			  var now = new Date();
			  date.html(dateFormat(value.date, "fullDate"));
			  contenedor.append(date); 
			  var amount = $('<div class="notification-icon bg-success">');
			  amount.html('$'+ value.amount );
			  contenedor.append(amount);
			  $('#numbers-donor .notifications-list').append(contenedor);				
			});

		var href= $('a.notifications-link').attr('href')
		console.log(href);
		href = href + "/" +  msg.donor.id;
		$('a.notifications-link').attr('href' , href);

		if(msg.contributions.length==0){

			$('#numbers-donor .notifications-link').hide();
		} 

		
		  
		});
		 
		requestDonor.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	}

	var firstDonor = $('#list-donor .donor').eq(0);
	if(firstDonor.length>0){
		getDonor(firstDonor);
	}
	

	$('.fancybox').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		type: 'iframe',
		helpers : {
			media : {}
		}
	});
})
	