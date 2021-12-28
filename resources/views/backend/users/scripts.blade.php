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
            oTable = $('#tabel-user').dataTable({
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
                    ],
                    "createdRow": function(row, data, dataIndex) {
                        let panjang = $(row).find('td').length
                        for (i = 0; i < panjang - 1; i++) {
                            $(row).find('td').eq(5).addClass('badge badge-info');
                        }
                    }
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

        $('#roles').select2({
            width: "100%",
            dropdownParent: $('#modal-user .modal-content')
        })

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

        $('#btn-action-user').click(function(e) {
            e.preventDefault();
            oForm.valid();
            $(this).attr("disabled", true);
            let data = oForm.serialize();
            let id = $('#id-user').val();
            if (id == "") {
                saveData(data);
            } else {
                updateData(data +'&id='+id);
            }
            return false;
        })

        function saveData(data) {
            clearError();
            $.ajax({
                url: '/backend/users/ajax/store',
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
                        setTimeout(clearMessage, 5000);
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
        $("#tabel-user tbody").on("click", "button#edit-user", function() {
            let parentRow = $(this).closest("tr");
            let parentTd = $(this).closest("td");
            let data = oTable.row(parentRow).data();
            let dataSpan = oTable.row(parentTd).data();
            let id = $(this).data('id');
            unsetFormUser();
            setFormUser(id, data);
            showModalEdit();
        });

         function setFormUser(id, data) {
            $('#id-user').val(id).trigger('change');
            $('#name').val(data.name).trigger('change');
            $('#username').val(data.username).trigger('change');
            $('#email').val(data.email).trigger('change');
            $('#roles').val(data.roles).trigger('change');
            return false;
        }

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
            let url = '/backend/users/ajax/update';
            $.ajax({
                url: url,
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
                        setTimeout(clearMessage, 5000);
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
            var id = $(this).data('id'),
                name = $(this).data('nama');

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
            var url = '/backend/users/ajax/destroy',
                method = 'DELETE';
            $.ajax({
                url: url,
                method: method,
                data: {
                    id: idx
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