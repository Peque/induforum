<?php

	session_start();

	$_SESSION = array();
	session_destroy();

?>

<section id="content">
<header>
	<hgroup>
		<h1>Logged out</h1>
	</hgroup>
</header>
<article>
	<header>
		<hgroup>
			<h1 id="Acess_form">Your session has been closed</h1>
		</hgroup>
		<hr />
	</header>
	<p class="centered extra_margin"><img src="/images/marx-brothers.jpg" alt="happy_face.svg" /></p>
	<p>See you soon!</p>
</article>
<footer>
	<p class="section_title">Logged out</p>
</footer>

</section>
