<?= $this->extend('layout\layout')?>
<?= $this->section('content')?>
<br>
<div class="wrapper mt-5">
    <div class="card border-form">
        <div class="card-header">
            <h5>Media Pembelajaran</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <center><img src="<?php echo base_url('img/logo.png')?>" class="img-fluid"></center> 
                </div>
                <div class="col-md-6 col-sm-12">
                    <form action="/logincontroller/auth?>" method="POST">
                        <?php if(!empty(session()->getFlashdata('msg'))):?>
                            <div class="alert alert-danger">
                                <?php echo session()->getFlashdata('msg')?>
                            </div>
                        <?php endif?>
                        <h5 class="judul-form">Login</h5>
                        <div class="form-group">    
                            <label for="email">Username</label>
                            <input type="text" class="form-control" name="email" placeholder="Username">
                        </div>
                        <div class="form-group">    
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" value="LOGIN"><br>
                    </form>
                </div><!-- col md-->
            </div><!-- row -->
        </div><!-- card body-->
    </div><!-- card -->
</div><!--./container-->
<br>
<?= $this->endSection()?>