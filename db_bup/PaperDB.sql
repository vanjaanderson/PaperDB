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
  name varchar(45) NOT NULL,
  PRIMARY KEY (name)
) ENGINE=InnoDB;

-- Create users to administrate the db
CREATE TABLE IF NOT EXISTS user (
  user char(6) NOT NULL,
  pwd char(24) NOT NULL,
  PRIMARY KEY (user, pwd)
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
  PRIMARY KEY (id),
  -- foreign keys
  CONSTRAINT paper_brand_fk FOREIGN KEY (brand) REFERENCES brand(brand),
  CONSTRAINT paper_type_fk FOREIGN KEY (type) REFERENCES type(type),
  CONSTRAINT paper_color_fk FOREIGN KEY (color) REFERENCES color(color),
  CONSTRAINT paper_supplier_fk FOREIGN KEY (supplier) REFERENCES supplier(name)
) ENGINE=InnoDB;