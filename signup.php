<div class="page-header">
    <h1>Sign Up</h1>
</div>
<div class="row">
    <div class="col-md-4">
        <?php if ($_POST) include 'aksi.php'; ?>
        <form class="form-signin" action="?m=signup" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Username" name="user" autofocus />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" />
            </div>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-log-in"></span> Daftar</button>
        </form>
    </div>
</div>