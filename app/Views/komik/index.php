<?php echo $this->extend('layouts/template'); ?>


<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/komik/create" class="btn btn-primary mt-3">Tambah Data Komik</a>
            <h2 class="mt-2">Daftar Komik</h2>
            <?php if (session()->getFlashdata('pesan')) : ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($komik as $kmk) : ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><img src="/img/<?php echo $kmk['sampul']; ?>" class="sampul"></td>
                            <td><?php echo $kmk['judul']; ?></td>
                            <td>
                                <a href="/komik/<?php echo $kmk['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>