<aside class="col-lg-3 col-md-3">
	<div class="title-content">
		<h3 class="text-uppercase">Notícias</h3>
	</div>
	<?php dynamic_sidebar('blog-widget'); ?>
</aside>

<style>
	.listagem ul{
		list-style:none;
		-webkit-padding-start: 20px;	
	}

	.listagem ul li{
		margin-bottom: 5px;
	}

	.listagem ul li:before{
		position: absolute;
		left: 30px;
		content: "\f105";
		height: 30px;
		font-size: 30px !important;
		display: inline-block;
	    font: normal normal normal 14px/1 FontAwesome;
	    font-size: inherit;
	    text-rendering: auto;
	    -webkit-font-smoothing: antialiased;
	}

	.listagem ul li a{
		font-size: 16px;
	    font-family: 'Open Sans', sans-serif;
	    color: #4f1111;
	    line-height: 25px;
	    font-weight: 300;
	}
</style>