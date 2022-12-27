<div class="col-sm-12 color-pink">
    <p class="entry-summary hidden">Sistem pakar diagnosa Gangguan Menstruasi metode Naive Bayes</p>
    
    <?php
    if(_session('login')) {
        if ($_SESSION['akses'] == '1') { ?>
            <div class="page-header">
                <h1>Selamat Datang</h1>
            </div>
            <span class="glyphicon glyphicon-alert" style="color: red;"></span><h4>
            <strong>MOHON DIBACA!</strong></h4></br>
            <p>
                Sebelum memulai <strong>Konsultasi</strong>, pahami langkah-langkah berikut lalu klik tombol <strong>"Konsultasi"</strong> dibawah untuk mulai: </br></br>
            </p>
            <li>
                <ol><strong>1.</strong> Pilih gejala-gejala sesuai yang dialami</ol>
                <ol><strong>2.</strong> Scroll kebawah lalu Klik tombol <strong>Submit Diagnosa</strong></ol>
                <ol><strong>3.</strong> Scroll kebawah untuk mendapatkan hasil diagnosa dari sistem</ol>
                <ol><strong>4.</strong> Klik tombol <strong>Survey</strong>, untuk melakukan survey</ol>
            </li></br>
                <a class="btn btn-primary" href="?m=konsultasi"><span class="glyphicon glyphicon-check"></span> Konsultasi</a>
        </br><sub><i><strong>Disclaimer</strong></i> : Hasil konsultasi dari sistem adalah berupa Diagnosa Awal. Untuk penanganan lebih lanjut silahkan datang ke dokter.</sub>
            </br></br>
            <li>
                <ol>Anda dapat cek kembali hasil diagnosa pada menu <strong>"History"</strong> dengan cara menuju menu dropdown <span class="glyphicon glyphicon-menu-hamburger"></span> pada pojok kanan atas</ol>
                <ol>Terimakasih telah memakai sistem untuk konsultasi diagnosa awal gangguan menstruasi</ol>
            </li>
    <?php
        }
    } elseif(!_session('login')) { ?>
        <p>
            <span class="glyphicon glyphicon-alert"></span> <strong>MOHON DIBACA!</strong></br>
            Silahkan melakukan pendaftaran sebelum memakai sistem. Berikut adalah langkah-langkahnya: </br></br>
        </p>
        <li>
            <ol><strong>1.</strong> Apabila menggunakan Handphone, klik menu dropdown <span class="glyphicon glyphicon-menu-hamburger"></span> pada pojok kanan atas </ol>
            <ol><strong>2.</strong> Pilih menu <strong>"Sign Up"</strong>, isi data diri Anda dan pilih <strong>Daftar</strong></ol>
            <ol><strong>3. Login</strong> dengan email dan password yang telah dibuat </ol>
        </li>
    <?php
    } elseif(_session('login')) {
        if ($_SESSION['akses'] == '0') { ?>
            <div class="page-header">
                <h1>Selamat Datang Admin!</h1>
            </div>
    <?php    
        }
    }
    ?>
    <hr>
    <div class="text-justify">
        <p style="background-color:antiquewhite; padding:10px;">
            Wanita yang telah memasuki usia pubertas akan mengalami proses keluarnya darah dan jaringan mukosa secara teratur dari lapisan dalam rahim melalui vagina atau keadaan ini sering disebut dengan menstruasi. Menurut <strong>dr. I Putu Gde Wardhiana Sp.OG (K)</strong>, menstruasi adalah proses hormonal pada wanita yang terjadi secara harmonis antara hormon estrogen dan progesteron. Beberapa faktor yang menyebabkan menstruasi seperti ovarium, uterus, hipotalamus, hipofise serta faktor lainnya di luar organ reproduksi. Sehingga dapat dibayangkan penyebab gangguan menstruasi sangat banyak dan bervariasi.
            </br></br>
            Sistem ini adalah Sistem Pakar (<i>Expert System</i>) yang dapat meniru kemampuan dari seorang ahli/pakar. Sistem pakar tidak berarti menggantikan peran manusia dalam pengambilan keputusan, tetapi bertujuan untuk membantu aktivitas para ahli sebagai asisten yang cerdas untuk diagnosa/anamnesis awal.
        </p>
    </div>
</div>