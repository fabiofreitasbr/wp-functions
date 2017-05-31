<?php 
function boxBackTop() {
	?>
	<a href="#inicio" class="scroll-home"> 
		<div class="back-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></div> 
	</a>
	<script type="text/javascript">
	$(document).ready(function() {
		var doc = $("html, body");
		$(".scroll-home").on("click", function() {
		    var topo = $( $.attr(this, "href") ).offset().top;
		    doc.animate({
		        scrollTop: topo - 170
		    }, 800);
		    return false;
		});
	});
	</script>
	<?php
}