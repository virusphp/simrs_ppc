<script type="text/javascript">
    $(function() {

        // ============= GLOBAL VAR ============= //
        let oTable = LaravelDataTables['tabel-users'];
        let oForm  = $('#form-user');
        // ============= END GLOBAL VAR =========== //

        // ============= SEARCH DATA ============ //
        $('#search-btn').click(function() {
            oTable.ajax.reload();
        })
        // ============= END SEARCH DATA ============ //

        // ============= INIT ============= //
        $(document).ready(function() {
            clearMessage();
        })

        function clearMessage() {
            $('#tabel-message-success').hide();
            $('#tabel-message-error').hide();
            return false;
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

        function setFormUser(id, data) {
            let jenispemakai = getJenisPemakai(data);
            $('#id-user').val(id).trigger('change');
            $('#username').val(data.nama_pemakai || data.username).trigger('change');
            $.each(data.ruangan_id, function(key, value) {
                $("#ruangan_id option[value='" + key + "']").prop("selected", true).trigger('change');
            });
            $.each(data.modul_id, function(key, value) {
                $("#modul_id option[value='" + key + "']").prop("selected", true).trigger('change');
            });
            if (jenispemakai) {
                toggleJenisPemakai(jenispemakai);
                $('input[name="jenispemakai"][value="' + jenispemakai + '"]').prop('checked', true).trigger('change');
                if (jenispemakai == 'pasien') {
                    $('#pasien_id').val(data.pasien_id).trigger('change');
                    $('#nama_pasien').val(data.nama_pasien).trigger('change');
                } else if (jenispemakai == 'pegawai') {
                    $('#pegawai_id').val(data.pegawai_id).trigger('change');
                    $('#nama_pegawai').val(data.nama_pegawai).trigger('change');
                } else {
                    $('#pegawai_id').val('').trigger('change');
                }
            } else {
                $('input[name="jenispemakai"]').prop('checked', false).trigger('change');
                toggleJenisPemakai('pegawai');
            }
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

        // ============= INTERACTIVE INPUT =============
        // CARI PEGAWAI
        $('#nama_pegawai').on('keyup', function() {
            $(this).val($(this).val().toUpperCase());
            let url = 'url';
            let cari_pegawai = $('#nama_pegawai').val();
            $('#nama_pegawai').autocomplete({
                appendTo: "#modal-user",
                source: function(request, response) {
                    $.ajax({
                        url: url,
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            cari_pegawai: cari_pegawai
                        },
                        success: function(data) {

                            if (data.code == 200) {

                                response(data.result.pegawai);
                            }
                        }
                    })
                },
                minLength: 3,
                select: function(event, ui) {
                    setPegawai(ui.item);
                    return false;
                }
            })
        });

        function setPegawai(data) {
            $('#nama_pegawai').val(data.nama_pegawai);
            $('#pegawai_id').val(data.pegawai_id);
            return false;
        }
        
        // get jenis Pemakai
        function getJenisPemakai(data) {
            if (!data.pasien_id && !data.pegawai_id) {
                return null;
            }
            if (data.pasien_id) {
                return 'pasien';
            } else if (data.pegawai_id) {
                return 'pegawai';
            }
        }

        // CARI PASIEN
        $('#nama_pasien').on('keyup', function() {
            $(this).val($(this).val().toUpperCase());
            let url = 'url';
            let cari_pasien = $('#nama_pasien').val();
            $('#nama_pasien').autocomplete({
                appendTo: "#modal-user",
                source: function(request, response) {
                    $.ajax({
                        url: url,
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            cari_pasien: cari_pasien
                        },
                        success: function(data) {

                            if (data.code == 200) {

                                response(data.result.pasien);
                            }
                        }
                    })
                },
                minLength: 3,
                select: function(event, ui) {
                    setPasien(ui.item);
                    return false;
                }
            })
        });

        function setPasien(data) {
            $('#nama_pasien').val(data.nama_pasien);
            $('#pasien_id').val(data.pasien_id);
            return false;
        }

        // BUTTON ACTION
        $('#btn-action-user').click(function(e) {
            e.preventDefault();
            oForm.valid();
            $(this).attr("disabled", true);
            let data = oForm.serialize();
            let id = $('#id-user').val();
            if (id == "") {
                saveData(data);
            } else {
                updateData(data);
            }
            return false;
        })

        // JENIS PEMAKAI
        $('input[name="jenispemakai"]').on('change', function() {
            toggleJenisPemakai($(this).val());
        })

        function toggleJenisPemakai(val) {
            if (val === 'pasien') {
                $('.pasien-show').show();
                $('.pegawai-show').hide();
            } else {
                $('.pegawai-show').show();
                $('.pasien-show').hide();
            }
        }

        // RUANGAN
        $('#ruangan_id').select2({
            createTag: function(params) {
                return undefined;
            },
            tags: true,
        })
        // MODUL
        $('#modul_id').select2({
            createTag: function(params) {
                return undefined;
            },
            tags: true,
        })

    });
    // Tutup function anonymus
</script>