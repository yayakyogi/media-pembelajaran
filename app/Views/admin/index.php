<?= $this->extend('layout\layout')?>
<?= $this->section('content')?>
<br>
<div class="container mt-5">
<?php session()->user_name;?></b>
    <div class="card">
        <div class="card-header">
            <h3>Daftar Materi</h3>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#addModal">Tambah Materi</button>
            <a href="/register" class="btn btn-primary btn-sm mb-2">Tambah Akun</a>
            <?php if(!empty(session()->getFlashdata('message'))):?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('message')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif(!empty(session()->getFlashdata('message-error'))): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('message-error');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th width="2%">No</th>
                        <th>Nama Materi</th>
                        <th class="text-center">Gambar Thumbnail</th>
                        <th class="text-center">Modul</th>
                        <th>Upload</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php foreach($materi as $row):?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $row->materi_name;?></td>
                            <td class="text-center"><img src="<?php echo base_url('upload-file/img-thumbnail/'.$row->materi_img)?>" height="100"></td>
                            <td class="text-center"><a class="btn btn-info btn-sm" href="upload-file/modul/<?= $row->materi_file;?>"> Lihat</a></td>
                            <td><?= $row->materi_created_at;?></td>
                            <td>
                                <a href="<?php echo base_url('dashboardcontroller/edit/'.$row->materi_id)?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->materi_id;?>" data-name="<?= $row->materi_name;?>" data-img="<?= $row->materi_img;?>">Hapus</a> 
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div><!--./table-responsive-->
        </div><!--./ card-body-->
        <div class="card-footer">
            <a href="/logincontroller/logout" class="btn btn-danger btn-md"> Logout</a>
        </div>
    </div><!--./card-->
</div><!--./container-->
<!-- Modal Add Akun-->
<form action="registercontroller/save" method="POST">
    <div class="modal fade" id="addAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="ture">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Nama lengkap">
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email anda">
            </div>
            <div class="form-group">
                <label class="form=label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter">
            </div>
            <div class="form-group">
                <label class="form-label">Konfirmasi password</label>
                <input type="password" name="confpassword" class="form-control" placeholder="Minimal 6 karakter">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </div><!--./modal-content-->
    </div><!--./modal dialog-->
    </div><!--./modal fade-->
</form>

<!-- Modal Add Product -->
<form action="/dashboardcontroller/save" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Materi</label>
                    <input type="text" class="form-control" name="materi_name" placeholder="Judul Materi">
                </div>
                <div class="form-group">
                    <label>Upload Gambar Thumbnail</label>
                    <input type="file" class="form-control" name="materi_img">
                </div>  
                <div class="form-group">
                    <label>Upload Modul</label>
                    <input type="file" class="form-control" name="materi_file">
                </div>
            </div><!--./modal-body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div><!--./modal-content-->
    </div><!--.?modal-dialog-->
    </div><!--./modal fade-->
</form>
<!--./ End Modal Tambah Materi-->

<form action="/dashboardcontroller/delete" method="POST">
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exmpleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="ducument">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="lead">Anda yaking ingin menghapus data ini?</p>
                <h5 class="text-center" id="materi_name"></h5>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="materi_id" name="materi_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </div><!--./modal-content-->
    </div><!--./modal-dialog-->
    </div><!--./modal fade-->
</form>
<!--./ End Modal Delete-->

<script>
    $(document).ready(function(){
        $('.btn-delete').on('click',function(){
            const id = $(this).data('id');
            const name = $(this).data('name');
            $('.materi_id').val(id);
            var div = document.getElementById('materi_name');
            var content = name;
            div.innerHTML=content;
            $('#hapusModal').modal('show');
        })
    });
</script>
<?= $this->endsection();?>