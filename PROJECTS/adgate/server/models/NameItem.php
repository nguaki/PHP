<?php
require_once "database.php";
require_once "queryDB.php";
require_once "escapeString.php";

class NameItem
{
    public $name_id;
    public $first_name;
    public $last_name;
    
    public static function getAllItems($username, $userpass)
    {
        self::_checkIfUserExists($username, $userpass);

        $name_items = array();
        $mysqli = Database::getInstance()->getConnection();
        
        $SQL = "SELECT * ";
        $SQL .= "FROM full_name ";

        if ($result = $mysqli->query($SQL)) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                $first_name = $row['first_name'];         
                $last_name = $row['last_name'];
                $name_items[] = $row;         
            }
        } else {
            error_log(mysqli_error($mysqli));
            throw new Exception('Failed to execute a select query');
        }

        return $name_items;
    }

    public function delete($username, $userpass)
    {
        self::_checkIfUserExists($username, $userpass);

        $mysqli = Database::getInstance()->getConnection();
        
        $objEscapeStrings = new escapeString($mysqli, array( $this->name_id ));
        $escapedStrings = $objEscapeStrings->getEscapedStrings();


        $SQL = "DELETE FROM `full_name` WHERE ";
        $SQL .= "`name_index`= $escapedStrings[0]";
        
        $queryDB = new queryDB();
        $queryDB->query($mysqli, $SQL);
         
        return true;
    }

    public function update($username, $userpass)
    {
       $mysqli = Database::getInstance()->getConnection();

       $name_item_array = $this->toArray();

        $objEscapeStrings = new escapeString($mysqli, array( $this->first_name, $this->last_name, $this->name_id ));
        $escapedStrings = $objEscapeStrings->getEscapedStrings();


        $SQL = "UPDATE `full_name` SET `first_name`= '" .
        $escapedStrings[0] .
        "', `last_name`= '" .
        $escapedStrings[1] .
        "'";
        $SQL .=  " WHERE name_index = " . $escapedStrings[2];

        $queryDB = new queryDB();
        $queryDB->query($mysqli, $SQL);

        return $name_item_array;

    }

    public function save($username, $userpass)
    {
        //get the array version of this name item
        $name_item_array = $this->toArray();
         
        $mysqli = Database::getInstance()->getConnection();
        
        $objEscapeStrings = new escapeString($mysqli, array( $this->first_name, $this->last_name ));
        $escapedStrings = $objEscapeStrings->getEscapedStrings();
  
        $SQL = "INSERT INTO full_name (`name_index`, `first_name`, `last_name`)";

        $SQL .=  "VALUES (NULL, '" . 
            $escapedStrings[0] . 
            "',".  
            "'" . 
            $escapedStrings[1] . 
            "')";

        $queryDB = new queryDB();
        $queryDB->query($mysqli, $SQL);

       // // 
    }

    public function toArray()
    {
        //return an array version of the name item
        return array(
            'name_id' => $this->name_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name
        );
    }

    public static function _checkIfUserExists($username, $userpass)
    {
        $mysqli = Database::getInstance()->getConnection();
        
        $objEscapeStrings = new escapeString($mysqli, array( $username, $userpass ));
        $escapedStrings = $objEscapeStrings->getEscapedStrings();
        
        $encryptedUserName = sha1($escapedStrings[0]);
        $encryptedUserPass = sha1($escapedStrings[1]);

        $SQL = "SELECT user_pass ";
        $SQL .= "FROM admin_login ";
        $SQL .= 'WHERE user_name = "' . $encryptedUserName . '"';

        error_log( $SQL );
        if ($result = $mysqli->query($SQL)) {
            if ($row = $result->fetch_assoc()) {
                $db_password = $row['user_pass'];   
            
                if( $db_password == $encryptedUserPass ) {
                    error_log( "username and password matches:" . $db_password );
                } else {
                    error_log( "Invalid password");
                    throw new Exception('Password is invalid');        
                }
            } else {
                error_log( "NO ROWS returned");
               throw new Exception('NO such Username exists');        
            }
        } else {
            error_log("SQL failure returned");
            throw new Exception('No such username exists.');        
        }
        
        return true;
    }
}