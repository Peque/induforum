<?php

	session_start();

	$_SESSION = array();
	session_destroy();

?>

<section id="content">
<header>
	<hgroup>
		<h1>Desconectado</h1>
	</hgroup>
</header>
<article>
	<header>
		<hgroup>
			<h1 id="Acess_form">Se ha cerrado tu sesión</h1>
		</hgroup>
		<hr />
	</header>
	<p class="centered extra_margin"><img src="/images/marx-brothers.jpg" alt="happy_face.svg" /></p>
	<p>¡Hasta pronto!</p>
</article>
<footer>
	<p class="section_title">Desconectado</p>
</footer>

</section>
