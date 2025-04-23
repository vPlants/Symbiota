<?php
include_once('../../../config/symbini.php');
include_once($SERVER_ROOT.'/classes/LanguageAdmin.php');
if($LANG_TAG != 'en' && file_exists($SERVER_ROOT.'/content/lang/admin/langmanager.'.$LANG_TAG.'.php')) include_once($SERVER_ROOT.'/content/lang/admin/langmanager.'.$LANG_TAG.'.php');
else include_once($SERVER_ROOT.'/content/lang/admin/langmanager.en.php');
header("Content-Type: text/html; charset=".$CHARSET);

if(!$SYMB_UID) header('Location: '.$CLIENT_ROOT.'/profile/index.php?refurl=../content/lang/admin/langmanager.php?'.htmlspecialchars($_SERVER['QUERY_STRING'], ENT_QUOTES));

$action = array_key_exists('submitaction',$_REQUEST)?$_REQUEST['submitaction']:'';
$refUrl = array_key_exists('refurl',$_REQUEST)?$_REQUEST['refurl']:'';

$langManager = new LanguageAdmin();

$isEditor = 0;
if($SYMB_UID){
	if($IS_ADMIN){
		$isEditor = 1;
	}
}

?>
<!DOCTYPE html>
<html lang="<?php echo $LANG_TAG ?>">
	<head>
		<title><?php echo $LANG['LANG_VARIABLES_MANAGER']; ?></title>
		<?php
		include_once($SERVER_ROOT . '/includes/head.php');
		?>
	</head>
	<body>
		<?php
		$displayLeftMenu = false;
		include($SERVER_ROOT . '/includes/header.php');
		?>
		<div class="navpath">
			<a href="<?php echo htmlspecialchars($CLIENT_ROOT, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE); ?>/index.php"><?php echo $LANG['HOME']; ?></a> &gt;&gt;
			<b><?php echo $LANG['LANG_VARIABLES_MANAGE']; ?></b>
		</div>
		<!-- This is inner text! -->
		<div role="main" id="innertext">
			<h1 class="page-heading"><?php echo $LANG['LANG_VARIABLES_MANAGER']; ?></h1>
			<div style="margin:20px"><b><?php echo $LANG['SOURCE_PATH']; ?>:</b> <?php echo '<a href="' . htmlspecialchars($refUrl, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE) . '">' . htmlspecialchars($refUrl, ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE); ?></a></div>
			<div style="margin:20px">
				<table class="styledtable">
					<tr>
						<th><?php echo $LANG['VAR_CODE']; ?></th>
						<th>en</th>
						<?php
						$langArr = $langManager->getLanguageVariables($refUrl);
						$enArr = array();
						if(isset($langArr['en'])){
							$enArr = $langArr['en'];
							unset($langArr['en']);
							$otherCodes = array_keys($langArr);
							foreach($otherCodes as $code){
								echo '<th>'.$code.'</th>';
							}
						}
						?>
					</tr>
					<?php
					foreach($enArr as $varCode => $varValue){
						echo '<tr>';
						echo '<td>'.$varCode.'</td><td>'.$varValue.'</td>';
						foreach($otherCodes as $langCode){
							echo '<td>';
							if(isset($langArr[$langCode][$varCode])){
								echo $langArr[$langCode][$varCode];
							}
							else{
								echo '&nbsp;';
							}
							echo '</td>';
						}
						echo '</tr>';
					}
					?>
				</table>
			</div>
		</div>
		<?php
		include($SERVER_ROOT.'/includes/footer.php');
		?>
	</body>
</html>