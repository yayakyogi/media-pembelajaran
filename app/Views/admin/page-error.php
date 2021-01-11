<?= $this->extend('layout\layout')?>
<?= $this->section('content')?>
<br>
<div class="container mt-5">
    <div class="jumbotron bg-light">
        <h3>Page Error</h3>
        <?php if(isset($validation)):?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors()?>
            </div>
        <?php endif ?>
        <a href=<?= base_url('dashboardcontroller/edit/'.$id)?> class="btn btn-danger">Back</a>
    </div>
</div>
<?= $this->endsection()?>