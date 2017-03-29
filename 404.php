<?php 
get_header();
?>
<main class="container center-content">
    <h1 class="title-header">PÁGINA NÃO ENCONTRADA</h1>
    <h2>A PÁGINA QUE VOCÊ ESTAVA PROCURANDO NÃO FOI ENCONTRADA</h2>
    <p>Verifique se o endereço que digitou ou pesquisou está correto.</p>
    <p>Verifique no site se o link que clicou foi alterado ou excluído.</p>
    <p>Entre na página inicial e para ver os links.</p>
    <p>Pesquise no campo abaixo o que estava procurando.</p>
    <a href="<?php bloginfo('home'); ?>"><button class="btn btn-primary">IR PARA PÁGINA INICIAL</button></a>
    <p>OU</p>
    <form action="<?php bloginfo('home'); ?>" method="GET" class="form-inline ">
        <input type="text" name="s" value="" placeholder="PESQUISAR" class="form-control">
        <button type="submit" class="btn btn-success">PESQUISAR</button>
    </form>
</main>
<?php
get_footer();
?>