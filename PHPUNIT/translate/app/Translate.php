<?php

namespace App;

class Translate{

    protected $q;
    protected $limit;
    
    public function __construct( $query )
    {
       $this->q = $query; 
    }

    public function toSQL_Srvr_query()
    {
       $this->add_dbo_schema(); 
       
       $this->convert_limit_keyword(); 
       
    }
    public function add_dbo_schema()
    {
       $this->q = str_replace( '`.`', '`.`dbo`.`', $this->q);
    }
    public function convert_limit_keyword()
    {
       $limit_pos = strpos( $this->q, 'LIMIT'); 
       
       if ( $limit_pos !== false ) 
       {
           $limit_str = substr($this->q, $limit_pos);
           $limit_words = preg_split( '/\s+/', $limit_str);
           
           foreach( $limit_words as $word ){
               if( $word != 'LIMIT' )
                $this->limit[] = $word;
           }
           
           if ( strpos($this->limit[0], ',') !== FALSE )
           {
               $data = preg_split('/,/', $this->limit[0]);
               $offset = $data[0];
               $next_rows = $data[1];
           }else{
               $offset = 0;
               $next_rows = $this->limit[0];
           }
           $replace_str = 'OFFSET ' . $offset . ' ROWS ' . 'RETURN NEXT ' . $next_rows . ' ROWS ONLY';
         var_dump($replace_str);
          $this->q = substr_replace($this->q, $replace_str, $limit_pos) ;
       }
    }
    
    public function getQ()
    {
        return $this->q;
    }
    public function get_limit()
    {
        return $this->limit;
    }
};

?>