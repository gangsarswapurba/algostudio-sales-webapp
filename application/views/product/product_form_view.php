<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="id-ID">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>
<div class="container container-person mt-5 p-5 shadow">
    <?=write_message()?>
    <?php
    $action_form = '/product/save/';
    if(isset($product) && $product){
        foreach ($product as $produto);
        $action_form = $action_form.$produto->id ?>
        <h1>Edit Produk: <?= $produto->nome ?></h1>
    <?php } else { ?>
        <h1>Tambah Produk Baru</h1>
    <?php } ?>
    <form id="form_product" method="post" enctype="multipart/form-data" action="<?=site_url($action_form)?>">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="nome">Nama *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nama" required value="<?= (isset($produto) ? $produto->nome : '') ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="sku">SKU *</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" required value="<?= (isset($produto) ? $produto->sku : '') ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="preco">Harga *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="preco" name="preco" placeholder="0" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" aria-describedby="inputGroupPrepend" required value="<?= (isset($produto) ? $produto->preco : '') ?>">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="descricao">Deskripsi</label>
                <textarea class="form-control" id="descricao" name="descricao" placeholder=""><?= (isset($produto) ? htmlspecialchars($produto->descricao) : '') ?></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
        <?= (isset($produto) ? '<a href="#" data-id="'.base_url('product/delete/'.$produto->id).'" class="btn btn-danger delete-product" data-toggle="modal" data-target="#deleteProductModal">Hapus</a>' : '') ?>
    </form>
</div>
<?php $this->load->view('_partials/product/delete_product_confirm_modal'); ?>
<?php $this->load->view('_partials/scripts'); ?>
<?php $this->load->view('_partials/footer'); ?>
</body>

</html>
