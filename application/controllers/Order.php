<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model','product');
        $this->load->model('order_model','order');
    }

    public function index(){
        $data = array();
        $data['orders'] = $this->order->getOrders();
        $this->load->view('order/order_view', $data);
    }

    public function view($id = null){
        $data = array();
        $data['products'] = $this->product->getProductsByOrderId($id);
        if(!$id || !$data['products']){
            $this->session->set_flashdata('mensagem', array('danger','Transaksi tidak ada!'));
            redirect('/');
        }
        $order_price = 0;
        foreach ($data['products'] as $key => $product){
            $order_price = ($product->preco * $product->product_qtd) + $order_price;
        }
        $data['total'] = $order_price;
        $data['order_id'] = $id;
        $this->load->view('order/order_form_view', $data);
    }

    public function save($id = null)
    {
        $order_products = $this->input->post('product');
        $products_ids = array();
        foreach ($order_products as $key => $product_qtd){
            if($product_qtd){
                $product = $this->product->getProductById($key);
                $order_price = ($product[0]->preco * $product_qtd) + $order_price;
                $products_ids[] = array
                (
                    'product_id' => $key,
                    'product_qtd' => $product_qtd,
                );
            }
        }
        $date = date("Y-m-d H:i:s");
        $form_data = array
        (
            'id' => $id,
            'data' => $date,
        );
        if(!$id){
            $order_id = $this->order->createOrder($form_data);
            if($order_id){
                foreach ($products_ids as $product_id){
                    $reference_data = array
                    (
                        'order_id' => $order_id,
                        'product_id' => $product_id['product_id'],
                        'product_qtd' => $product_id['product_qtd'],
                    );
                    $send_form = $this->order->makeProductOrderReference($reference_data);
                }
            }
        } else {
            $send_form = $this->order->updateOrder($form_data);
        }

        if($send_form){
            $this->session->set_flashdata('mensagem', array('success','Transaksi penjualan berhasil ditambahkan!'));
            redirect('order');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Tambah setidaknya satu produk quantity'));
            redirect('order/new');
        }
    }

    public function delete($id)
    {
        $delete = $this->order->deleteOrder($id);
        if($delete){
            $this->session->set_flashdata('mensagem', array('success','Transaksi penjualan berhasil dihapus!'));
            redirect('order');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! pesanan tidak ada!'));
            redirect('order');
        }
    }

    public function new()
    {
      $data['products'] = $this->product->getProducts();
      $this->load->view('order/order_new', $data);
    }
}
