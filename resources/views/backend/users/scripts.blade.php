<script type="text/javascript">
    $(function() {

        // ============= GLOBAL VAR ============= //
        let oForm  = $('#form-user');
        // ============= END GLOBAL VAR =========== //

        // ============= INIT ============= //
        $(document).ready(function() {
            clearMessage();
            ajaxDatatables();
            $('.table').removeAttr('style');
        })

        function clearMessage() {
            $('#tabel-message-success').hide();
            $('#tabel-message-error').hide();
            return false;
        }

        function ajaxDatatables() {
            $.fn.dataTable.ext.errMode = 'throw';
            $('#tabel-user').dataTable({
                "Processing": true,
                "ServerSide": true,
                "ordering": false,
                "sDom" : "<t<p i>>",
                    "iDisplayLength": 25,
                    "bDestroy": true,
                    "oLanguage": {
                        "sLengthMenu": "_MENU_ ",
                        "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries",
                        "sSearch": "Search Data : ",
                        "sZeroRecords": "Tidak ada data",
                        "sEmptyTable": "Data tidak tersedia",
                        "sLoadingRecords": '<img src="{{asset('ajax-loader.gif')}}"> Loading...'
                    },
                    "ajax": {
                        "url": "/backend/ajax/users",
                        "type": "GET"
                    },
                    "columns": [
                        {"mData": "no"},
                        {"mData": "name"},
                        {"mData": "username"},
                        {"className": "text-center","mData": "email"},
                        {"mData": "status"},
                        {"mData": "roles"},
                        {"className": "text-center","mData": "action"},
                    ]
                });

            oTable = $('#tabel-user').DataTable();
            $('#term').keyup(function(){
                oTable.search($(this).val()).draw() ;
                $('.table').removeAttr('style');
            });
        }
        
        function clearError(){
            $('small.text-danger').text('').hide().trigger('change');
            oForm.find('.is-invalid').removeClass('is-invalid');
            oForm.find('.is-valid').removeClass('is-valid');
            return false;
        }

        function unsetFormUser() {
            clearError();
            return false;
        }

        // ============= END INIT =============

        // ============= ADD =============

        $('.add-user-btn').click(function() {
            unsetFormUser();
            showModalCreate();
        })

        function showModalCreate() {
            let options = {
                backdrop: 'static',
                show: true
            };
            let modal = $('#modal-user');
            $('#modal-title-user').text('Tambah User');
            $('#btn-action-user').text('Simpan');
            modal.modal(options);
            modal.removeAttr('style');
            return false;
        }

        function saveData(data) {
            clearError();
            $.ajax({
                url: '<?= route('users.store') ?>',
                method: 'POST',
                data: data,
                dataType: 'JSON',
                success: function(res) {
                    if (res.code == 200) {
                        $('#btn-action-user').attr("disabled", false);
                        $('#modal-user').modal('hide');
                        $('#tabel-message-success').show().html("<span class='text-dark' id='success-registrasi'></span>");
                        $('#success-registrasi').html(res.message).hide()
                            .fadeIn(1500, function() {
                                $('#success-registrasi')
                            });
                        setTimeout(clearMessage, 6000);
                        oTable.ajax.reload();
                    } else {
                        $('#modal-user').modal('hide');
                        $('#btn-action-user').attr("disabled", false);
                        $('#tabel-message-error').show().html("<span class='text-dark' id='error-registrasi'></span>");
                        $('#error-registrasi').html(res.message).hide()
                            .fadeIn(1500, function() {
                                $('#error-registrasi')
                            });
                    }
                },
                error: function(data) {
                    if (data.status === 422) {
                        clearError();
                        $('#btn-action-user').attr("disabled", false);
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#err-' + key).text(value).show();
                        })
                    }
                }
            })
        }

        // ============= END ADD =============


        // ============= EDIT =============
        $("#tabel-users tbody").on("click", "button.edit-user-btn", function() {
            let parentRow = $(this).closest("tr");
            let data = oTable.row(parentRow).data();
            let id = $(this).data('idx');
            unsetFormUser();
            setFormUser(id, data);
            showModalEdit();
        });

        function showModalEdit() {
            let options = {
                'backdrop': 'static',
                'show': true
            };
            let modal = $('#modal-user');
            $('#modal-title-user').text('Edit User');
            $('#btn-action-user').text('Update');
            modal.modal(options);
            modal.removeAttr('style');
            return false;
        }

        function updateData(data) {
            clearError();
            let url = '<?= route('users.update', ':id') ?>';
            $.ajax({
                url: url.replace(':id', $('#id-user').val()),
                method: 'PATCH',
                data: data,
                dataType: 'JSON',
                success: function(res) {
                    if (res.code == 200) {
                        $('#btn-action-user').attr("disabled", false);
                        $('#modal-user').modal('hide');
                        $('#tabel-message-success').show().html("<span class='text-dark' id='success-registrasi'></span>");
                        $('#success-registrasi').html(res.message).hide()
                            .fadeIn(1500, function() {
                                $('#success-registrasi')
                            });
                        setTimeout(clearMessage, 6000);
                        oTable.ajax.reload();
                    } else {
                        $('#modal-user').modal('hide');
                        $('#btn-action-user').attr("disabled", false);
                        $('#tabel-message-error').show().html("<span class='text-dark' id='error-registrasi'></span>");
                        $('#error-registrasi').html(res.message).hide()
                            .fadeIn(1500, function() {
                                $('#error-registrasi')
                            });
                    }
                },
                error: function(data) {
                    if (data.status === 422) {
                        $('#btn-action-user').attr("disabled", false);
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#err-' + key).text(value).show();
                        })
                    }
                }
            })
        }
        // ============= END EDIT =============



        // ============= DELETE =============
        $(document).on('click', '#delete-user', function() {
            var id = $(this).data('idx'),
                name = $(this).data('name');

            window.swalWithBootstrapButtons.fire({
                title: 'Anda yakin akan menghapus data??',
                text: "Data: " + name,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    ajaxDestroy(id);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.swalWithBootstrapButtons.fire('Dibatalkan', 'Data User terpilih batal di hapus:)', 'error')
                }
            })
        })

        function ajaxDestroy(idx) {
            var url = 'url',
                method = 'DELETE';
            $.ajax({
                url: url,
                method: method,
                data: {
                    idx: idx
                },
                success: function(res) {
                    swalWithBootstrapButtons.fire('Lapor!', res.message, 'success');
                    oTable.ajax.reload();
                },
                error: function(xhr) {}
            });
        }
        // ============= END DELETE =============


    });
    // Tutup function anonymus
</script>