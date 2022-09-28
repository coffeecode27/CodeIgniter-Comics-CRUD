<?php echo $this->extend('layouts/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?php echo $komik['sampul']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $komik['judul']; ?></h5>
                            <p class="card-text"><b>Penulis :</b> <?php echo $komik['penulis']; ?> </p>
                            <p class="card-text"><small class="text-muted"><b>Penerbit : </b><?php echo $komik['penerbit']; ?></small></p>

                            <a href="/komik/edit/<?php echo $komik['slug'];?>" class="btn btn-warning">Edit</a>

                            <form action="/komik/<?php echo $komik['id'];?>" class="d-inline" method="post">
                            <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                        
                            </form>

                            <a href="/komik" class="d-block mt-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>