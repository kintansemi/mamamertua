<div class="form-box" id="login-box">
    <div class="header">Sign In</div>
    <?= form_open('login') ?>
        <div class="body bg-gray">
            <?= $this->session->flashdata('msg') ?>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="User ID"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password"/>
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block" name="masuk" value="masuk">Masuk</button>
        </div>
    <?= form_close() ?>
</div>
