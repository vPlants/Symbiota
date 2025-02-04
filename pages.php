<?php
//error_reporting(E_ALL);
include_once("config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?>vPlants - Related Links</title>
	<meta name='keywords' content='' />
	<?php
	include_once($SERVER_ROOT . '/includes/head.php');
	include_once($SERVER_ROOT . '/includes/googleanalytics.php');
	?>
</head>
<body>
	<?php
	$displayLeftMenu = true;
	include($SERVER_ROOT . '/includes/header.php');
	?>
        <!-- This is inner text! -->
        <div  id="innervplantstext">
            <h1>Page Sets</h1>

            <div style="margin:20px;">
            	<p>1. Search <a href="search.html">search.html</a></p>

				<p>2. Home <a href="index.html">index.html</a></p>


				<p>3. Plants <a href="plants/index.html">index.html</a><br />
				 <a href="plants/diversity.html">plants/diversity.html</a><br />
				 Glossary <a href="plants/glossary/index.html">plants/glossary/index.html</a></p>

				<p>4. Fungi <a href="fungi/index.html">fungi/index.html</a><br />
				 <a href="fungi/diversity.html">diversity.html</a></p>

				<p>5. Help FAQ <a href="help.html">help.html</a></p>

				<p>6. References <a href="biblio.html">biblio.html</a></p>

				<p>7. Links <a href="links.html">links.html</a></p>

				<p>8. About Us <a href="about.html">about.html</a></p>

				<p>9. Contact <a href="contact.html">contact.html</a><br />
				Feedback <a href="feedback.html">feedback.html</a></p>

				<p>10. Documents <a href="documents/index.html">documents/index.html</a></p>

				<p>11. Site Map <a href="sitemap.html">sitemap.html</a><br />
				Accessibility Statement <a href="">access.html</a></p>

				<p>Prototypes <a href="pr/species/index.html">pr/species/index.html</a></p>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>