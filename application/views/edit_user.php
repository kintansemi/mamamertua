<!-- Content Header (Page header) -->
<aside class="right-side">  
<section class="content-header">
   <h1>
       Tambah Menu
       <small></small>
   </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Owner</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?= form_open('panel/edit_user') ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nama">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" value="<?= $owner->username?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan">Password Baru</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" name="edit" value="edit" class="btn btn-primary">Submit</button>
                                    </div>
                                <?= form_close() ?>
                            </div><!-- /.box -->
                            </div>

                             <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Kasir</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?= form_open('panel/edit_user') ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nama">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" value="<?= $kasir->username?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan">Password Baru</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" name="edit" value="edit" class="btn btn-primary">Submit</button>
                                    </div>
                                <?= form_close() ?>
                            </div><!-- /.box -->
                            </div>

                            <div>
                </section>