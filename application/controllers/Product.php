<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model','product');
    }

    public function index()
    {
        $data = array();
        $data['products'] = $this->product->getProducts();
        $this->load->view('product/product_view', $data);
    }

    public function form($product_id = null)
    {
        $data = array();
        if($product_id){
            $data['product'] = $this->product->getProductById($product_id);
        }
        $this->load->view('product/product_form_view', $data);
    }

    public function save($id = null)
    {
        $form_data = array
        (
            'id' => $id,
            'sku' => $this->input->post('sku'),
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'preco' => $this->input->post('preco')
        );
        if(!$id){
            $send_form = $this->product->createProduct($form_data);
        } else {
            $send_form = $this->product->updateProduct($form_data);
        }

        if($send_form){
            $this->session->set_flashdata('mensagem', array('success','Detail Produk Berhasil Berhasil!'));
            redirect('product');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Tidak ada yang diubah!'));
            redirect("product/form/$id");
        }
    }

    public function delete($id)
    {
        $delete = $this->product->deleteProduct($id);
        if($delete){
            $this->session->set_flashdata('mensagem', array('success','Produk berhasil dihapus!'));
            redirect('product');
        }
        else
        {
            $this->session->set_flashdata('mensagem', array('danger','Ops! Produk tidak ada!'));
            redirect('product');
        }
    }
}
