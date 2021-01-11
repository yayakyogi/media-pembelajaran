<?= $this->extend('layout\layout')?>
<?= $this->section('content')?>
<br>
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Materi</h4>
                </div>
                <div class="card-body">
                    <form action="/dashboardcontroller/update" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="materi_id" value="<?php echo $post['materi_id']?>">
                        <div class="form-group">
                            <label>Nama Materi</label>
                            <input type="text" name="materi_name" class="form-control" value="<?php echo $post['materi_name']?>">
                        </div>
                        <div class="form-group">
                            <label>Gambar Thumbnail</label><br>
                            <img src="<?php echo base_url('upload-file/img-thumbnail/'.$post['materi_img'])?>" height="70">
                            <input type="file" name="materi_img" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Modul</label><br>
                            <a href="<?php echo base_url('upload-file/modul/'.$post['materi_file'])?>" class="btn btn-info btn-sm"><?= $post['materi_file']?></a>
                            <input type="file" name="materi_file" class="form-control">
                        </div><br>
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="/dashboardcontroller" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div><!--./card-->
        </div>
    </div><!--./row-->
</div><!--./container-->
<?= $this->endsection()?>