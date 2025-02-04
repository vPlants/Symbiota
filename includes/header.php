<?php
//if($LANG_TAG == 'en' || !file_exists($SERVER_ROOT.'/content/lang/header.'.$LANG_TAG.'.php')) include_once($SERVER_ROOT.'/content/lang/header.en.php');
//else include_once($SERVER_ROOT.'/content/lang/header.'.$LANG_TAG.'.php');
?>
<div class="header-wrapper">
	<header>
		<!-- <div style="height:110px;background-image:url(<?php //echo $CLIENT_ROOT; ?>/images/layout/defaultheader.jpg);background-repeat:no-repeat;position:relative;"> -->
		<div id="sitehead"><a id="pagetop" name="pagetop"></a>
			<div id="logo" style="float:left;"><img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/img/logo.gif" alt="vPlants.org Home."></div>
			<div id="partners">
				<ul>
					<li><a href="<?php echo $CLIENT_ROOT; ?>/about/partner_mor.php" title="Read about this partner.">The Morton Arboretum</a></li>
					<li><a href="<?php echo $CLIENT_ROOT; ?>/about/partner_f.php" title="Read about this partner.">The Field Museum</a></li>
					<li><a href="<?php echo $CLIENT_ROOT; ?>/about/partner_chic.php" title="Read about this partner.">Chicago Botanic Garden</a></li>
					<li><a href="<?php echo $CLIENT_ROOT; ?>/about/partner_other.php" title="Read about other partners.">Additional Partners</a></li>
				</ul>
			</div>
			<div style="float:right;margin-right:15px;margin-top:10px;">
				<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40tt.jpg" style="width:40px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Thalictrum thalictroides">
				<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40hm.jpg" style="width:27px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Hibiscus moscheutos">
				<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40ug.jpg" style="width:40px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Uvularia grandiflora">
				<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40cp.jpg" style="width:26px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Cirsium pitcheri">
				<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40ac.jpg" style="width:40px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Agaricus campestris">
			</div>
		</div><!-- End of #sitehead -->
		<div id="top_navbar">
			<div id="right_navbarlinks">
				<?php
				if($USER_DISPLAY_NAME){
					?>
					<span style="">
						Welcome <?php echo $USER_DISPLAY_NAME; ?>!
					</span>
					<span style="margin-left:8px;">
						<a href="<?php echo $CLIENT_ROOT; ?>/profile/viewprofile.php">My Profile</a>
					</span>
					<span style="margin-left:8px;">
						<a href="<?php echo $CLIENT_ROOT; ?>/profile/index.php?submit=logout">Logout</a>
					</span>
					<?php
				}
				else{
					?>
					<span style="">
						<a href="<?php echo $CLIENT_ROOT."/profile/index.php?refurl=".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']; ?>">
							Log In
						</a>
					</span>
					<span style="margin-left:8px;">
						<a href="<?php echo $CLIENT_ROOT; ?>/profile/newprofile.php">
							New Account
						</a>
					</span>
					<?php
				}
				?>
				<span style="margin-left:8px;margin-right:8px;">
					<a href='<?php echo $CLIENT_ROOT; ?>/sitemap.php'>Sitemap</a>
				</span>

			</div>
			<ul id="hor_dropdown">
				<li>
					<a href="<?php echo $CLIENT_ROOT; ?>/index.php" >Home</a>
				</li>
				<li>
					<a href="<?php echo $CLIENT_ROOT; ?>/collections/index.php" >Search Collections</a>
				</li>
				<li>
					<a href="<?php echo $CLIENT_ROOT; ?>/collections/map/mapinterface.php" target="_blank">Map Search</a>
				</li>
				<li>
					<a href="<?php echo $CLIENT_ROOT; ?>/imagelib/index.php" >Browse Images</a>
				</li>
				<li>
					<a href="<?php echo $CLIENT_ROOT; ?>/projects/index.php?" >Inventories</a>
					<ul>
						<li><a href="<?php echo $CLIENT_ROOT; ?>/checklists/checklist.php?cl=4892">Aquatic Invasive Plant Guide</a></li>
						<li>
							<a href="<?php echo $CLIENT_ROOT; ?>/checklists/checklist.php?cl=3516&pid=93" >Naturalized flora of The Morton Arboretum</a>
						</li>
						<li>
							<a href="<?php echo $CLIENT_ROOT; ?>/checklists/checklist.php?cl=3503&pid=93" >vPlants Checklist</a>
						</li>
						<li>
							<a href="<?php echo $CLIENT_ROOT; ?>/projects/index.php?proj=93" >Chicago Region Checklists and Inventories</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#" >Interactive Tools</a>
					<ul>
						<li>
							<a href="<?php echo $CLIENT_ROOT; ?>/ident/key.php?cl=3503&proj=91&taxon=All+Species" >vPlants Dynamic Key</a>
						</li>
						<li>
							<a href="<?php echo $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=checklist" >Dynamic Checklist</a>
						</li>
						<li>
							<a href="<?php echo $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=key" >Dynamic Key</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</header>
</div>
<?php
if(isset($displayLeftMenu) && $displayLeftMenu){
	?>
	<table id="innertable">
		<tr>
			<td style="background: #360;">
				<?php include($SERVER_ROOT . '/includes/leftmenu.php'); ?>
			</td>
			<td>
	<?php
}
?>

