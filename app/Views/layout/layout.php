<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Media Pembelajaran</title>
    <!-- import bootstrap-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css')?>">
    <script type="text/javascript" src="<?php echo base_url('js/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/bootstrap.bundle.js')?>"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url('/')?>">
                <img src="<?php echo base_url('img/logoutama.png')?>" width="30" height="30" alt="GinantakaCode">
                <b>Kuli</b>Kode
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target=".modalAbout" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target=".modalContact" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target=".modalProfil" href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content')?>

 <!-- Footer -->
        <bockquote class="blockquote text-center">
            <p class="lead" style="font-size:13pt;">Made by <span class="heart">&hearts;</span> yayakyogi - Pemrograman Dekstop</p>
        </blockqoute>

        <!-- Modal -->
        <div class="modal fade modalAbout" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>About</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <p class="lead" style="text-align:justify;">WEB ini dibangun dengan tujuan untuk digunakan sebagai media pembelajaran <b>Pemrograman Dekstop</b>.
                                    Didalam pembelajaran nanti akan dijelaskan apa saja yang perlu diperhatikan dalam membuat suatu aplikasi berbasis dekstop, 
                                     mulai dari dasar penggunaan Text Editor, aplikasi tambahan seperti .NET Framework sampai dengan tools yang dibutuhkan untuk membuat suatu aplikasi berbasis Dekstop.
                                </p>
                                <p class="lead" style="text-align:justify;">Tujuan akhir dari pembelajaran ini adalah agar siswa bisa mengetahui cara membuat aplikasi dekstop (GUI) dengan cara-cara yang sudah dijelaskan 
                                    di pembelajaran ini, dan dipilihya media pembelajaran berbasis WEB ini adalah agar siswa bisa mengakses semua materi kapanpun, baik melalui laptop ataupun melalui smartphone masing-masing
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Contact -->
        <div class="modal fade modalContact" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Contact</h3>
                    </div>
                    <div class="modal-body">
                        <p class="fa fa-id-card"> Author : Yayak Yogi Ginantaka</p>
                        <p class="fa fa-address-book"> WhatsApp : 082233863080</p>
                        <p class="fa fa-envelope"> Email : yayaktaka@gmail.com</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Profil -->
        <div class="modal fade modalProfil" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Profile</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-4">
                                <img src="<?php echo base_url('/img/profil.jpg')?>" class="img img-fluid img-profil" alt="profil">
                            </div>
                            <div class=" col-md-8 col-sm-12 col-xs-8">
                                <br>
                                <h4 class="about-me">About Me</h4>
                                <p class="lead" style="text-align:justify;">
                                    Assalamualaikum Wr Wb, perkenalkan nama saya Yayak Yogi Ginantaka, saya merupakan salah satu mahasiswa di <b>Universitas Bhinneka PGRI Tulungagung</b>, 
                                    saya berasal dari Program Studi <b>Pendidikan Teknologi Informasi</b> semester 5. Website ini merupakan project saya untuk memenuhi Tugas Akhir dari mata kuliah Media Pembelajaran.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
</body>
<script type="text/javascript">
$(document).ready(function(){ 
    $("#back").click(function(){
        $("html,head").animate({
            scrollTop:0
        },900);
    });
});
</script>
</html>