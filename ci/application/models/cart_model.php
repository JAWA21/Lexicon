<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function addToCart($photoInfo)
    {
      //var_dump($photoInfo[0]);
    
        $count=sizeof($photoInfo);
        
        if($count>0)
        {
          
          $data = array(
               array(
               'id'      => $photoInfo[0]['ID'],
               'qty'     => 1,
               'price'   => $photoInfo[0]['price'],
               'name'    => $photoInfo[0]['pTitle'],
               ),
            );

            $this->cart->insert($data);             
        }
    }
}
?>