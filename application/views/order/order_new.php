<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>
<div class="container container-person mt-5 p-5 shadow">
    <?=write_message()?>
    <?php
    $action_form = '/order/save/';
    if(isset($order) && $order){
        foreach ($order as $pedido);
        $action_form = $action_form.$pedido->id ?>
        <h1>Edit Transaksi: <?= $pedido->id ?></h1>
    <?php } else { ?>
        <h1>Tambah Transaksi Penjualan</h1>
    <?php }
    if($products) { ?>
    <form id="form_make_order" method="post" action="<?=site_url($action_form)?>">
        <?php foreach ($products as $product) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-4"><b>Nama</b></div>
                    <div class="col-sm-3 col-xs-3"><b>SKU</b></div>
                    <div class="col-sm-3 col-xs-3"><b>Harga</b></div>
                    <div class="col-sm-2 col-xs-2"><b>Quantity<sup>*</sup></b></div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-xs-4"><?= $product->nome ?></div>
                    <div class="col-sm-3 col-xs-3"><?= $product->sku ?></div>
                    <div class="col-sm-3 col-xs-3">Rp<?= $product->preco ?></div>
                    <div class="col-sm-2 col-xs-2"><input style="max-width: 6rem;" type="number" id="product[<?=$product->id?>]" name="product[<?=$product->id?>]" step="1" min="0" max="100"
                                                          onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="0"></div>
                </div>
            </div>
        <?php } ?>
        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Tambah</button>
        </div>
        <?php } else { ?>
            <div class="col-sm-12 col-xs-12">Tidak ada produk</div>
        <?php } ?>
</div>
<?php $this->load->view('_partials/scripts'); ?>
<?php $this->load->view('_partials/footer'); ?>
</body>

</html>
