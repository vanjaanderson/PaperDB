<?php
// PHP constants http://php.net/manual/en/language.constants.php

// For security reason, set file privileges to 640, or at least 644.
// -----------------------------------------------
// User 	(6):  	read, write
// Group 	(4):  	read
// Anyone 	(0):  	no privileges 
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
define('PAPER_NAME', 		'Full name of paper');
define('PAPER_THICKNESS', 	'Paper thickness (1 &#956;mm = 0,001 mm)');
define('PAPER_DENSITY', 	'Paper density (grammage)');
define('ACTIVITY', 			'Activity');
define('BUTTON_CREATE_PAPER','Create paper');
define('BUTTON_READ',		'Read');
define('BUTTON_UPDATE',		'Update');
define('BUTTON_DELETE',		'Delete');
define('BUTTON_CALCULATE_BACK', 'Calculate back');
define('BUTTON_SAVE',		'Save');
define('BUTTON_BACK',		'Go back');
define('MANDATORY_SUB_TITLE', 'mandatory fields marked with &ast;');

// Create Paper
define('CREATE_PAPER_TITLE','Create paper');
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
define('NUMBER_PAGES',	'Number of pages');
define('CALCULATE',	    'Calculate');

// Login page
define('LOGIN_TITLE', 	'Login');
define('USERNAME',		'Username');
define('PASSWORD',		'Password');
define('BUTTON_LOGIN',	'Login');
define('BUTTON_LOGOUT',	'Logout');

// Administrator features
define('BUTTON_USER',	'Administrate users');
define('USERS_TITLE', 	'Administrate users');
define('CREATE_USER_TITLE', 'Create user');
define('BUTTON_CREATE_USER', 'Create user');
define('USER_ROLE',		'User privileges role');
define('USER_TITLE',	'Username');
define('USER_PLACEHOLDER', 'Username');
define('PASSWORD_TITLE','Password');
define('NEW_PASSWORD_TITLE','New password');
define('PASSWORD_AGAIN','Type password again');
define('UPDATE_USER_TITLE', 'Update user ');
define('DELETE_USER_TITLE','Delete user ');

define('BUTTON_SUPPLIER','Administrate suppliers');
define('SUPPLIERS_TITLE', 'Administrate suppliers');
define('BUTTON_CREATE_SUPPLIER', 'Create supplier');
define('CREATE_SUPPLIER_TITLE', 'Create supplier');
define('SUPPLIER_NAME', 'Supplier name');
define('SUPPLIER_PLACEHOLDER', 'Supplier name');
define('UPDATE_SUPPLIER_TITLE', 'Update supplier ');
define('DELETE_SUPPLIER_TITLE','Delete supplier ');

?>