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
                                    <h3 class="box-title">Data Menu</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?= form_open('panel/menu') ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nama">Kode Menu</label>
                                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode">
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan">Nama Menu</label>
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Menu">
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan">Harga</label>
                                            <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga">
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" name="add" value="add" class="btn btn-primary">Submit</button>
                                    </div>
                                <?= form_close() ?>
                            </div><!-- /.box -->
                            </div>
                            <div>
                </section>