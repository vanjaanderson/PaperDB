-- Create database and use it
-- DROP DATABASE PaperDB;
CREATE DATABASE IF NOT EXISTS PaperDB;
USE PaperDB;

-- InnoDB supports transactions
-- MyISAM is default value for MySQL
-- See comparison of db engines: https://en.wikipedia.org/wiki/Comparison_of_MySQL_database_engines

-- Create brand table
CREATE TABLE IF NOT EXISTS brand (
  brand varchar(45) NOT NULL,
  PRIMARY KEY (brand)
) ENGINE=InnoDB;

-- Create type table
CREATE TABLE IF NOT EXISTS type (
  type varchar(45) NOT NULL,
  PRIMARY KEY (type)
) ENGINE=InnoDB;

-- Create color table
CREATE TABLE IF NOT EXISTS color (
  color varchar(45) NOT NULL,
  PRIMARY KEY (color)
) ENGINE=InnoDB;

-- Create supplier table
CREATE TABLE IF NOT EXISTS supplier (
  supplier varchar(45) NOT NULL,
  PRIMARY KEY (supplier)
) ENGINE=InnoDB;

-- Create roles for the users
CREATE TABLE IF NOT EXISTS role (
  role varchar(24) NOT NULL,
  PRIMARY KEY (role)
) ENGINE=InnoDB;

-- Create users to administrate the db
CREATE TABLE IF NOT EXISTS user (
  name char(8) NOT NULL,
  pwd char(32) NOT NULL,
  role varchar(24) NOT NULL DEFAULT 'user',
  PRIMARY KEY (name),
  -- foreign key
  CONSTRAINT user_role_fk FOREIGN KEY (role) REFERENCES role(role)
) ENGINE=InnoDB;

-- Create brandtype which lists types for all brands
CREATE TABLE IF NOT EXISTS brandtype (
  brand varchar(45) NOT NULL,
  type varchar(45) NOT NULL,
  PRIMARY KEY (brand, type),
  -- foreign keys
  CONSTRAINT brandtype_brand_fk FOREIGN KEY (brand) REFERENCES brand(brand),
  CONSTRAINT brandtype_type_fk FOREIGN KEY (type) REFERENCES type(type)
) ENGINE=InnoDB;

-- Create brandcolor which lists colors
CREATE TABLE IF NOT EXISTS brandcolor (
  brand varchar(45) NOT NULL,
  color varchar(45) NOT NULL,
  PRIMARY KEY (brand, color),
  -- foreign keys
  CONSTRAINT brandcolor_brand_fk FOREIGN KEY (brand) REFERENCES brand(brand),
  CONSTRAINT brandcolor_color_fk FOREIGN KEY (color) REFERENCES color(color)
) ENGINE=InnoDB;

-- Create paper table
CREATE TABLE IF NOT EXISTS paper (
  id int(11) NOT NULL AUTO_INCREMENT,
  brand varchar(45) NOT NULL,
  type varchar(45) NOT NULL,
  color varchar(45) DEFAULT ' ',
  supplier varchar(45) NOT NULL,
  grammage int(4) NOT NULL,
  my int(4) NOT NULL,
  user char(8) NOT NULL,
  image varchar(255) DEFAULT 'uploads/no-image.jpg',
  PRIMARY KEY (id),
  -- foreign keys
  CONSTRAINT paper_brand_fk FOREIGN KEY (brand) REFERENCES brand(brand),
  CONSTRAINT paper_type_fk FOREIGN KEY (type) REFERENCES type(type),
  CONSTRAINT paper_color_fk FOREIGN KEY (color) REFERENCES color(color),
  CONSTRAINT paper_supplier_fk FOREIGN KEY (supplier) REFERENCES supplier(supplier),
  CONSTRAINT paper_user_fk FOREIGN KEY (user) REFERENCES user(name)
) ENGINE=InnoDB;