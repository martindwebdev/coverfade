/* coverfade plugin */
(function ($) {
	
	$.coverfade = function (images, speed) {

		// if speed has not been set or is not a number	
		if(speed == undefined || isNaN(speed))
			speed = 2000;
			
		// prepare container div for background images		
		var html = '<div class="coverfade">';
				
		// loop over each image
		for (var i=0; i<images.length; i++)
		{
			// add a div with background set to image
			html += '<div style="background-image:url(' + images[i] + ')"></div>';
		}
		
		html += '</div>';
				
		// add new div containing background images to the immediately after opening <body> tag
		$('body').prepend(html);
		
		$('.coverfade div').hide();
		$('.coverfade div:eq(0)').show();
		
		// change css of new elements
		$('html, body').css({
			'margin' : '0',
			'padding' : '0',
			'height' : '100%',
			'width' : '100%'
		});
		
		$('.coverfade, .coverfade div').css({
			'margin' : '0',
			'padding' : '0',
			'height' : '100%',
			'width' : '100%',
			'position' : 'absolute',
			'z-index' : '-999'
		});
		
		$('.coverfade div').css({
			'background-repeat' : 'no-repeat',
			'background-position' : 'center',
			'background-attachment' : 'fixed',
			'-webkit-background-size' : 'cover',
			'-moz-background-size' : 'cover',
			'-o-background-size' : 'cover',
			'background-size' : 'cover'
		});
		
		// get total number of div children in div.coverfade
		$total = $('.coverfade').find('div').size();
		
		var $i  = 0;
		
		// every x seconds, change the cover background image to the next image in the array
		setInterval(function () {
	
			// get current background image div and fade it out
			$('.coverfade').find(':eq(' + $i + ')').fadeOut('slow');
	
			// if have reached the end of the background image divs
			if($i == $total - 1)
				$i = 0 // reset pointer (move to first image)
			else
				$i++; // increment pointer by 1 (move to next image)
				
			// get next background image div and fade it in
			$('.coverfade').find(':eq(' + $i + ')').fadeIn('slow');
	
		}, speed);
		
	}	
})(jQuery);