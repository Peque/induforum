<?php

	session_start();

	// Check user logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: /en/login/');
		exit;
	}

	// Check permissions
	if (!isset($_SESSION['user_can_view_statistics']) || !$_SESSION['user_can_view_statistics']) {
		header('Location: /en/restricted_area/');
		exit;
	}

?>

<section id="content">
<header>
	<hgroup>
		<h1>Account settings</h1>
	</hgroup>
</header>
<article>
	<nav class="tabs_nav">
		<ul>
			<li><a href="/en/account_settings/session/">Session</a></li>
			<li><a href="/en/account_settings/password/">Password</a></li>
<?php
	if (isset($_SESSION['user_can_invite']) && $_SESSION['user_can_invite']) {
		echo '<li><a href="/en/account_settings/invite/">Invite</a></li>';
	}
	if (isset($_SESSION['user_can_share_permissions']) && $_SESSION['user_can_share_permissions']) {
		echo '<li><a href="/en/account_settings/permissions/">Permissions</a></li>';
	}
	if (isset($_SESSION['user_can_view_statistics']) && $_SESSION['user_can_view_statistics']) {
		echo '<li class="current">Statistics</li>';
	}
?>
		</ul>
	</nav>
	<div class="tabs_nav_div"></div>

	<p>Some statistics about the database:</p>

<?php

	require_once(strstr(getcwd(), '/build', 1).'/config.php');

	$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
	mysqli_set_charset($db, 'utf8');

	$query = "select user from students_personal_data";
	$result = mysqli_query($db, $query);

	echo "<ul><li>Number of students as for now: <strong>".mysqli_num_rows($result)."</strong></li></ul>";

	mysqli_free_result($result);
	mysqli_close($db);

?>

</article>
<footer>
	<p class="section_title">Account settings</p>
</footer>
</section>
