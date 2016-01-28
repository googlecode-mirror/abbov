# Intro #

Although ABBOV's engine doesn't use MySQL tables directly, because our Database class allows us to obtain information in objects directly used by the engine, information is stored in MySQL tables.

So, ABBOV gets it's data from this tables, but they must be structured in the correct form.

# Tables #

## Posts ##

The Posts table is where ABBOV stores information related to the blog posts. This table should contain 5 columns: the ID column (only used to keep the order of the posts, should be INT and auto increment), the Text column (where is stored the post text), the Title column (where is stored the post title), the Tags column (where a serialization of an array of tags is stored) and the Author column (where is stored the author of the post). All text columns need to be encoded in latin1\_swedish\_ci. Finally, the table should contain the Time column in INT format (it uses UNIX time).

# Important Information #

Both the table as the columns need to have this names so they can work with ABBOV without modifications. If you want to use other names you'll have to change the names of the tables and the fields in engine/database.php. This is not a supported operation and you won't find any instructions.

# SQL Command #

This commands are here for demonstration purposes only. It is recommended that you run the installation script (install.php) instead of creating the database and tables manually.

```
CREATE DATABASE `abbov` ;
CREATE TABLE `abbov`.`Posts` (
`ID` INT NOT NULL AUTO_INCREMENT ,
`Title` TEXT NOT NULL ,
`Text` TEXT NOT NULL ,
`Author` TEXT NOT NULL ,
`Time` INT NOT NULL ,
`Tags` TEXT NOT NULL ,
PRIMARY KEY ( `ID` )
) ENGINE = MYISAM ;
```