<?php
if($LANG_TAG == 'en' || !file_exists($SERVER_ROOT.'/content/lang/templates/header.' . $LANG_TAG . '.php'))
	include_once($SERVER_ROOT . '/content/lang/templates/header.en.php');
else include_once($SERVER_ROOT . '/content/lang/templates/header.' . $LANG_TAG . '.php');
$SHOULD_USE_HARVESTPARAMS = $SHOULD_USE_HARVESTPARAMS ?? false;
$collectionSearchPage = $SHOULD_USE_HARVESTPARAMS ? '/collections/index.php' : '/collections/search/index.php';
?>
<div class="header-wrapper">
	<header>
		<div class="top-wrapper">
			<a class="screen-reader-only" href="#end-nav"><?= $LANG['H_SKIP_NAV'] ?></a>
			<nav class="top-login" aria-label="horizontal-nav">
				<?php
				if ($USER_DISPLAY_NAME) {
					?>
					<div class="welcome-text bottom-breathing-room-rel">
						<?= $LANG['H_WELCOME'] . ' ' . $USER_DISPLAY_NAME ?>!
					</div>
					<span style="white-space: nowrap;" class="button button-tertiary bottom-breathing-room-rel">
						<a href="<?= $CLIENT_ROOT ?>/profile/viewprofile.php"><?= $LANG['H_MY_PROFILE'] ?></a>
					</span>
					<span style="white-space: nowrap;" class="button button-secondary bottom-breathing-room-rel">
						<a href="<?= $CLIENT_ROOT ?>/profile/index.php?submit=logout"><?= $LANG['H_LOGOUT'] ?></a>
					</span>
					<?php
				} else {
					?>
					<span id="login">
						<form name="loginForm" method="post" action="<?= $CLIENT_ROOT . "/profile/index.php" ?>">
							<input name="refurl" type="hidden" value="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'], ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE) . "?" . htmlspecialchars($_SERVER['QUERY_STRING'], ENT_QUOTES) ?>">
							<button class="button button-secondary" name="loginButton" type="submit"><?= $LANG['H_LOGIN'] ?></button>
						</form>
					</span>
					<?php
				}
				?>
			</nav>
			<div class="top-brand">
				<a href="<?= $CLIENT_ROOT ?>">
					<div class="image-container">
						<img src="<?= $CLIENT_ROOT ?>/images/vplants/img/logo.gif" alt="vPlants logo">
					</div>
				</a>
				<div class="brand-name">
					<h1></h1>
					<h2></h2>
				</div>
				<div style="float:right;margin-right:15px;margin-top:10px;">
					<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40tt.jpg" style="width:40px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Thalictrum thalictroides">
					<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40hm.jpg" style="width:27px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Hibiscus moscheutos">
					<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40ug.jpg" style="width:40px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Uvularia grandiflora">
					<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40cp.jpg" style="width:26px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Cirsium pitcheri">
					<img src="<?php echo $CLIENT_ROOT; ?>/images/vplants/feature/40ac.jpg" style="width:40px;height:40px;margin-left:2.5px;margin-right:2.5px;" alt=" " title="Agaricus campestris">
				</div>
			</div>
		</div>
		<div class="menu-wrapper">
			<!-- Hamburger icon -->
			<input class="side-menu" type="checkbox" id="side-menu" name="side-menu" />
			<label class="hamb hamb-line hamb-label" for="side-menu" tabindex="0">☰</label>
			<!-- Menu -->
			<nav class="top-menu" aria-label="hamburger-nav">
				<ul class="menu">
				<li>
						<a href="<?= $CLIENT_ROOT ?>/index.php">
							<?= $LANG['H_HOME'] ?>
						</a>
					</li>
					<li>
						<a href="<?= $CLIENT_ROOT; ?>/about/index.php">About Us</a>
						<ul>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/about/vplants.php">vPlants Project</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/about/chicago.php">Chicago Region</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/about/partnership.php">vPlants Partnership</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/about/contact.php">Contact Us</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/about/credits.php">Credits</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" >Search</a>
						<ul>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/collections/search/index.php">Specimen Search</a></li>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/collections/map/index.php" target="_blank">Map Search</a></li>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?= $CLIENT_ROOT; ?>/imagelib/index.php" >Browse Images</a>
					</li>
					<li>
						<a href="<?= $CLIENT_ROOT; ?>/projects/index.php?" >Inventories</a>
						<ul>
							<li><a href="<?= $CLIENT_ROOT; ?>/checklists/checklist.php?cl=4892">Aquatic Invasive Plant Guide</a></li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/checklists/checklist.php?cl=3516&pid=93" >Naturalized flora of The Morton Arboretum</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/checklists/checklist.php?cl=3503&pid=93" >vPlants Checklist</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/projects/index.php?proj=93" >Chicago Region Checklists and Inventories</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" >Interactive Tools</a>
						<ul>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/ident/key.php?cl=3503&proj=91&taxon=All+Species" >vPlants Dynamic Key</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=checklist" >Dynamic Checklist</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/checklists/dynamicmap.php?interface=key" >Dynamic Key</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?= $CLIENT_ROOT; ?>/plants/index.php">Plants</a>
						<ul>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/chicagoplants.php">Chicago Plants</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/guide/index.php">Guide</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/glossary/index.php">Glossary</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/biology.php">Biology</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/diversity.php">Diversity</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/habitats.php">Habitats</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/origin.php">Origin</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/distribution.php">Distribution</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/names.php">Names</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/collections.php">Collections</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/plants/concern.php">Special Concern</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?= $CLIENT_ROOT; ?>/resources/index.php">Resources</a>
						<ul>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/resources/regionherbaria.php">Region Herbaria</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/resources/docs.php">Documents</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/resources/biblio.php">References</a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT; ?>/resources/links.php">Links</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?= $CLIENT_ROOT ?>/includes/usagepolicy.php">
							<?= $LANG['H_DATA_USAGE'] ?>
						</a>
					</li>
					<li>
						<a href='<?= $CLIENT_ROOT ?>/sitemap.php'>
							<?= $LANG['H_SITEMAP'] ?>
						</a>
					</li>
					<!--
					<li id="lang-select-li">
						<label for="language-selection"><?= $LANG['H_SELECT_LANGUAGE'] ?>: </label>
						<select oninput="setLanguage(this)" id="language-selection" name="language-selection">
							<option value="en">English</option>
							<option value="es" <?= ($LANG_TAG=='es'?'SELECTED':'') ?>>Español</option>
							<option value="fr" <?= ($LANG_TAG=='fr'?'SELECTED':'') ?>>Français</option>
						</select>
					</li>
					-->
				</ul>
			</nav>
		</div>
		<div id="end-nav"></div>
	</header>
</div>
