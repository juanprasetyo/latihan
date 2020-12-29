<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin Dashboard <br>
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <a href="<?= base_url('add/') ?>" style="float:right;margin-right:1%;margin-top:-0.5%;" alt="Add New" title="Add New">
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="tbl-user" class="table table-bordered table-hover" style="width: 100%">
                                <thead class="bg-primary">
                                    <tr class="text-center">
                                        <th style="width: 5%">
                                            <center>No</center>
                                        </th>
                                        <th style="width: 20%">
                                            <center>Nama</center>
                                        </th>
                                        <th style="width: 25%">
                                            <center>Email</center>
                                        </th>
                                        <th style="width: 30%">
                                            <center>Alamat</center>
                                        </th>
                                        <th style="width: 20%">
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->