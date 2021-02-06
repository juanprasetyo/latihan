<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit User Mirroring <br>
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
                        <button type="button" class="btn btn-default btn-sm btn-add-admin" style="float:right;margin-right:1%;margin-top:-0.5%;" title="Add New Admin">
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
                            <table id="tbl_list_admin" class="table table-bordered pb-5" style="width: 100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>
                                            <center>No</center>
                                        </th>
                                        <th>
                                            <center>ID Admin</center>
                                        </th>
                                        <th>
                                            <center>ID Buyer</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="body_list_admin">
                                </tbody>
                            </table>
                            <div class="panel-footer">
                                <div class=" pull-left">
                                    <button type="button" class="btn btn-default btn-sm btn-add-admin" title="Add New Admin">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <br><br><br>
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <button type="button" class="btn btn-default btn-sm btn-add-koor" style="float:right;margin-right:1%;margin-top:-0.5%;" title="Add New Admin">
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
                            <table id="tbl_list_koor" class="table table-bordered pt-5" style="width: 100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>
                                            <center>No</center>
                                        </th>
                                        <th>
                                            <center>ID Koordinator</center>
                                        </th>
                                        <th>
                                            <center>ID Buyer</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="body_list_koor">
                                </tbody>
                            </table>
                            <div class="panel-footer">
                                <div class=" pull-left">
                                    <button type="button" class="btn btn-default btn-sm btn-add-koor" title="Add New koor">
                                        <i class="fa fa-plus"></i>
                                    </button>
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
    <div class="modal fade" id="modalAddAdmin" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Admin</h4>
                </div>
                <form id="form-add-admin">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputAddIdAdmin">ID Admin</label>
                            <input type="text" class="form-control" required id="inputAddIdAdmin" name="inputAddIdAdmin">
                        </div>
                        <div class="form-group">
                            <label for="inputAddIdBuyer">ID Buyer</label>
                            <input type="text" class="form-control" required id="inputAddIdBuyer" name="inputAddIdBuyer">
                            <small>*Jika Buyer lebih dari 1 pisahkan dengan tanda koma (,)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-submit-add-admin">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddKoor" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Koordinator</h4>
                </div>
                <form id="form-add-koor">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputAddIdKoor">ID Koor</label>
                            <input type="text" class="form-control" required id="inputAddIdKoor" name="inputAddIdKoor">
                        </div>
                        <div class="form-group">
                            <label for="inputAddIdBuyer">ID Buyer</label>
                            <input type="text" class="form-control" required id="inputAddIdBuyer" name="inputAddIdBuyer">
                            <small>*Jika Buyer lebih dari 1 pisahkan dengan tanda koma (,)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-submit-add-koor">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditAdmin" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data Admin</h4>
                </div>
                <form id="form-edit-admin">
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="inputEditIdAdmin">ID Admin</label>
                            <input type="text" class="form-control" required id="inputEditIdAdmin" name="inputEditIdAdmin">
                        </div>
                        <div class="form-group">
                            <label for="inputEditIdBuyer">ID Buyer</label>
                            <input type="text" class="form-control" required id="inputEditIdBuyer" name="inputEditIdBuyer">
                            <small>*Jika Buyer lebih dari 1 pisahkan dengan tanda koma (,)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-submit-edit-admin">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditKoor" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data Koordinator</h4>
                </div>
                <form id="form-edit-koor">
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="inputEditIdKoor">ID Koordinator</label>
                            <input type="text" class="form-control" required id="inputEditIdKoor" name="inputEditIdKoor">
                        </div>
                        <div class="form-group">
                            <label for="inputEditIdBuyer">ID Buyer</label>
                            <input type="text" class="form-control" required id="inputEditIdBuyer" name="inputEditIdBuyer">
                            <small>*Jika Buyer lebih dari 1 pisahkan dengan tanda koma (,)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-submit-edit-koor">Save Changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>