# All superheroes (Marvel &amp; DC comics) in one place...

~~ *This project was implemented in April 2016* ~~

Website designed with a Model-View-Controller (MVC) architecture.

It is a collaborative site that is user-driven, collecting all kinds of superheroes, Marvel or DC.
Users can register to have access to more content and be able to participate in the enrichment of this content. 
There is an admin' part to manage the content created by the users and the users themselves.


In the *index.php* file, change the line 7 by replacing the path with a correct path for your own MySQL config file:
```
require_once('???/mysql_config.php');
```

There is also an available SQL dump *dumpDB.sql* of an existing database.


**Passwords are encrypted for more security, by using the simplified password hashing API:**
 * @author Anthony Ferrara <ircmaxell@php.net>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @copyright 2012
