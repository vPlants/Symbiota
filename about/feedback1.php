<?php
//error_reporting(E_ALL);
include_once("../config/symbini.php");
header("Content-Type: text/html; charset=".$CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Feedback1</title>
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
            <h1>Species Pages Feedback Form</h1>
			<div style="margin:20px;">
				<p class="small"><a href="/news/">See Species Pages</a>. Help us with development of this site by answering any of the following questions.
				Thanks!</p>

				<form name="Species Page Feedback Form"
					method="post"
					action="/cgi-bin/FormMail.pl">

				 <input type="hidden" name="recipient" value="ahipp@mortonarb.org">
				 <input type="hidden" name="email" value="speciespages@mortonarb.org">
				 <input type="hidden" name="subject" value="Species Page Feedback Form">
				 <input type="hidden" name="redirect" value="http://www.vplants.org/about/thanks.html">


				Do you find the overall website design easy to navigate?<br>
					<textarea name="navigation_ease" cols="60" rows="4"></textarea>

				<hr>
				Is the description information presented in a logical order and easy to read?
				<br>
					<textarea name="descrip_logical" cols="60" rows="4"></textarea>

				<hr>
				Is the description complete enough for a clear understanding of the species?
				<br>
					<textarea name="descrip_complete" cols="60" rows="4"></textarea>

				<hr>
				Do you have any problems understanding the text or terms used?<br>
				If yes, what specific information is confusing?
				<br>
					<textarea name="understanding_text" cols="60" rows="4"></textarea>

				<hr>
				Do the images effectively reinforce the text and vice versa?
				<br>
					<textarea name="images_value" cols="60" rows="4"></textarea>

				<hr>
				Do the species pages provide enough information?<br>
				If no, what else would you like to see on the species pages?
				<br>
					<textarea name="adequate_info" cols="60" rows="4"></textarea>

				<hr>
				Do the species pages provide too much information?<br>
				If yes, what would you eliminate?
				<br>
					<textarea name="too_much_info" cols="60" rows="4"></textarea>

				<hr>
				What do you think is the most useful information provided?
				<br>
					<textarea name="most_useful" cols="60" rows="4"></textarea>

				<hr>
				Do you think that you will use this site in the future?<br>
				If yes, in what context? For what types of information?<br>
				If no, why not?
				<br>
					<textarea name="future_usage" cols="60" rows="4"></textarea>

				<hr>
				How would you describe your botanical background or interests? i.e.
				beginner, amateur, avid gardener, mushroom hunter,
				student (please include grade), teacher (please include level),
				conservation scientist, preserve steward, etc.
				<br>
					<textarea name="who_are_you" cols="60" rows="4"></textarea>

				<hr>
				Any other comments or questions?
				<br>
					<textarea name="comments" cols="60" rows="4"></textarea>
						<br>
				If you have questions, please provide your e-mail address below.


				<hr>
				(Optional) What is your name and/or affiliation?
				<br>
					<textarea name="name_business" cols="60" rows="3"></textarea>

				<hr>
				(Optional) What is your e-mail address? <br>
				[Will be used only for replying to your comments or questions.]
				<br>
					<textarea name="e_mail" cols="60" rows="1"></textarea>

				 <hr>
				 <p align="center">
				  <input type="submit" name="Submit" value="Submit">
				  </p>
				</form>
            </div>
        </div>

	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>

</body>
</html>