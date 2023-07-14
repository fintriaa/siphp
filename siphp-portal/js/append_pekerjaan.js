// let uraianFix = [];
// for (i = 0; i < uraian.length; i++) {
//      uraianFix = uraianFix + `<option class="option-kegiatan border-bottom d-none">` + uraian[i] + `</option>`;
// }
let satuanFix = [];
for (i = 0; i < satuan.length; i++) {
    satuanFix = satuanFix + `<option value="` + satuan[i] + `">` + satuan[i] + `</option>`;
}
let pekerjaanFix = [];
for (i = 0; i < pekerjaan.length; i++) {
    pekerjaanFix = pekerjaanFix + `<option value="` + pekerjaanValue[i] + `">` + pekerjaan[i] + `</option>`;
}

$(document).ready(function () {
    // $('#modal-edit').modal('show');
    $('#modal-detail').modal('show');
    $('#id-kerjaan-assign').hide();
    $('#id-kerjaan-realisasi').hide();
    $('#id-kerjaan-edit').hide();

    $(document).on('click', '#hapus-baris', function () {
        if ($(this).parent().parent().attr('id') == 'baru') {
            $(this).parent().remove();
            $('#baru').children().find('#hapus-baris').addClass('d-none');
            $('#baru').children().last().find('#hapus-baris').removeClass('d-none');
        }
        if ($(this).parent().parent().attr('id') == 'baru2') {
            $(this).parent().remove();
            $('#baru2').children().find('#hapus-baris').addClass('d-none');
            $('#baru2').children().last().find('#hapus-baris').removeClass('d-none');
        }
    });

    function appendBaris(modal, noBaris) {
        $(modal).append(
            `
        <div class="row mt-4 rounded position-relative pt-2 kegiatan-baru">
                    <span id="hapus-baris" type="button" class="delete-kegiatan"><i class="fas fa-times"></i></span>
                    <div class="col-xl-1 baris-kegiatan">
                        <div class="row"><strong>NO</strong></div>
                        <div class="row">` +
            noBaris +
            `</div>
                    </div>
                    <div class="col-xl-4 baris-kegiatan">
                        <div class="row"><strong>Pekerjaan</strong></div>
                        <div class="row px-1  w-100">
                            <div class="input-group  w-100">
                                <select class=" form-control  w-100" name="field_pekerjaan[]" required>
                                `+ pekerjaanFix + `
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 baris-kegiatan">
                        <div class="row"><strong>Jumlah</strong></div>
                        <div class="row px-1 w-100">
                            <div class="form-group w-100">
                                <input type="number" min="1" value="1" class="form-control w-100" name="field_jumlah[]" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 baris-kegiatan">
                        <div class="row"><strong>Satuan</strong></div>
                        <div class="row px-1 w-100">
                            <div class="input-group w-100">
                            <select class=" form-control w-100" name="field_satuan[]" required>
                                    ` +
            satuanFix +
            `
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 baris-kegiatan">
                        <div class="row"><strong>Deadline</strong></div>

                        <div class="row px-1  w-100">
                            <div class="form-group  w-100 position-relative">
                                <input type="date" class="form-control  w-100" name="field_deadline[]" rows="1" placeholder="Tanggal Deadline" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
    `
        );
    }

    $('#tabelData tbody').on('click', '#btn-edit', function () {
        $('#modal-edit').modal('show');
        var idPekerjaan = $(this).parent().parent().find("td:eq(2)").attr("id");
        var jumlahTarget = $(this).parent().parent().find("td:eq(3)").text();
        var satuanTarget = $(this).parent().parent().find("td:eq(4)").text();
        var dateTarget = $(this).parent().parent().find("td:eq(5)").text();
        var nmaKerjaan = $(this).parent().parent().find("td:eq(2)").text();

        console.log(idPekerjaan);
        console.log(nmaKerjaan);

        $('#id-kerjaan-edit').val(idPekerjaan);
        $('#edit-nama-kerjaan').text(nmaKerjaan);
        // $('select[name="field_pekerjaan[]"]').val(idPekerjaan);
        $('input[name="field_jumlah[]"]').val(jumlahTarget);
        $('select[name="field_satuan[]"]').val(satuanTarget);
        $('input[name="field_deadline[]"]').val(dateTarget);
    });



    $('[id^="tambah-baris"]').click(function () {
        let noBaris = $('#lama').children().length + $('#baru').children().length + 1;
        appendBaris('#baru', noBaris);
        bsCustomFileInput.init();
        $('#baru').children().find('#hapus-baris').addClass('d-none');
        $('#baru').children().last().find('#hapus-baris').removeClass('d-none');
    });

    //x value to check the sum of assignment.
    var x;

    $('#tabelData tbody').on('click', '#btn-assign', function () {
        idKerjaanAssign = $(this).parent().parent().find("td:eq(2)").attr("id");
        nmKerjaanAssign = $(this).parent().parent().find("td:eq(2)").text();
        targetKerjaanAssign = $(this).parent().parent().find("td:eq(3)").text();
        console.log(nmKerjaanAssign);

        var baseURL = '<?php echo base_url(); ?>';
        var url = baseURL + '/getTargetAssignment/' + idKerjaanAssign;
        console.log(url);
        x = $(this).parent().parent().find("td:eq(3)").text();
        // console.log(x);
        calculateSumAndCheck(x);
        $.ajax({
            url: '/siphp-portal/getTargetAssignment',
            method: 'POST',
            data: { id: idKerjaanAssign },
            dataType: 'json',
            success: function (response) {
                // Handle the response data
                console.log(response);
                var listSatker = ['1501', '1502', '1503', '1504', '1505', '1506', '1507', '1508', '1509', '1571', '1572'];

                $.each(response, function (index, obj) {
                    var kdsatker = obj.kdsatker;
                    var kuantitastarget = obj.kuantitastarget;

                    // Set the kuantitastarget value in the input field with id field_target_kdsatker
                    $('#field_target_' + kdsatker).val(kuantitastarget);
                });

            },
            error: function (xhr, status, error) {
                // Handle the error
                console.log(error);
            }
        });


        $('#judul-kerjaan-assign').find('strong').text(nmKerjaanAssign);
        $('#target-kerjaan-assign').find('strong').text('Target Provinsi : ' + targetKerjaanAssign)
        $('#id-kerjaan-assign').val(idKerjaanAssign);

        console.log($('#id-kerjaan-assign').val());


    })

    var lastModifiedInputId;

    // Function to reset the value of the last modified input field
    function resetLastModifiedInputValue() {
        $('#' + lastModifiedInputId).val('0');
    }

    function calculateSumAndCheck(x) {

        var sum = 0;

        

        // Loop through each input field and calculate the sum of their values
        $('input[id^="field_target_"]').each(function () {
            var fieldValue = parseFloat($(this).val()) || 0; // Get the value of the input field (0 if empty or non-numeric)
            sum += fieldValue;
        });

        // Compare the sum with x
        if (sum > x) {
            var sisa = sum - x;
            // console.log(sisa);
            alert('Total target melebihi target provinsi yaitu ' + x );
            resetLastModifiedInputValue();
            console.log(x);
        } else {
            // alert('The sum is not equal to ' + x);
            // $('#btn-simpan-assign').prop('disabled',false);
            // $('#btn-simpan-assign').removeClass('disabled');
        }
    }

    $('input[id^="field_target_"]').on('input', function () {
        lastModifiedInputId = $(this).attr('id');
        calculateSumAndCheck(x);
        
    });


    $('#modal-assign').on('hidden.bs.modal', function () {
        // Clear the input fields or reset the form inside the modal
        $('#modal-assign').find('input').val('0');
    });

    $('#tabelData tbody').on('click', '#btn-realisasi', function () {
        idKerjaan = $(this).parent().parent().find("td:eq(2)").attr("id");
        nmKerjaan = $(this).parent().parent().find("td:eq(2)").text();

        $('#judul-kerjaan-realisasi').find('strong').text(nmKerjaan);
        $('#id-kerjaan-realisasi').val(idKerjaan);


        console.log($('#id-kerjaan-realisasi').val());
    })


    $('[id^="tambah-baris2"]').click(function () {
        let noBaris2 = $('#lama2').children().length + $('#baru2').children().length + 1;
        appendBaris('#baru2', noBaris2);
        bsCustomFileInput.init();
        $('#baru2').children().find('#hapus-baris').addClass('d-none');
        $('#baru2').children().last().find('#hapus-baris').removeClass('d-none');
    });
});
