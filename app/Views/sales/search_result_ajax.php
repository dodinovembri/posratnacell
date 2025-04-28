<br><h6>Pilih Produk:</h6>
<ul>
    <?php foreach ($results as $row): ?>
        <a href="<?= base_url('sales/create/' . $row->product_id) ?>"><li style="margin-bottom: 10px;"><?= $row->name ?></li></a>
    <?php endforeach; ?>
</ul>