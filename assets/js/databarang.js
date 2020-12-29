$(document).ready(function () {
    console.log(baseurl);
    const showBarang = () => {
        $.ajax({
            type: "GET",
            url: baseurl + "DataBarang/getBarang",
            dataType: "JSON",
            async: false
        }).done((response) => {
            var html = '';
            var i;
            for (i = 0; i < response.length; i++) {
                html += `
                <tr>
                    <td style="width: 10%">
                        <center>${i + 1}</center>
                    </td>
                    <td>
                        <center>${response[i].nama_barang}</center>
                    </td>
                    <td>
                        <center>${response[i].jumlah}</center>
                        </td>
                    <td>
                        <center>
                            <button type="button" id-barang="${response[i].id_barang}" data-toggle="modal" data-target="#modalEditBarang" class="btn btn-success btn-edit-barang"><i class="fa fw fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-del-barang" data-id="${response[i].id_barang}"><i class="fa fw fa-trash"></i></button>
                        </center>
                    </td>
                </tr>
            `
            }
            $('.body_list_barang').html(html);
        })
    }
    showBarang();

    // Datatable
    let tblListBarang = $('#tbl_list_barang').DataTable({
        paging: false,
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: 0 },
            { responsivePriority: 4, targets: 3 }
        ]
    });
    // Mengurutkan no ketika di order by no dan di search
    tblListBarang.on('order.dt search.dt', function () {
        tblListBarang.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = `<center>${i + 1}</center>`;
        });
    }).draw();

    // $('#show-selected-barang').DataTable();

    // Add input row and remove input row
    let x = 1;
    $('.btn-add-item').click((e) => {
        e.preventDefault();
        if (x <= 4) {
            x++;
            let no;
            if ($('.body_list_barang').find('tr:last').prev().find('td:first').find('center').html() === undefined) {
                no = $('.body_list_barang').find('tr:last').find('td:first').find('center').html()
            } else {
                no = $('.body_list_barang').find('tr:last').prev().find('td:first').find('center').html()
                no++;
            }
            no++;
            let inputHtml = `
                <tr>
                    <td>
                        <center>${no}</center>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="nama_barang[]" style="width: 100%">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="jumlah_barang[]" style="width: 100%">
                    </td>
                    <td>
                        <center>
                            <button class="btn btn-danger btn_remove_row"><i class="fa fw fa-trash"></i></button>
                        </center>
                    </td>
                </tr>
            `;

            $('.body_list_barang').append(inputHtml)
        }
    })
    $('.body_list_barang').on('click', '.btn_remove_row', function (e) {
        e.preventDefault();
        $(this).parents('tr').remove();
        x--;
    })

    // Tombol edit barang di klik
    $('.btn-edit-barang').click(function (e) {
        e.preventDefault();
        let id = $(this).attr('id-barang'),
            namaBarang = $(this).parents('tr').find("td:nth-child(2)").find('center').html(),
            jumlahBarang = $(this).parents('tr').find("td:nth-child(3)").find('center').html()

        $("[name='id-barang']").val(id);
        $("[name='nama-barang']").val(namaBarang);
        $("[name='jumlah-barang']").val(jumlahBarang);
    })

    $('.btn-submit-edit-barang').click(function (e) {
        e.preventDefault()
        console.log('clik');
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: baseurl + "DataBarang/editBarang",
            data: {
                id_barang: $("[name='id-barang']").val(),
                nama_barang: $("[name='nama-barang']").val(),
                jumlah_barang: $("[name='jumlah-barang']").val()
            }
        }).done(() => {
            showBarang();
            $('#modalEditBarang').modal('hide');
        })
    })

    $('.btn-del-barang').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: baseurl + "DataBarang/delete",
                    data: {
                        id: $(this).attr('data-id')
                    }
                }).done(() => {
                    Swal.fire(
                        'Deleted!',
                        'Your item has been deleted.',
                        'success'
                    ).then(() => {
                        $('#tbl_list_barang').DataTable().row($(this).parents('tr'))
                            .remove()
                            .draw();
                    })
                })
            }
        })
    })


    // Menu cari barang iki js e bener durung
    $('.select-cari-barang').select2({
        minimumInputLength: 1,
        allowClear: true,
        placeholder: "Cari Nama Barang",
        ajax: {
            dataType: "JSON",
            type: "GET",
            url: baseurl + "DataBarang/cariBarang",
            delay: 800,
            data: function (params) {
                return {
                    search: params.term,
                }
            },
            processResults: function (data) {
                return {
                    results: data
                }
            }
        }
    }).on('select2:select', () => {
        let data = $(".select2 option:selected").val();
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: baseurl + "DataBarang/showDataBarang",
            data: {
                id_barang: data
            }
        }).done((response) => {
            let html = /* html */
                `
                    <thead class="bg-primary">
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Nama Barang</center></th>
                            <th><center>Jumlah Barang</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><center>1</center></td>
                            <td><center>${response.nama_barang}</center></td>
                            <td><center>${response.jumlah}</center></td>
                        </tr>
                    </tbody>
            `;
            $('#show-selected-barang').html(html);
        })
    })


    $('#btn-upload-excel').on('change', function () {
        let fileUpload = new FormData();
        fileUpload.append('file_excel', $(this).prop("files")[0]);
        console.log(fileUpload);
        $.ajax({
            method: "POST",
            url: baseurl + 'DaraBarang/uploadDataByExcel',
            processData: false,
            contentType: false,
            data: fileUpload,
            dataType: "JSON"
        })
    })
})