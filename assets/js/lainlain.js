$(document).ready(function () {
    const showUserAdmin = () => {
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: baseurl + "getUserAdmin",
            async: false
        }).done(response => {
            console.log(response);
            let adminHtml = '';
            let i = 1;
            response.forEach(admin => {
                adminHtml += /* html */ `
                                <tr>
                                    <td><center>${i}</center></td>
                                    <td><center>${admin.id_admin}</center></td>
                                    <td><center>${admin.id_buyer}</center></td>
                                    <td>
                                        <center>
                                            <button type="button" id="${admin.id}" class="btn btn-success btn-edit-admin"><i class="fa fw fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-del-admin" data-id="${admin.id}"><i class="fa fw fa-trash"></i></button>
                                        </center>
                                    </td>
                                </tr>
                                `;
                i++;
            });

            $('.body_list_admin').html(adminHtml);
        })
    }

    const showUserKoor = () => {
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: baseurl + "getUserKoor",
            async: false
        }).done(response => {
            let koorHtml = '';
            let i = 1;
            response.forEach(koor => {
                koorHtml += /* html */ `
                                <tr>
                                    <td><center>${i}</center></td>
                                    <td><center>${koor.id_koor}</center></td>
                                    <td><center>${koor.id_buyer}</center></td>
                                    <td>
                                        <center>
                                            <button type="button" id="${koor.id}" class="btn btn-success btn-edit-koor"><i class="fa fw fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-del-koor" data-id="${koor.id}"><i class="fa fw fa-trash"></i></button>
                                        </center>
                                    </td>
                                </tr>
                            `;
                i++;
            })

            $('.body_list_koor').html(koorHtml);
        })
    }

    if (window.location.href.includes('editMirroring')) {
        showUserAdmin();
        showUserKoor();
    }

    const tblListAdmin = $('#tbl_list_admin').DataTable({
        paging: false,
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: 0 },
            { responsivePriority: 4, targets: 3 }
        ]
    });
    const tblListKoor = $('#tbl_list_koor').DataTable({
        paging: false,
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: 0 },
            { responsivePriority: 4, targets: 3 }
        ]
    });

    tblListAdmin.on('order.dt search.dt', function () {
        tblListAdmin.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = `<center>${i + 1}</center>`;
        });
    }).draw();

    tblListKoor.on('order.dt search.dt', function () {
        tblListKoor.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = `<center>${i + 1}</center>`;
        });
    }).draw();

    // Menambahkan Admin Po
    $(document).on('click', '.btn-add-admin', function () {
        $('#modalAddAdmin').modal('show');

        $('body').on('click', '.btn-submit-add-admin', function () {
            let adminId = $('#modalAddAdmin').find('[name="inputAddIdAdmin"]').val();
            let buyerId = $('#modalAddAdmin').find('[name="inputAddIdBuyer"]').val().replace(/\s/g, '');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menambahkan admin Po!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, tambah!'
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($('#modalAddAdmin').find('[required = ""]').map((i, v) => $(v).val()).toArray().includes("")) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Mohon isi semua input!',
                        })
                    } else {
                        $.ajax({
                            type: "POST",
                            dataType: "JSON",
                            url: baseurl + "addUserAdmin",
                            data: {
                                'adminId': adminId,
                                'buyerId': buyerId
                            }
                        }).done((response) => {
                            console.log(response);
                            if (response == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Horee...',
                                    text: 'Admin Po telah ditambahkan!',
                                }).then(() => {
                                    $('#modalAddAdmin').modal('hide');
                                    location.reload()
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan!',
                                })
                            }
                        })
                    }
                }
            })
        })
    })

    // Edit Admin Po
    $(document).on('click', '.btn-edit-admin', function () {
        $('#modalEditAdmin').modal('show');
        let id = $(this).attr('id');
        let idAdmin = $(this).parents('tr').find('td:nth-child(2)').text();
        let idBuyer = $(this).parents('tr').find('td:nth-child(3)').text();

        $('#modalEditAdmin').find('[name="id"]').val(id);
        $('#modalEditAdmin').find('[name="inputEditIdAdmin"]').val(idAdmin);
        $('#modalEditAdmin').find('[name="inputEditIdBuyer"]').val(idBuyer);

        $('body').on('click', '.btn-submit-edit-admin', function () {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data admin Po akan diupdate!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, update!'
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($('#modalEditAdmin').find('[required = ""]').map((i, v) => $(v).val()).toArray().includes("")) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Mohon isi semua input!',
                        })
                    } else {
                        $.ajax({
                            type: "POST",
                            dataType: "JSON",
                            url: baseurl + "editUserAdmin",
                            data: {
                                'id': $('#modalEditAdmin').find('[name="id"]').val(),
                                'adminId': $('#modalEditAdmin').find('[name="inputEditIdAdmin"]').val(),
                                'buyerId': $('#modalEditAdmin').find('[name="inputEditIdBuyer"]').val()
                            }
                        }).done(response => {
                            if (response == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Horee...',
                                    text: 'Data admin Po berhasil di update!',
                                }).then(() => {
                                    $('#modalAddAdmin').modal('hide');
                                    location.reload()
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan!',
                                })
                            }
                        })
                    }
                }
            })
        })
    })

    // Menambahkan koordinator
    $(document).on('click', '.btn-add-koor', function () {
        $('#modalAddKoor').modal('show');

        $('body').on('click', '.btn-submit-add-koor', function () {
            let koorId = $('#modalAddKoor').find('[name="inputAddIdKoor"]').val();
            let buyerId = $('#modalAddKoor').find('[name="inputAddIdBuyer"]').val().replace(/\s/g, '');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menambahkan Koordinator!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, tambahkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($('#modalAddKoor').find('[required = ""]').map((i, v) => $(v).val()).toArray().includes("")) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Mohon isi semua input!',
                        })
                    } else {
                        $.ajax({
                            type: "POST",
                            dataType: "JSON",
                            url: baseurl + "addUserKoor",
                            data: {
                                'koorId': koorId,
                                'buyerId': buyerId
                            }
                        }).done((response) => {
                            console.log(response);
                            if (response == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Horee...',
                                    text: 'Koordinator telah ditambahkan!',
                                }).then(() => {
                                    $('#modalAddKoor').modal('hide');
                                    location.reload()
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan!',
                                })
                            }
                        })
                    }
                }
            })
        })
    })

    // Edit Koordinator
    $(document).on('click', '.btn-edit-koor', function () {
        $('#modalEditKoor').modal('show');

        let id = $(this).attr('id');
        let idKoor = $(this).parents('tr').find('td:nth-child(2)').text();
        let idBuyer = $(this).parents('tr').find('td:nth-child(3)').text();

        $('#modalEditKoor').find('[name="id"]').val(id);
        $('#modalEditKoor').find('[name="inputEditIdKoor"]').val(idKoor);
        $('#modalEditKoor').find('[name="inputEditIdBuyer"]').val(idBuyer);

        $('body').on('click', '.btn-submit-edit-koor', function () {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data koordinator akan diupdate!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, update!'
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($('#modalEditKoor').find('[required=""]').map((i, v) => $(v).val()).toArray().includes("")) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Mohon isi semua input!',
                        })
                    } else {
                        $.ajax({
                            type: "POST",
                            dataType: "JSON",
                            url: baseurl + "editUserKoor",
                            data: {
                                'id': $('#modalEditKoor').find('[name="id"]').val(),
                                'koorId': $('#modalEditKoor').find('[name="inputEditIdKoor"]').val(),
                                'buyerId': $('#modalEditKoor').find('[name="inputEditIdBuyer"]').val()
                            }
                        }).done(response => {
                            if (response == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Horee...',
                                    text: 'Data Koordinator berhasil di update!',
                                }).then(() => {
                                    $('#modalEditKoor').modal('hide');
                                    location.reload();
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan!',
                                })
                            }
                        })
                    }
                }
            })
        })
    })

    // Hapus Admin Po
    $('body').on('click', '.btn-del-admin', function () {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data Admin akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: baseurl + "deleteUserAdmin",
                    data: {
                        'id': $(this).attr('data-id')
                    }
                }).done(response => {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Horee...',
                            text: 'Data admin berhasil dihapus!',
                        }).then(() => {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan!',
                        })
                    }
                })
            }
        })
    })

    // Hapus Koordinator 
    $('body').on('click', '.btn-del-koor', function () {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data Admin akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: baseurl + "deleteUserKoor",
                    data: {
                        'id': $(this).attr('data-id')
                    }
                }).done(response => {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Horee...',
                            text: 'Data koordinator berhasil dihapus!',
                        }).then(() => {
                            location.reload();
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan!',
                        })
                    }
                })
            }
        })
    })


})