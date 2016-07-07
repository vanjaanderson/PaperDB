-- Insert brand
INSERT INTO brand (brand) VALUES
	('4CC'), 
	('Cocoon'), 
	('Cyclus'), 
	('Digigreen'), 
	('Edixion'), 
	('Elfenbenskartong'), 
	('GalerieArt&trade;'), 
	('Incada'), 
	('Invercote'), 
	('Mohawk Superfine'), 
	('NatureWoven'), 
	('Olin'), 
	('Pioneer'), 
	('Polyart'), 
	('Priplak'), 
	('Scandia 2000'), 
	('Svenskt Arkiv'), 
	('Sweden Bond'), 
	('Tom&amp;Otto'), 
	('UPM Sol'), 
	('Venicelux'), 
	('Venoplex'), 
	('White Duo'
);

-- Insert type
INSERT INTO type (type) VALUES
	(' '),
	('Offset'),
	('PrePrint'),
	('Silk'),
	('Print'),
	('Gloss'),
	('Laser Pre-Print'),
	('Bulk (Volume)'),
	('Matt'),
	('Albato'),
	('Creato'),
	('G'),
	('G Linnepräglad'),
	('Superfine'),
	('Chorus Jute'),
	('Gossyp'),
	('Rough Absolute'),
	('Rough High'),
	('Pre-Print'),
	('Digital'),
	('Backlit'),
	('Classic'),
	('Supercristal+'),
	('Smooth'),
	('Liksidig'),
	('Duo'),
	('Eggshell/matt'),
	('Smooth/slät'),
	('(f.d. Lessebo Linn&eacute;)'),
	('Single Matt'
);

-- Insert color
INSERT INTO color (color) VALUES
	(' '),
	('Vit/White'),
	('Gultonat/Ivory'),
	('Naturvit/Natural'),
	('White'
);

-- Insert supplier
INSERT INTO supplier (supplier) VALUES
	('Antalis'
);
 
-- Insert paper (row 58)
INSERT INTO paper (brand, type, grammage, my, color, supplier, user, image) VALUES 
	('4CC', ' ', 90, 100, '', 'Antalis', 'user', ''),
	('4CC', ' ', 100, 113, '', 'Antalis', 'user', ''),
	('4CC', ' ', 120, 125, '', 'Antalis', 'admin', ''),
	('4CC', ' ', 160, 157, '', 'Antalis', 'user', ''),
	('4CC', ' ', 200, 196, '', 'Antalis', 'user2', ''),
	('4CC', ' ', 250, 245, '', 'Antalis', 'user', ''),
	('4CC', ' ', 280, 275, '', 'Antalis', 'admin', ''),
	('4CC', ' ', 300, 295, '', 'Antalis', 'user', ''),
	('Cocoon', 'Offset', 90, 103, '', 'Antalis', 'user', ''),
	('Cocoon', 'Offset', 100, 117, '', 'Antalis', 'user2', ''),
	('Cocoon', 'Offset', 120, 141, '', 'Antalis', 'admin', ''),
	('Cocoon', 'Offset', 140, 154, '', 'Antalis', 'user3', ''),
	('Cocoon', 'Offset', 160, 179, '', 'Antalis', 'user', ''),
	('Cocoon', 'Offset', 200, 228, '', 'Antalis', 'user', ''),
	('Cocoon', 'Offset', 250, 290, '', 'Antalis', 'user2', ''),
	('Cocoon', 'Offset', 300, 354, '', 'Antalis', 'admin', ''),
	('Cocoon', 'Offset', 350, 416, '', 'Antalis', 'user', ''),
	('Cocoon', 'PrePrint', 80, 89, '', 'Antalis', 'user', ''),
	('Cocoon', 'PrePrint', 90, 101, '', 'Antalis', 'user', ''),
	('Cocoon', 'Silk', 135, 112, '', 'Antalis', 'user', ''),
	('Cocoon', 'Silk', 150, 126, '', 'Antalis', 'user2', ''),
	('Cocoon', 'Silk', 170, 146, '', 'Antalis', 'admin', ''),
	('Cocoon', 'Silk', 200, 174, '', 'Antalis', 'user3', ''),
	('Cocoon', 'Silk', 250, 233, '', 'Antalis', 'user3', ''),
	('Cocoon', 'Silk', 300, 288, '', 'Antalis', 'user2', ''),
	('Cocoon', 'Silk', 350, 347, '', 'Antalis', 'user', ''),
	('Cyclus', 'Offset', 90, 106, '', 'Antalis', 'user2', ''),
	('Cyclus', 'Offset', 100, 113, '', 'Antalis', 'user', ''),
	('Cyclus', 'Offset', 115, 128, '', 'Antalis', 'user3', ''),
	('Cyclus', 'Offset', 140, 157, '', 'Antalis', 'user', ''),
	('Cyclus', 'Offset', 170, 190, '', 'Antalis', 'user2', ''),
	('Cyclus', 'Offset', 200, 225, '', 'Antalis', 'user3', ''),
	('Cyclus', 'Offset', 250, 285, '', 'Antalis', 'user', ''),
	('Cyclus', 'Offset', 300, 350, '', 'Antalis', 'user2', ''),
	('Cyclus', 'Print', 90, 89, '', 'Antalis', 'admin', ''),
	('Cyclus', 'Print', 115, 112, '', 'Antalis', 'user', ''),
	('Cyclus', 'Print', 130, 129, '', 'Antalis', 'user3', ''),
	('Cyclus', 'Print', 150, 150, '', 'Antalis', 'user', ''),
	('Cyclus', 'Print', 170, 170, '', 'Antalis', 'user3', ''),
	('Cyclus', 'Print', 200, 202, '', 'Antalis', 'user', ''),
	('Cyclus', 'Print', 350, 343, '', 'Antalis', 'user3', ''),
	('Digigreen', 'Gloss', 100, 74, '', 'Antalis', 'admin', ''),
	('Digigreen', 'Gloss', 115, 84, '', 'Antalis', 'user', ''),
	('Digigreen', 'Gloss', 150, 108, '', 'Antalis', 'user2', ''),
	('Digigreen', 'Gloss', 170, 124, '', 'Antalis', 'admin', ''),
	('Digigreen', 'Gloss', 200, 150, '', 'Antalis', 'user', ''),
	('Digigreen', 'Gloss', 250, 188, '', 'Antalis', 'user2', ''),
	('Digigreen', 'Gloss', 300, 235, '', 'Antalis', 'admin', ''),
	('Digigreen', 'Gloss', 350, 280, '', 'Antalis', 'user2', ''),
	('Digigreen', 'Gloss', 115, 100, '', 'Antalis', 'admin', ''),
	('Digigreen', 'Gloss', 130, 110, '', 'Antalis', 'user2', ''),
	('Digigreen', 'Gloss', 150, 128, '', 'Antalis', 'user', ''),
	('Digigreen', 'Gloss', 170, 146, '', 'Antalis', 'user3', ''),
	('Digigreen', 'Gloss', 200, 174, '', 'Antalis', 'admin', ''),
	('Digigreen', 'Gloss', 250, 235, '', 'Antalis', 'admin', ''),
	('Digigreen', 'Gloss', 300, 291, '', 'Antalis', 'user', ''),
	('Digigreen', 'Gloss', 350, 350, '', 'Antalis', 'user2', ''	
);

-- Insert roles
INSERT INTO role (role) VALUES
	('administrator'),
	('user'
);

-- Insert brandtype
INSERT INTO brandtype (brand, type) VALUES
	('Cocoon', 'Offset'),
	('Cocoon', 'PrePrint'),
	('Cocoon', 'Silk'),
	('Cyclus', 'Offset'),
	('Cyclus', 'Print'),
	('Digigreen', 'Gloss'),
	('Digigreen', 'Silk'),
	('Edixion', 'Laser Pre-Print'),
	('Edixion', 'Offset'),
	('Elfenbenskartong', ''),
	('GalerieArt&trade;', 'Bulk (Volume)'),
	('GalerieArt&trade;', 'Gloss'),
	('GalerieArt&trade;', 'Matt'),
	('GalerieArt&trade;', 'Silk'),
	('Incada', 'Silk'),
	('Invercote', 'Albato'),
	('Invercote', 'Creato'),
	('Invercote', 'G'),
	('Invercote', 'G Linnepräglad'),
	('Mohawk Superfine', 'Eggshell/matt'),
	('Mohawk Superfine', 'Smooth/slät'),
	('NatureWoven', 'Chorus Jute'),
	('NatureWoven', 'Gossyp'),
	('Olin', 'Rough Absolute'),
	('Olin', 'Rough High'),
	('Pioneer', 'Pre-Print'),
	('Polyart', ' '),
	('Polyart', 'Digital'),
	('Priplak', 'Backlit'),
	('Priplak', 'Classic'),
	('Priplak', 'Supercristal+'),
	('Scandia2000', ' '),
	('Scandia2000', '(f.d. Lessebo Linn&eacute;)'),
	('Scandia2000', 'Smooth'),
	('Svenskt Arkiv', ' '),
	('Sweden Bond', ' '),
	('Tom&amp;Otto','Gloss'),
	('Tom&amp;Otto','Silk'),
	('Tom&amp;Otto','Single Matt'),
	('UPM Sol', 'Gloss'),
	('UPM Sol', 'Matt'),
	('Venicelux', ' '),
	('Venicelux', 'Liksidig'),
	('Venoplex', ' '),
	('White Duo' ,' '
);

-- Insert brandcolor
INSERT INTO brandcolor (brand, color) VALUES
	('Scandia2000', 'Gultonat/Ivory'),
	('Scandia2000', 'Naturvit/Natural'),
	('Scandia2000', 'Vit/White'),
	('Olin', 'White'
);

-- Insert user
INSERT INTO user (name, pwd, role) VALUES 
	-- admin, admin, administrator
	('admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
	-- user, user, user
	('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
	-- user2, user2, user
	('user2', '7e58d63b60197ceb55a1c487989a3720', 'user'),
	-- user3, user3, user
	('user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user'
);