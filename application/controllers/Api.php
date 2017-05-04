<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

  function __construct(){

    parent::__construct();
    $this->load->model('api_model');
  }

   /**
   * Creat order 
   * @return json and 201
   */
    public function index_post()
    {
        if( $this->uri->segment(2) == 'orders'){
            
            $order_data = array( 
                'email_id'   => $this->post('email'), 
                'status'     => 'created',
                'created_at' => date("Y-m-d H:i:s")
            );

           $item_data = array(
                'name'        => $this->post('name'),
                'price'       => $this->post('price'),
                'quantity'    => $this->post('quantity'),
                'created_at'  => date("Y-m-d H:i:s")
           );

           if ( in_array('', $order_data) || in_array('', $item_data) ) {

               $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); 
           }

           $order_id = $this->api_model->insert_order($order_data);
           $item_data['order_id'] = $order_id;
           $this->api_model->insert_order_item($item_data);

           $message = $item_data;
           $message['message'] = 'Order created';
           $this->set_response($message, REST_Controller::HTTP_CREATED);  
        }
    
  }

  /**
   * GET /orders/{id} ­ Get order by id
   * GET /orders/today ­ Get all orders which were created today.
   * @return json with status
   */
  public function index_get()
  {
    
    if( $this->uri->segment(3) === 'today' ){

        $result = $this->api_model->get_today_contents();
        $this->response($result, REST_Controller::HTTP_OK);

    }elseif( $this->uri->segment(3) && (! $this->uri->segment(4)) ) {
       
        $id = $this->uri->segment(3);
        $result  = $this->api_model->get_content_byid( $id );
        
        if($result === false)
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); 
        else
          $this->response($result, REST_Controller::HTTP_OK);
        
    }else{
        $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); 
    }
  }

 

  /**
   * PUT /orders/{id}/cancel ­ Cancel the order.
   * Add payment
   * Update data
   * @return 204
   */
  public function index_put()
  { 
    $order_id = $this->uri->segment(3);
    if( ( $this->uri->segment(4) == 'cancel' ) && isset($order_id) ){

        $result = $this->api_model->cancel_order($order_id);
        
        if ($result == false) {
            
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); 
        }
        $message = [
            'id' => $order_id,
            'message' => 'Order cancelled'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT);

    }
  }
}

 