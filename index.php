<!DOCTYPE html>
<html lang="en">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">

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
	
$(document).ready(function () {

	$.background(['/img/Penguins.jpg', '/img/Desert.jpg', '/img/Chrysanthemum.jpg', '/img/Hydrangeas.jpg', '/img/Jellyfish.jpg', '/img/Koala.jpg', '/img/Lighthouse.jpg', '/img/Penguins.jpg', '/img/Tulips.jpg'], 5000);
		
});
</script>
<style>
	body {
		font-family:Arial, Helvetica, sans-serif
	}
	.container {
		margin:0 auto;
		width:60%;
		background-color:#fff;
		opacity:0.8;
		z-index:1;
		padding:5%;
		color:#333;
	}			
</style>
</head>
<body>
    <div class="container">
    	<h1>This is my new website!</h1>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis sem libero, id congue nisl. Vivamus ac sapien sed nulla consectetur aliquam eu ultricies lorem. Quisque et sem enim. Quisque lacinia libero at ligula consectetur a viverra magna gravida. Aenean suscipit accumsan erat. Nullam eget libero augue. Vestibulum pellentesque dolor vitae risus lobortis non condimentum purus accumsan. Suspendisse congue nunc eget tortor ornare molestie ac ac dui.</p>

		<p>In orci nunc, interdum quis placerat nec, posuere condimentum lorem. Vestibulum sit amet congue libero. Ut ornare nibh lectus, ut semper eros. Cras hendrerit, quam sed cursus mattis, sem risus congue leo, nec luctus est augue et est. Quisque posuere, tortor sed rhoncus ultricies, orci arcu mollis massa, vitae pretium orci lorem quis erat. Proin gravida purus a ligula tempus a facilisis lacus tristique. Ut imperdiet condimentum nisi vitae iaculis. Fusce nunc neque, accumsan quis vulputate in, feugiat non lacus. </p>
    </div>
</body>
</html>