<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>SlideGallery</title>
		<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/reveal.js/2.3/css/reveal.min.css" />
		<style>
			body{ background-color:black; }
		</style>
		<script src="//cdnjs.cloudflare.com/ajax/libs/headjs/0.99/head.min.js"></script>
		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="reveal">
			<div class="slides">
<?php
				if ($handle = opendir('images')) {
					while (false !== ($entry = readdir($handle))) {
						if ($entry !== "." && $entry !== "..") {
							echo "\t\t\t\t<section><img src='images/$entry' /></section>\n";
						}
					}
					closedir($handle);
				}
?>
			</div>
		</div>
		<script>
			head.js("//cdnjs.cloudflare.com/ajax/libs/reveal.js/2.3/js/reveal.js", function(){
				Reveal.initialize({
					loop : true,
					transition : 'linear', // default/cube/page/concave/zoom/linear/fade/none
				});
			});
		</script>
	</body>
</html>
