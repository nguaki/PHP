<?php

    class MostVisitsReport implements IReport{
        private $_sql,
               $_results;
        
        public   function __construct($sql){
           $this->_sql = $sql;
        }
        
        public function ExtractFromDB(){
            $this->_results = DB::getInstance()->query($this->_sql)->results();
        }
        
        public function Format(){
            echo '<table align="center">';
            echo '<tr>';
            echo '<th> Visit Count</th><th>User Name</th>';
            echo '</tr>';
            
            foreach( $this->_results as $row )
            {
                echo'<tr>';
                echo '<td>';    
                echo $row->visit_count;
                echo '</td>';
                echo '<td>';
                echo $row->user_name;
                echo '</td>';
                echo'</tr>';
            }
            echo '</table>';
 
        }
 
    };  