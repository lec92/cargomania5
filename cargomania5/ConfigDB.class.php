<?php
class ConfigDB{
        var $DB_PgSQL;
        var $Server_PgSQL;
        var $User_PgSQL;
        var $Password_PgSQL;
        function ConfigDB(){
        	$this->DB_PgSQL = "cargomania";
        	$this->Server_PgSQL = "localhost";
        	$this->User_PgSQL = "postgres";
        	$this->Password_PgSQL= "lec92.com";
        }
}

?>
