<div class="page-header">
    <h1>Login</h1>
</div>
<div class="row">
    <div class="col-md-4">
        <?php if ($_POST) include 'aksi.php'; ?>
        <form class="form-signin" action="?m=login" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" autofocus />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="inputPassword" class="form-control" name="pass" />
            </div>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
        </form>
    </div>
</div>