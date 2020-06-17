<?php
 
 // Connect to MySQL server
 mysqli_connect('127.0.0.1','root','') or die('Error connecting to MySQL server: ' . mysql_error());
 // Select database
 mysqli_select_db('barangayit_v2_db') ;
 $templine = '';

 // Loop through each line
     foreach ($Read_File as $line)
     {
     // Skip it if it's a comment
     if (substr($line, 0, 2) == '--' || $line == '')
         continue;

     // Add this line to the current segment
     $templine .= $line;
     // If it has a semicolon at the end, it's the end of the query
     if (substr(trim($line), -1, 1) == ';')
     {
         // Perform the query
         mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
         // Reset temp variable to empty
         $templine = '';
     }
     }


?>