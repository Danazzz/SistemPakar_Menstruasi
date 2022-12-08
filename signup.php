<div class="page-header">
    <h1>Sign Up</h1>
</div>
<div class="row">
    <div class="col-md-4">
        <sub><strong>Mohon isi dengan biodata asli Anda </strong></sub>
        <?php if ($_POST) include 'aksi.php'; ?>
        <form class="form-signin" action="?m=signup" method="post">
            <div class="form-group">
                <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="user" autofocus required/>
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" required/>
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input type="password" id="inputPassword" class="form-control" name="pass1" required/>
            </div>
            <div class="form-group">
                <label>Confirm Password <span class="text-danger">*</span></label>
                <input type="password" id="inputPassword" class="form-control" name="pass2" required/>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tgl" required/>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                <div>
                    <label class="radio-inline">
                        <input type="radio" name="jkel" id="jkelL" value="L"> Laki - laki
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="jkel" id="jkelP" value="P"> Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Pekerjaan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="pekerjaan" required/>
            </div>
            <div class="form-group">
                <label>Kota Asal <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="kota" required/>
            </div>

            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-log-in"></span> Daftar</button>
        </form>
    </div>
</div>