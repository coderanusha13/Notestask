<?php
require_once "../../config.php";
class Data
{
function _connect_to_mysql($is_utf8 = null) 
{ 
    $mysql_link = mysql_connect(DB_HOST, DB_USER, DB_PASS)  
              or die("Could not connect to database server");  
    mysql_select_db(DB_NAME, $mysql_link)  
              or die("Could not select database");  
         
    if (is_null($is_utf8)) 
    { 
        mysql_query("SET NAMES 'utf8'"); 
    } 
    return $mysql_link; 
  }
function  
}   
?>