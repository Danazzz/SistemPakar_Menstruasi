<div class="page-header">
    <h1>Sign Up</h1>
</div>
<div class="row">
    <div class="col-md-4">
        <?php if ($_POST) include 'aksi.php'; ?>
        <form class="form-signin" action="?m=signup" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="user" autofocus required/>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" required/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="inputPassword" class="form-control" name="pass" required/>
            </div>
            <hr>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl" required/>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
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
                <label>Kota Asal</label>
                <input type="text" class="form-control" name="kota" required/>
            </div>

            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-log-in"></span> Daftar</button>
        </form>
    </div>
</div>