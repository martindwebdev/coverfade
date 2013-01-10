<!DOCTYPE html>
<html lang="en">
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">

/* background plugin */
(function ($) {
	$.background = function (images, speed) {
			
		// if speed has not been set or is not a number	
		if(speed == undefined || isNaN(speed))
			speed = 2000;
			
		// prepare container div for background images		
		var html = '<div class="bg">';
				
		// loop over each image
		for (var i=0; i<images.length; i++)
		{
			// add a div with background set to image
			html += '<div style="background-image:url(' + images[i] + ')"></div>';
		}
		
		html += '</div>';
				
		// add new div containing background images to the immediately after opening <body> tag
		$('body').prepend(html);
		
		$('.bg div').hide();
		$('.bg div:eq(0)').show();
		
		$total = $('.bg').find('div').size();
		
		var $i  = 0;
			
		setInterval(function () {
	
			$('.bg').find(':eq(' + $i + ')').fadeOut('slow');
	
			if($i == $total - 1)
				$i = 0
			else
				$i++;
				
			$('.bg').find(':eq(' + $i + ')').fadeIn('slow');
	
		}, speed);
		
	}
	
})(jQuery);
	
$(document).ready(function () {

	$.background(['Penguins.jpg', 'Desert.jpg', 'Chrysanthemum.jpg', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Koala.jpg', 'Lighthouse.jpg', 'Penguins.jpg', 'Tulips.jpg'], 5000);
		
});
</script>
<style>
	* {
		margin:0;
		padding:0;
	}
	html, body {
		margin:0;
		padding:0;
		height:100%;
		width:100%;
		font-family:Arial, Helvetica, sans-serif
	}
	.bg {
		height:100%;
		width:100%;
		position:absolute;
		z-index:-999;
	}
	.bg div {
		height:100%;
		width:100%;
		position:absolute;
		z-index:-999;
		background-repeat:no-repeat;
		background-position:center;
		background-attachment:fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
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