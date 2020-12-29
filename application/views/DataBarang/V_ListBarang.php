<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard <br>
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <button type="button" class="btn btn-default btn-sm btn-add-item" style="float:right;margin-right:1%;margin-top:-0.5%;" title="Add New Item">
                            <i class="fa fa-plus"></i>
                        </button>
                        <label for="btn-upload-excel" class="btn btn-default btn-sm btn-upload-excel" style="float:right;margin-right:1%;margin-top:-0.5%;" title="Upload file excel"><i class="fa fa-upload"></i></label>
                        <input type="file" id="btn-upload-excel" hidden style="opacity: 0; position: absolute; z-index: -1;" />
                        <a href="<?= base_url('DataBarang/exportExcel') ?>" class="btn btn-success btn-sm btn-download-excel" style="float:right;margin-right:1%;margin-top:-0.5%;" title="Download file excel">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                    <div class="box-body">
                        <form method="POST" action="<?= base_url('DataBarang/listBarang') ?>">
                            <table id="tbl_list_barang" class="table table-bordered" style="width: 100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>
                                            <center>No</center>
                                        </th>
                                        <th>
                                            <center>Nama Barang</center>
                                        </th>
                                        <th>
                                            <center>Jumlah Barang</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="body_list_barang">
                                </tbody>
                            </table>
                            <div class="panel-footer">
                                <div class=" pull-left">
                                    <button type="button" class="btn btn-default btn-sm btn-add-item" title="Add New Item">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success btn-save-barang">Save Changes</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalEditBarang" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data Barang</h4>
                </div>
                <form id="form-edit-barang">
                    <div class="modal-body">
                        <input type="hidden" name="id-barang">
                        <div class="form-group">
                            <label for="nama-barang">Nama Barang</label>
                            <input type="text" class="form-control" required id="nama-barang" name="nama-barang">
                        </div>
                        <div class="form-group">
                            <label for="jumlah-barang">Jumlah Barang</label>
                            <input type="number" class="form-control" required id="jumlah-barang" name="jumlah-barang">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-submit-edit-barang">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>