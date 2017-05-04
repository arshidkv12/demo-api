<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
  
    public function insert_order($data)
    {   
       
        $this->db->insert('orders',$data);
        $order_id = $this->db->insert_id();
        return $order_id;

    }

    public function insert_order_item($data)
    {   
       
        $this->db->insert('order_items',$data);
        $order_id = $this->db->insert_id();
        return $order_id;

    }

    public function cancel_order($order_id){
        $data = array(
            'status'     => 'cancelled',
            'updated_at' => date("Y-m-d H:i:s")
        );
        $this->db->where('id',$order_id);
        $this->db->update('orders',$data);
        $updated_status = $this->db->affected_rows();

        if($updated_status):
            return true;
        else:
            return false;
        endif;
    }

    public function get_today_contents() {
        $this->db->select("*");
        $this->db->from('orders');
        $this->db->join('order_items', 'orders.id = order_items.order_id');
        $today = date('Y-m-d');
        $this->db->where("DATE_FORMAT(orders.created_at,('%Y-%m-%d'))","$today");
        $query = $this->db->get();
        $result = $query->result(); 
        if (empty($result)) 
            return false;
        else
            return $result;


        
    }

    public function get_content_byid($order_id){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_items', 'orders.id = order_items.order_id');
        $this->db->where('orders.id', $order_id);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result();

        if (empty($result)) 
            return false;
        else
            return $result;
    }
}