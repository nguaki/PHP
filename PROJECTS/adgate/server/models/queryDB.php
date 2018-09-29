<?php
class queryDB {
	function query( $mysqli, $SQL ){
		error_log( $SQL );
        $result = $mysqli->query($SQL);
        if( !$result ) 
        {
            error_log(mysqli_error($mysqli));
            throw new Exception('Failed to execute a query.');
        }
        return true;
	}
};
?>