<?= $this->extend('layout/layout')?>
<?= $this->section('content')?>
<br>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Modul</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach($post as $row):?>
                <div class="col-md-3 col-sm-12">
                    <div class="card text-black bg-light mb-3">
                        <img class="img-top img-thumbnail" src="<?php echo base_url('upload-file/img-thumbnail/'.$row->materi_img)?>" alt="<?= $row->materi_img;?>">
                        <div class="card-body">
                            <p class="lead"><?= $row->materi_name;?></p>
                            <a class="btn btn-primary btn-block" href="<?php echo base_url('upload-file/modul/'.$row->materi_file)?>">Download</a>
                        </div> 
                    </div>
                </div>
                <?php endforeach ?>
            </div><!--./row-->
        </div><!--./card-body-->
    </div><!-- ./card -->
</div>
<br>
<!-- footer-->
<center>
    <a class="btn btn-primary btn-md" style="color:white;" id="back">Back to top</a>
</center><br>
<?= $this->endSection();