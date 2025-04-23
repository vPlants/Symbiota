<?php
include_once('../../config/symbini.php');
include_once($SERVER_ROOT.'/classes/WordCloud.php');
if($LANG_TAG != 'en' && file_exists($SERVER_ROOT.'/content/lang/collections/specprocessor/specprocessor_tools.' . $LANG_TAG . '.php')) include_once($SERVER_ROOT.'/content/lang/collections/specprocessor/specprocessor_tools.' . $LANG_TAG . '.php');
else include_once($SERVER_ROOT . '/content/lang/collections/specprocessor/specprocessor_tools.en.php');

header("Content-Type: text/html; charset=".$CHARSET);

$collidStr = array_key_exists('collidstr',$_REQUEST)?$_REQUEST['collidstr']:false;
$csMode = array_key_exists('csmode',$_REQUEST)?$_REQUEST['csmode']:false;

?>
<!DOCTYPE html>
<html lang="<?php echo $LANG_TAG ?>">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $CHARSET;?>">
		<title><?php echo $DEFAULT_TITLE . ' - ' . $LANG['WORD_CLOUD_HANDLER'] ?></title>
		<?php

		include_once($SERVER_ROOT.'/includes/head.php');
		?>
		<script type="text/javascript">
		</script>
		<style type="text/css">
			.url-div{ margin-bottom: 5px; }
		</style>
	</head>
	<body>
		<!-- This is inner text! -->
		<div role="main" id="innertext">
			<h1 class="page-heading"><?php echo $LANG['WORD_CLOUD_HANDLER']; ?></h1>
			<?php
			$cloudHandler = new WordCloud();
			$cloudHandler->setWidth(800);
			if(is_numeric($collidStr)){
				$collidArr = explode(',',$collidStr);
				foreach($collidArr as $collid){
					$url = $cloudHandler->buildWordCloud($collid,$csMode);
					echo '<div class="url-div"><a href="' . htmlspecialchars($url, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE) . '" target="_blank">' . htmlspecialchars($url, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE).'</a></div>';
				}
			}
			else echo '<div>' . $LANG['NO_COLLID'] . '</div>';
			?>
		</div>
	</body>
</html>