<?= $this->extend('layout\layout')?>
<?= $this->section('content')?>
<br>
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h3>Form Register</h3>
                </div>
                <div class="card-body">
                    <?php if(isset($validation)):?>
                        <div class="alert alert-danger"><?= $validation->listErrors()?></div>
                    <?php endif;?>
                    <form action="/registercontroller/save" method="POST">
                        <div class="mb-3">
                            <label for="InputForName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="InputForName" value="<?= set_value('name')?>">
                        </div>
                        <div class="mb-3">
                            <label for="InputForEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email')?>">
                        </div>
                        <div class="mb-3">
                            <label for="InputForPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="InputForPassword">
                        </div>
                        <div class="mb-3">
                            <label for="InputForConfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confpassword" class="form-control" id="InputForConfirmPassword">
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Register">
                    </form>
                </div><!--./card-body-->
            </div><!--./card-->
        </div><!--./col-6-->
    </div><!--./row-->
</div><!--./container-->
<?= $this->endsection()?>