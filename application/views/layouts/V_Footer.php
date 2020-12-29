 <!-- Main Footer -->
 <footer class="main-footer">
     <!-- To the right -->
     <div class="pull-right hidden-xs">
         Anything you want
     </div>
     <!-- Default to the left -->
     <strong>Copyright &copy; <?= Date(
     	'Y'
     ) ?> <a href="#">Company</a>.</strong> All rights reserved.
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Create the tabs -->
     <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
         <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
     </ul>
     <!-- Tab panes -->
     <div class="tab-content">
         <!-- Home tab content -->
         <div class="tab-pane active" id="control-sidebar-home-tab">
             <h3 class="control-sidebar-heading">Recent Activity</h3>
             <ul class="control-sidebar-menu">
                 <li>
                     <a href="javascript:;">
                         <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                         <div class="menu-info">
                             <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                             <p>Will be 23 on April 24th</p>
                         </div>
                     </a>
                 </li>
             </ul>
             <!-- /.control-sidebar-menu -->

             <h3 class="control-sidebar-heading">Tasks Progress</h3>
             <ul class="control-sidebar-menu">
                 <li>
                     <a href="javascript:;">
                         <h4 class="control-sidebar-subheading">
                             Custom Template Design
                             <span class="pull-right-container">
                                 <span class="label label-danger pull-right">70%</span>
                             </span>
                         </h4>

                         <div class="progress progress-xxs">
                             <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                         </div>
                     </a>
                 </li>
             </ul>
             <!-- /.control-sidebar-menu -->

         </div>
         <!-- /.tab-pane -->
         <!-- Stats tab content -->
         <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
         <!-- /.tab-pane -->
         <!-- Settings tab content -->
         <div class="tab-pane" id="control-sidebar-settings-tab">
             <form method="post">
                 <h3 class="control-sidebar-heading">General Settings</h3>

                 <div class="form-group">
                     <label class="control-sidebar-subheading">
                         Report panel usage
                         <input type="checkbox" class="pull-right" checked>
                     </label>

                     <p>
                         Some information about this general settings option
                     </p>
                 </div>
                 <!-- /.form-group -->
             </form>
         </div>
         <!-- /.tab-pane -->
     </div>
 </aside>
 <!-- /.control-sidebar -->
 <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED JS SCRIPTS -->
 <script>
const baseurl = "<?= base_url() ?>";
 </script>
 <!-- jQuery 3 -->
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/jquery/dist/jquery-3.5.1.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net/js/buttons.print.min.js"></script>
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net/js/buttons.flash.min.js"></script>
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net/js/jszip.min.js"></script>
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net/js/pdfmake.min.js"></script>
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net/js/vfs_fonts.js"></script>
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net/js/buttons.html5.min.js"></script>
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/datatables.net/js/buttons.print.min.js"></script>
 <!-- Sweetalert 2 -->
 <script src="<?= base_url('assets/sweetalert2/') ?>dist/sweetalert2.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.min.js"></script>
 <!-- SlimScroll -->
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/fastclick/lib/fastclick.js"></script>
 <!-- bootstrap datepicker -->
 <script src="<?= base_url('assets/adminlte/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!-- Select 2 -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
 <!-- Custom js -->
 <script>
$(document).ready(() => {
    // Preloader
    $("#spinningSquaresG").fadeOut();

    // Tabel user menggunakan plugin DataTabels
    const tblUser = $('#tbl-user').DataTable({
        processing: true,
        serverSide: true,
        order: [],
        dom: "Blfrtip",
        buttons: [{
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-danger',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
                titleAttr: 'Export to PDF'
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-success',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
                titleAttr: 'Export to Excel'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                className: 'btn',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
                titleAttr: 'Print Table'
            }
        ],
        ajax: {
            url: baseurl + "userGet",
            type: "POST"
        },
        columnDefs: [{
            "target": [4],
            "orderable": false
        }, ]
    });
    // tblUser.on('order.dt search.dt', function() {
    //     tblUser.column(0, {
    //         search: 'applied',
    //         order: 'applied'
    //     }).nodes().each(function(cell, i) {
    //         cell.innerHTML = `<center>${i + 1}</center>`;
    //     });
    // }).draw();

    const swal = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr'
        },
        buttonsStyling: false
    })

    // Hapus data dari table & db
    $('#tbl-user tbody').on('click', '.btn-del-data', function() {
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            console.log(result)
            if (result.isConfirmed) {
                console.log($('.btn-del-data').attr('data-id'))
                $.ajax({
                    method: "POST",
                    type: "JSON",
                    url: baseurl + "delete",
                    data: {
                        id: $(this).attr('data-id')
                    }
                }).done(() => {
                    tblUser
                        .row($(this).parents('tr'))
                        .remove()
                        .draw();
                })
                swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swal.fire(
                    'Cancelled',
                    'Your imaginary file is safe :',
                    'error'
                )
            }
        })
    })

    // Preview Image before update
    function readUrl(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#foto-profile').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0])
        }
    }
    $('#profile-image').change(function(e) {
        readUrl(this);
    })

    // Edit data
    $('#form-edit').on('click', '.btn-update', function() {
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    type: "JSON",
                    url: baseurl + "saveEdit",
                    data: {
                        id: $('.btn-update').attr('data-id'),
                        name: $('input[name="name"]').val(),
                        email: $('input[name="email"]').val(),
                        address: $('input[name="address"]').val()
                    },
                }).done(() => {
                    swal.fire('Updated', 'Your data has been updated', 'success')
                        .then(() => {
                            window.location.href = baseurl + "admin";
                        })
                })
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swal.fire(
                    'Cancelled',
                    'Your data not save',
                    'error'
                )
            }
        })
    });

    // Datepicker
    $('#inputDate').datepicker('setDate', '10/05/2020')
});
 </script>

 <!-- Custom Js -->
 <script src="<?= base_url('assets/js/databarang.js') ?>"></script>

 </body>

 </html>