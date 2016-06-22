-- Insert brand
INSERT INTO brand (brand) VALUES
	('4CC'), 
	('Cocoon'), 
	('Cyclus'), 
	('Digigreen'), 
	('Edixion'), 
	('Elfenbenskartong'), 
	('GalerieArt'), 
	('Incada'), 
	('Invercote'), 
	('Mohawk'), 
	('NatureWoven'), 
	('Olin'), 
	('Pioneer'), 
	('Polyart'), 
	('Priplak'), 
	('Scandia 2000'), 
	('Svenskt Arkiv'), 
	('Sweden Bond'), 
	('Tom&Otto'), 
	('UPM Sol'), 
	('Venicelux'), 
	('Venoplex'), 
	('White Duo'
);

-- Insert type
INSERT INTO type (type) VALUES
	('Offset'),
	('PrePrint'),
	('Silk'),
	('Print'),
	('Gloss'),
	('Laser'),
	('Laser Preprint'),
	('Bulk (Volume)'),
	('Matt'),
	('Albato'),
	('Creato'),
	('G'),
	('G Linnépräglad'),
	('Superfine'),
	('Chorus Jute'),
	('Gossyp'),
	('Rough Absolute'),
	('Rough High'),
	('Pre-Print'),
	('Digital'),
	('Backlit'),
	('Classic'),
	('Supercristal'),
	('Smooth'),
	('liksidig'),
	('Duo'
);

-- Insert color
INSERT INTO color (color) VALUES
	(' '),
	('White/Vit'),
	('Gultonat/Ivory'),
	('Natur'
);

-- Insert supplier
INSERT INTO supplier (name) VALUES
	('Antalis'
);

-- Insert paper
INSERT INTO paper (brand, type, grammage, my, color, supplier) VALUES (
	'Cocoon', 'Offset', 133, 100, 'Natur', 'Antalis'
);