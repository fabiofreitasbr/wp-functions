<?php 
/*
?>

    <footer>
		<div class="info-footer-detail">
			<div class="container">
				<div class="col-md-6">
					<h3 class="title-margin">Assine o informativo da SBPC/ML</h3>
					<p>Fique por dentro dos eventos e novidades da área da saúde.</p>
					<form action="">
							<input type="text" name="name" class="input-detail" placeholder="Nome">
							<input type="email" name="email" class="input-detail" placeholder="E-mail">
							<button type="submit" class="button-detail">Enviar</button>
					</form>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-7">
							<address>
								<p><strong>Sociedade Brasileira de Patologia Clínica / Medicina Laboratorial</strong></p>
								<p>Rua Dois de Dezembro, 78 sala 909 - Catete Rio de Janeiro - RJ - CEP: 22220-040<br />Telefones: (21) 3077-1400 e 0800 02315756</p>
							</address>
						</div>
						<div class="col-md-5">
							<p class="text-center">Filiado à</p>
							<img src="<?php bloginfo('template_url'); ?>/images/logo-amb.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-widget-list">
			<div class="container rodape-links">
				<div class="col-md-2">
					<nav>
						<div class="title-footer-widget">Institucional</div>
						<ul>
							<li>Missão</li>
							<li>História</li>
							<li>Diretoria</li>
							<li>Estatuto</li>
							<li>Expediente</li>
							<li>O que é Patologia Clínica</li>
							<li>Patologistas Clínicos</li>
							<li>Associe-se</li>
							<li>Fale Conosco</li>
							<li>Museu Evaldo Melo</li>
						</ul>
					</nav>
				</div>
				<div class="col-md-2">
					<nav>
						<div class="title-footer-widget">Profissional</div>
						<ul>
							<li>Publicações Técnicas</li>
							<li>Legislação & Consultas</li>
							<li>Públicas</li>
						</ul>
					</nav>
					<nav>
						<div class="title-footer-widget">Especialização & Residência</div>
						<ul>
							<li>TEPAC</li>
							<li>Residência</li>
						</ul>
					</nav>
				</div>
				<div class="col-md-2">
					<nav>
						<div class="title-footer-widget">Cursos & Eventos</div>
						<ul>
							<li>Agenda Anual</li>
							<li>Congresso Atual</li>
							<li>Congressos Anteriores</li>
							<li>Eventos em Destaque</li>
							<li>Ensino a Distância</li>
						</ul>
					</nav>
				</div>
				<div class="col-md-2">
					<nav>
						<div class="title-footer-widget">Notícias & Comunicação</div>
						<ul>
							<li>Notícias Gerais</li>
							<li>Notícias do Setor</li>
							<li>Sala de Imprensa</li>
							<li>JBPML</li>
							<li>Revista Notícias</li>
							<li>Medicina Laboratorial</li>
							<li>Links Interessantes</li>
							<li>Twitter</li>
							<li>Flick-r</li>
							<li>Facebook</li>
							<li>Youtube</li>
						</ul>
					</nav>
				</div>
				<div class="col-md-2">
					<nav>
						<div class="title-footer-widget">Produtos & Serviços</div>
						<ul>
							<li>Biblioteca Digital</li>
							<li>JBPML</li>
							<li>Informativo SBPC/ML</li>
							<li>Classificados</li>
							<li>Lab Tests Online BR</li>
							<li>PALC</li>
							<li>Ensino a Distância</li>
							<li>Aluguel de auditório</li>
						</ul>
					</nav>
				</div>
				<div class="col-md-2">
					<nav>
						<div class="title-footer-widget">Produtos & Serviços</div>
						<ul>
							<li>PALC</li>
							<li>Laboratórios</li>
							<li>Acreditados</li>
							<li>Indicadores </li>
							<li>Laboratoriais</li>
							<li>Ensaio de Proficiência</li>
							<li>Trio da Qualidade</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="container rodape-bottom">
				<div class="rodape-copyright">© 2011 - SBPC/ML. Todos os direitos reservados.</div>
				<div class="rodape-developer">Desenvolvido por <img src="<?php bloginfo('template_url'); ?>/images/logo-campana.png" alt=""></div>
			</div>
		</div>
    </footer>
*/
?>
	<footer>
		<div class="info-footer-detail">
			<div class="container">
				<div class="col-md-6 col-sm-6 form-info">
					<h3 class="title-margin">Assine o informativo da SBPC/ML</h3>
					<p>Fique por dentro dos eventos e novidades da área da saúde.</p>
					<form action="">
						<input type="text" name="name" class="input-detail" placeholder="Nome">
						<input type="email" name="email" class="input-detail" placeholder="E-mail">
						<button type="submit" class="button-detail">Enviar</button>
					</form>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="row">
						<div class="col-md-7">
							<address>
								<p><strong>Sociedade Brasileira de Patologia Clínica / Medicina Laboratorial</strong></p>
								<p>Rua Dois de Dezembro, 78 sala 909 - Catete Rio de Janeiro - RJ - CEP: 22220-040<br />Telefones: (21) 3077-1400 e 0800 02315756</p>
							</address>
						</div>
						<div class="col-md-5 adress-fil">
							<p class="text-center">Filiado à</p>
							<img src="<?php bloginfo('template_url'); ?>/images/logo-amb.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-widget-list">
			<div class="container rodape-links">
				<?php
				for($ftr = 1; $ftr <= 6; $ftr++) {
					?>
						<div class="col-md-4 col-lg-2 col-sm-4 col-xs-4">
							<?php dynamic_sidebar('widget-rodape-' . $ftr); ?>
						</div>
					<?php 
				}
				?>
			</div>
			<div class="container rodape-bottom">
				<div class="rodape-copyright">© 2011 - SBPC/ML. Todos os direitos reservados.</div>
				<div class="rodape-developer">Desenvolvido por <img src="<?php bloginfo('template_url'); ?>/images/logo-campana.png" alt=""></div>
			</div>
		</div>
    </footer>
<?php wp_footer(); ?>
</div>
</body>
</html>