<img src="logo.jpg"><br>
# SAVEME 
Auto Backup you MySQL data base by adding a single line of code in your project :-)

## How it work?
Once the configurations are done (host, database, username, password ans the frequency) the system verify each time if the frequency reach and generate itself a backup .sql file in the backup repository, with a date and hour of the day (it self).

## How to use it?

 1- First, configs ... :
```php

  //All config about the database
  
  $host = "localhost";
  $database = "database";
  $user = "root";
  $password = "";

  // Now frequency
  $time_between_backups = 1; // 1 represent here a day!
```
<br>
2- Clone/Download and put the repository on your PHP project
<br>
3- Integration in your Webapp :

````php 
    //At the head if it's possible(not absolute required)
    include('SAVEME/index.php'); // AND IT's ALL DONE ;-)

  // Some code here too
````
<br>
4-  Extras: <br>
-- You can force an instant backup by add in the query string the parameter 'now'

```shell

  http://yourwebapp/SAVEME?now
  #And the database backup will be automatically generate 
```