<?= $this->extend('layout\layout')?>
<?= $this->section('content')?>
    <!-- Content -->
    <div class="isi">
            <div class="jumbotron bg-dark">
                <center>
                    <br><br>
                    <h2 class="text-light">Selamat Datang di <b>Kuli</b>Kode</h2>
                    <p class="lead text-light">Media pembelajaran berbasis WEB untuk siapapun yang ingin belajar membuat aplikasi dekstop</p><br><br>
                    <p><a href="<?php echo base_url('login')?>" class="btn btn-primary btn-lg">Login</a> 
                    <a href="/home/modul" class="btn btn-success btn-lg">Modul</a></p>
                </center>
            </div>
        </div>
        <div class="jumbotron bg-light">
            <center>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <img class="img-fluid" src="<?php echo base_url('img/komputer.jpg')?>" alt="komputer">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h4 style="text-align:left;">Pemrograman Dekstop</h4><br>
                        <p class="lead" style="text-align:justify;">
                            Pemrograman Dekstop dibagi menjadi 3 yaitu .Net, Java dan Delphi. Bahasa pemrograman .Net sendiri ada beberapa jenis yaitu Visual Basic (VB), C++ dan C Sharp. 
                            Tiap bahasa pemrograman memiliki kelebihannya masing-masing. Didalam pembelajaran ini akan dibahas pembuatan aplikasi dekstop menggunakan Bahasa 
                            pemrograman <b>C Sharp</b>. C Sharp merupakan bahasa pemrograman yang berorientasi objek yang dikembangkan oleh Microsoft sebagai bagian dari inisiatif kerangka .NET Framework. 
                            Bahasa C# dibuat berbasiskan bahasa C++ yang telah dipengaruhi oleh aspek-aspek ataupun fitur bahasa yang terdapat pada bahasa-bahasa pemrograman lainnya seperti Java, Delphi, VB dan lain-lain
                            dengan beberapa penyederhanaan. 
                        </p>
                    </div>
                </div>
            </center>
        </div><!-- ./jumbotron-->
        <br>
        <center><a class="btn btn-primary btn-md" style="color:white;" id="back">Back to top</a></center><br>
<?= $this->endSection()?>