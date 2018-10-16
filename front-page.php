<?php 
get_header();
?>
<header class="p-3 px-md-4 mb-3 navbar navbar-dark bg-dark border-bottom shadow-sm">
	<div class="container d-flex flex-column flex-md-row align-items-center ">
		<h5 class="my-0 mr-md-auto font-weight-normal navbar-brand">WP Functions</h5>
		<nav class="my-2 my-md-0 mr-md-3">
			<a class="p-2 navbar-brand" href="#">Início</a>
			<a class="p-2 navbar-brand" href="#">Documentação</a>
			<a class="p-2 navbar-brand" href="#">Suporte</a>
		</nav>
		<a class="btn btn-outline-primary" href="#">Contratar</a>
	</div>
</header>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4">WP Functions</h1>
	<p class="lead">O maior pacote de funções para criadores de tema em WordPress.</p>
</div>

<div class="container">
	<div class="card-deck mb-3 text-center">
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Padrão</h4>
			</div>
			<div class="card-body">
				<h1 class="card-title pricing-card-title">Grátis</h1>
				<ul class="list-unstyled mt-3 mb-4">
					<li>Versão Tema</li>
					<li>Atualizações Constantes</li>
					<li>Email support</li>
					<li>Help center access</li>
				</ul>
				<button type="button" class="btn btn-lg btn-block btn-outline-primary">Download</button>
			</div>
		</div>
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Pro</h4>
			</div>
			<div class="card-body">
				<h1 class="card-title pricing-card-title">R$ 49,00</h1>
				<ul class="list-unstyled mt-3 mb-4">
					<li>20 users included</li>
					<li>10 GB of storage</li>
					<li>Priority email support</li>
					<li>Help center access</li>
				</ul>
				<button type="button" class="btn btn-lg btn-block btn-primary">Contratar</button>
			</div>
		</div>
		<div class="card mb-4 shadow-sm">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Completo</h4>
			</div>
			<div class="card-body">
				<h1 class="card-title pricing-card-title">R$ 29,00<small class="text-muted">/mês</small></h1>
				<ul class="list-unstyled mt-3 mb-4">
					<li>30 users included</li>
					<li>15 GB of storage</li>
					<li>Phone and email support</li>
					<li>Help center access</li>
				</ul>
				<button type="button" class="btn btn-lg btn-block btn-primary">Contratar</button>
			</div>
		</div>
	</div>

	<footer class="pt-4 my-md-5 pt-md-2 border-top">
		<div class="row">
			<div class="col-12 col-md text-center">
				<img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
				<small class="d-block mb-3 text-muted">&copy; WP Functions - Todos os direitos reservados</small>
			</div>
		</div>
	</footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
	Holder.addTheme('thumb', {
		bg: '#55595c',
		fg: '#eceeef',
		text: 'Thumbnail'
	});
</script>
<?php
get_footer();
?>