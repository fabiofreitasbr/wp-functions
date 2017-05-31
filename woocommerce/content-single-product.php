<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php // do_action( 'woocommerce_before_single_product_summary' ); ?>

	<div class="summary entry-summary">

		<?php /* do_action( 'woocommerce_single_product_summary' ); */ ?>

	</div>

	<?php // do_action( 'woocommerce_after_single_product_summary' ); ?>
	<div class="row">
		<div class="title-product col-md-12">
					<h2><?php echo the_title('<h2>', '</h2>'); ?></h2>
					<div class="location">
						<?php 
						$endereco = get_field("endereco");
						?>
						<p><?php echo $endereco['address']; ?></p>
						<span><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;<a href="#mapping" class="anchor-sliding">ver o mapa</a></span>
					</div>
					<div class="title-rating">
						<span><strong>AVALIAÇÃO: </strong></span>
					</div>
					<div class="rating-box">
						<fieldset class="rating">
						    <input type="radio" id="star5" name="rating" value="5" />
						    <label class = "full" for="star5" title="Awesome - 5 stars"></label>
						    <input type="radio" id="star4half" name="rating" value="4 and a half" />
						    <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
						    <input type="radio" id="star4" name="rating" value="4" />
						    <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
						    <input type="radio" id="star3half" name="rating" value="3 and a half" />
						    <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
						    <input type="radio" id="star3" name="rating" value="3" />
						    <label class = "full" for="star3" title="Meh - 3 stars"></label>
						    <input type="radio" id="star2half" name="rating" value="2 and a half" />
						    <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
						    <input type="radio" id="star2" name="rating" value="2" />
						    <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
						    <input type="radio" id="star1half" name="rating" value="1 and a half" />
						    <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
						    <input type="radio" id="star1" name="rating" value="1" />
						    <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
						    <input type="radio" id="starhalf" name="rating" value="half" />
						    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
						</fieldset>
						<p>&nbsp; - &nbsp;Avalie</p>
					</div>
					<div class="title-share">
						<span><strong>Compartilhe: </strong></span>
					</div>
					<div class="icons-share">
						<div class="addthis_inline_share_toolbox"></div>
					</div>
		</div>
		<div class="col-md-9 image-dest">
			<?php wooGallery(); ?>
		</div>
		<!-- Formulário pedido -->
		<div class="post-int col-md-3">
			<div class="box-pedido">
				<div class="form-pedido form-inline">
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-3 col-xs-6 box-inp">
							<label for="dataIda">Entrada</label>
							<input type="text" name="dataIda" id="enterInput" placeholder="dd/mm/aaaa">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-3 col-xs-6 box-inp">
							<label for="dataIda">Saída</label>
							<input type="text" name="dataVolta" id="lostInput" placeholder="dd/mm/aaaa">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-2 col-xs-6 box-inp">
							<label for="dataIda">Adultos</label>
							<select name="numero-adulto">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-2 col-xs-6 box-inp">
							<label for="dataIda">Crianças</label>
							<select name="numero-crianca">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-2 col-xs-12 box-inp">
							<input type="submit" value="Solicitar orçamento" class="hidden-sm hidden-xs">
							<input type="submit" value="Solicitar" class="hidden-md hidden-lg">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 box-inp">
							<p>Crianças até 8 anos</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="content-text col-md-9">
			<article>
				<?php the_content(); ?>
			</article>
			<!-- Lopp Descrição-->
			<!-- Lopp Tela Normal -->
			<?php 
			$detalhes = array(
				array('titulo' => 'Acomodações', 'slug' => 'acomodacoes', 'icon' => '<div class="icon-travel travel-5x travel-svg-22"></div>'),
				array('titulo' => 'O que está incluído?', 'slug' => 'incluso', 'icon' => '<div class="icon-travel travel-5x travel-svg-12"></div>'),
				array('titulo' => 'Recreação', 'slug' => 'recreacao', 'icon' => '<div class="icon-travel travel-5x travel-svg-38"></div>'),
				array('titulo' => 'Estrutura de Lazer', 'slug' => 'estrutura_lazer', 'icon' => '<div class="icon-travel travel-5x travel-svg-42"></div>'),
				array('titulo' => 'Crianças e Família', 'slug' => 'criancas_familia', 'icon' => '<div class="icon-travel travel-5x travel-svg-13"></div>'),
			);
			?>
			<div class="content-tabs hidden-sm hidden-xs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<?php 
					$active = ' class="active"';
					foreach ($detalhes as $detalheAtual) {
						$detalheSlug = $detalheAtual['slug'];
					?>
					<li role="presentation"<?php echo $active; ?>>
						<a href="#<?php echo $detalheSlug; ?>" aria-controls="<?php echo $detalheSlug; ?>" role="tab" data-toggle="tab">
							<?php echo $detalheAtual['icon']; ?>
							&nbsp;&nbsp;<?php echo $detalheAtual['titulo']; ?>
						</a>
					</li>
					<?php 
					    $active = '';
					}
				    ?>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<?php
					$active = 'active';
					foreach ($detalhes as $detalheAtual) {
						$detalheSlug = $detalheAtual['slug'];
					    ?>
						<div role="tabpanel" class="tab-pane <?php echo $active; ?>" id="<?php echo $detalheSlug; ?>">
							<?php echo get_field($detalheSlug); ?>
						</div>
					    <?php 
					    $active = '';
					}
				    ?>
				</div>
			</div>
			<!-- Lopp Mobile -->
			<div class="content-acord panel-group hidden-lg hidden-md" id="accordion" role="tablist" aria-multiselectable="true">
			    <?php 
				foreach ($detalhes as $detalheAtual) {
					$detalheSlug = $detalheAtual['slug'];
				    ?>
				    <section class="panel panel-hotel">
				        <div class="panel-heading" role="tab" id="headingOne">
				            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#colapseOne" aria-expanded="false" aria-controls="colapseOne">
				                <h4 class="panel-title">
				                    <?php echo $detalheAtual['titulo']; ?>
				                </h4>
				            </a>
				        </div>
				        <div id="colapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				            <div class="panel-body">
				            	<?php echo get_field($detalheSlug); ?>
				            </div>
				        </div>
				    </section>
				    <?php 
				}
			    ?>
			</div>
			<section class="box-coment">
				<h3>Localização</h3>
				<iframe id="mapping" style="border: 0;" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyBxWb1KuXb_zRPspIhDtShkzFwFVifI3RE&center=<?php echo $endereco['lat']; ?>,<?php echo $endereco['lng']; ?>&zoom=15&maptype=roadmap" width="100%" height="350" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
			</section>
			<!-- Comentários -->
			<section class="box-coment">
				<h3>COMENTÁRIOS <small><?php comments_number( 'Nenhum Comentário', 'Apenas 1 comentário', '% comentários' ); ?></small></h3>
				<?php wooComment(); ?>
			</section>
			<!-- Formulário Comentário -->
			<?php wooCommentForm(); ?>
		</div>
		<aside class="col-md-3 col-sm-12" style="margin-top: 30px;">
			<div class="row">
				<div class="all-boxes">
					<article class="col-lg-12 col-md-12 col-sm-6 box">
						<a href="" class="all-container">
							<div class="pacotes">
								<div class="text-pacote">
									<h3>Promoções</h3>
								</div>
								<div class="bg-img" style="background-image: url('http://placehold.it/360x300');"></div>
							</div>
						</a>
					</article>
					<article class="col-lg-12 col-md-12 col-sm-6 box">
						<a href="" class="all-container">
							<div class="pacotes">
								<div class="text-pacote">
									<h3>Depoimentos</h3>
								</div>
								<div class="bg-img" style="background-image: url('http://placehold.it/360x300');"></div>
							</div>
						</a>
					</article>
				</div>
			</div>
		</aside>
	</div>
	<div class="row">
		<div class="col-md-12 box-title">
			<h2 class="title-destaque">Ofertas Relacionadas</h2>
		</div>
	</div>
	<div class="row">
		<div class="all-boxes">
			<article class="col-lg-4 col-md-4 col-sm-6 box">
				<a href="" class="all-container">
					<div class="pacotes">
						<div class="text-pacote">
							<span>Pacote</span>
							<h3>Caminho dos Vinhos</h3>
						</div>
						<div class="bg-img" style="background-image: url('http://placehold.it/360x300');"></div>
					</div>
				</a>
			</article>
			<article class="col-lg-4 col-md-4 col-sm-6 box">
				<a href="" class="all-container">
					<div class="pacotes">
						<div class="text-pacote">
							<span>Pacote</span>	
							<h3>Orlando</h3>
						</div>
						<div class="bg-img" style="background-image: url('http://placehold.it/360x300');"></div>
					</div>
				</a>
			</article>
			<article class="col-lg-4 col-md-4 col-sm-6 box">
				<a href="" class="all-container">
					<div class="pacotes">
						<div class="text-pacote">
							<span>Pacote</span>	
							<h3>Beto Carrero</h3>
						</div>
						<div class="bg-img" style="background-image: url('http://placehold.it/360x300');"></div>
					</div>
				</a>
			</article>
		</div>
	</div>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5898baa38ce733a3"></script> 
	<script type="text/javascript">
		$( document ).ready(function( $ ) {
			$( '#example3' ).sliderPro({
				width: 960,
				height: 500,
				orientation: 'vertical',
				loop: false,
				arrows: true,
				buttons: false,
				thumbnailsPosition: 'right',
				thumbnailPointer: true,
				thumbnailWidth: 100,
				autoplay: false,
				breakpoints: {
					800: {
						orientation: 'horizontal',
						thumbnailsPosition: 'bottom',
						thumbnailWidth: 100,
						thumbnailHeight: 100
					},
					500: {
						orientation: 'horizontal',
						thumbnailsPosition: 'bottom',
						thumbnailWidth: 50,
						thumbnailHeight: 50
					}
				}
			});
		});
	</script>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
