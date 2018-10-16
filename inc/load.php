<?php
// Address of theme
$adressTheme = get_bloginfo('template_url');
// Directory local
$templateDirectory = get_template_directory();
// Folder enter in theme in folder /inc/functions/
$localsFolders = array(
	'functions', // Main folder
);
// List Folders
foreach ($localsFolders as $folderCurrent) {
	foreach (glob($templateDirectory . "/inc/" . $folderCurrent . "/*.php") as $filename) {
	    require $filename;
	}
}
?>
