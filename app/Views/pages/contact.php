
    <?php echo $this->extend('layouts/template');?>
    
    
    <?php echo $this->section('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
            <h2>Contact</h2>

            <?php foreach($alamat as $almt) : ?>
                <ul>
                    <li><?php echo $almt['tipe'];?></li>
                    <li><?php echo $almt['alamat'];?></li>
                    <li><?php echo $almt['kota'];?></li>
                </ul>
            <?php endforeach; ?>
            
            </div>
        </div>
    </div>
    <?php echo $this->endSection(); ?>
