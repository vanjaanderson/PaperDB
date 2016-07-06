# CRUD framework for administrating paper databases
This is a simple framework for administrating a paper database (or something else, if you modify the database or create a database of your own).

### Database description
<pre>
database PaperDB
+-------------------+
| Tables_in_paperdb |
+-------------------+
| brand             |
| color             |
| supplier          |
| type              |
| role              |
| user              |
| paper             |
+-------------------+

table brand
+-------+-------------+------+-----+---------+-------+
| Field | Type        | Null | Key | Default | Extra |
+-------+-------------+------+-----+---------+-------+
| brand | varchar(45) | NO   | PRI | NULL    |       |
+-------+-------------+------+-----+---------+-------+

table color
+-------+-------------+------+-----+---------+-------+
| Field | Type        | Null | Key | Default | Extra |
+-------+-------------+------+-----+---------+-------+
| color | varchar(45) | NO   | PRI | NULL    |       |
+-------+-------------+------+-----+---------+-------+

table supplier
+-------+-------------+------+-----+---------+-------+
| Field | Type        | Null | Key | Default | Extra |
+-------+-------------+------+-----+---------+-------+
| name  | varchar(45) | NO   | PRI | NULL    |       |
+-------+-------------+------+-----+---------+-------+

table type
+-------+-------------+------+-----+---------+-------+
| Field | Type        | Null | Key | Default | Extra |
+-------+-------------+------+-----+---------+-------+
| type  | varchar(45) | NO   | PRI | NULL    |       |
+-------+-------------+------+-----+---------+-------+

table role
+-------+-------------+------+-----+---------+-------+
| Field | Type        | Null | Key | Default | Extra |
+-------+-------------+------+-----+---------+-------+
| role  | varchar(24) | NO   | PRI | NULL    |       |
+-------+-------------+------+-----+---------+-------+

table user
+-------+-------------+------+-----+---------+----------------+
| Field | Type        | Null | Key | Default | Extra          |
+-------+-------------+------+-----+---------+----------------+
| name  | char(8)     | YES  |     | NULL    |                |
| pwd   | char(32)    | YES  |     | NULL    |                |
| role  | varchar(24) | NO   | MUL | user    |                |
+-------+-------------+------+-----+---------+----------------+

table paper
+----------+--------------+------+-----+----------------------+----------------+
| Field    | Type         | Null | Key | Default              | Extra          |
+----------+--------------+------+-----+----------------------+----------------+
| id       | int(11)      | NO   | PRI | NULL                 | auto_increment |
| brand    | varchar(45)  | NO   | MUL | NULL                 |                |
| type     | varchar(45)  | NO   | MUL | NULL                 |                |
| color    | varchar(45)  | YES  | MUL |                      |                |
| supplier | varchar(45)  | NO   | MUL | NULL                 |                |
| grammage | int(4)       | NO   |     | NULL                 |                |
| my       | int(4)       | NO   |     | NULL                 |                |
| user     | char(8)      | NO   | MUL | NULL                 |                |
| image    | varchar(255) | YES  |     | uploads/no-image.jpg |                |
+----------+--------------+------+-----+----------------------+----------------+
</pre>


### Getting started
- Download or clone the framework. 
- Put the files on your web hosting server or your local web server environment.
- Install the database file (PaperDB.sql), see http://www.itworld.com/article/2833078/it-management/3-ways-to-import-and-export-a-mysql-database.html (Accessed: 15 June 2016).
- Configure your database settings in db/config.php. Change priviliges on the file to protect your settings (see instructions in the file or – in short – chmod 640 on the file).
- Delete the sample data on the database and insert your own.
- Move the uploads folder somewhere outside your web root. Setting is changed in config.php. Also change permission on the folder to 755 or maybe 775.

### To-Do
- Administrate color, brand and type.
- Sort columns papername, paper thickness and paper density.
- Delete multiple records with checkboxes, in administrator mode.

### Changelog
- 2016-07-07 – Version 0.6 – File upload is improved. Now images does not "disappear" when updating only text data.
- 2016-07-05 – Version 0.5 – File upload is implemented. See comments above (move uploads folder and change settings).  
- 2016-07-02 – Version 0.4 – Paginator and search-box included in framework.
- 2016-06-29 – Version 0.3 – Administration interface for creating, updating and deleting users and suppliers.
- 2016-06-26 – Version 0.2 – Count-back-function.
- 2016-06-22 – Version 0.1 – Developing stage, not yet working version.