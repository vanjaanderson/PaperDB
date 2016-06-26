<?php
// PHP constants http://php.net/manual/en/language.constants.php

// For security reason, set file priviliges to 640
// -----------------------------------------------
// User 	(6):  	read, write
// Group 	(4):  	read
// Anyone 	(0):  	no priviliges 
// -----------------------------------------------
// In unix/linux: chmod 640 config.php
// Check with ls -l
// Result should be -rw-r-----

// Define database settings, see your web hosting's database configurations
define('DB_TYPE', 	'mysql'); // Usually mysql, but you can use others with PDO
define('DB_NAME', 	'PaperDB');
define('DB_HOST', 	'localhost');
define('DB_USER', 	'root');
define('DB_PWD', 	'');

// Define your document root
define('DOCUMENT_ROOT', '/PaperDB');

// Define your web page title
define('WEB_PAGE_TITLE', 'Paper DB CRUD');

// Text strings in the view
define('PAPER_NAME', 		'Full Name of Paper');
define('PAPER_THICKNESS', 	'Paper thickness (1 &#956;mm = 0,001 mm)');
define('PAPER_DENSITY', 	'Paper density (grammage)');
define('PAPER_ACTIVITY', 	'Activity');
define('BUTTON_CREATE_PAPER','Create Paper');
define('BUTTON_READ',		'Read');
define('BUTTON_UPDATE',		'Update');
define('BUTTON_DELETE',		'Delete');
define('BUTTON_CALCULATE_BACK', 'Calculate Back');
define('BUTTON_SAVE',		'Save');
define('BUTTON_BACK',		'Go Back');

// Create Paper
define('CREATE_PAPER_TITLE','Create Paper');
define('CREATE_PAPER_SUB_TITLE', 'mandatory fields marked with &ast;');
define('BRAND_TITLE',		'Brand');
define('BRAND_PLACEHOLDER', 'Type the paper&rsquo;s brand here');
define('TYPE_TITLE',		'Papertype');
define('TYPE_PLACEHOLDER', 	'Papertype (Offset, Digital&hellip;)');
define('GRAMMAGE_TITLE',	'Grammage');
define('GRAMMAGE_PLACEHOLDER', 'Density of the paper (g/m&#178;)');
define('MY_TITLE',			'My-value');
define('MY_PLACEHOLDER', 	'Paper thickness (&#956;mm)');
define('COLOR_TITLE',		'Color');
define('COLOR_PLACEHOLDER', 'Color of the paper');
define('SUPPLIER_TITLE',	'Supplier');
define('SUPPLIER_DEFAULT', 	'Antalis');
define('MANDATORY', 		'&#8201;&ast;');

// Read Paper
define('READ_PAPER_TITLE', 	'Read record: ');

// Delete Paper
define('DELETE_PAPER_TITLE','Delete paper: ');
define('BUTTON_DELETE_YES',	'Yes, delete');
define('BUTTON_DELETE_NO',	'No, I changed my mind');

// Update paper
define('UPDATE_PAPER_TITLE',	'Update paper');

// Calculate back
define('CALCULATE_BACK_TITLE',	'Calculate width of back with paper: ');
define('NUMBER_PAGES',			'Number of pages');
define('CALCULATE',	    'Calculate');
?>