<?php
// copy to mcz_connection_lib.php and add credentials

// fill in {host}, {port}, {sid}, i.e. replace "{host}" with ip address of host in the form 1.2.3.4
define ("MCZBASE_CONNECTION", " (DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = {host})(PORT = {port})) (CONNECT_DATA = (SID = {sid} )))");

function mczbase_connect() {
   // connection to production oracle MCZBASE schema
   // using definitions in tnsnames.ora
   $retval = false;
   // supply schema and password
   $schema = "";
   $password = "";
   $retval = oci_connect($schema,$password,MCZBASE_CONNECTION,'AL32UTF8');
   if (!$retval) {
       $e = oci_error();   // For oci_connect errors do not pass a handle
       echo "Error: ". $e['message'] . "<BR><BR>";
   }

   return $retval;
}

?>