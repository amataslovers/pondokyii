        var hapusKeluarga;
        var keluarga = [];
        $(document).ready(function(){

            var i = 1;

            $('#btn-tambah').on('click', function(e){

                if ($('#keluargamurid-id_jenis_keluarga').val() !== '' && $('#keluargamurid-nama').val() !== '' && $('#keluargamurid-tempat_lahir').val() !== '' && $('#keluargamurid-tanggal_lahir').val() !== '' && $('#keluargamurid-id_agama').val() !== '' && $('#keluargamurid-alamat').val() !== '' && $('#keluargamurid-notelp').val() !== '' && $('#keluargamurid-pekerjaan').val() !== '') {

                    inputArray();
                    tampilData();

                    e.preventDefault();
                }else {
                    alert("Harap Isi Semua");
                }

                
            });

            function tampilData() {
                $('#daftar-keluarga').empty();

                for (var i = 0; i < keluarga.length; i++) {
                    
                    $('#daftar-keluarga').append(
                        '<tr>' +
                            '<td>'+(i+1)+'</td>'+
                            '<td> ' + 
                                '<input type="hidden" readonly class="form-control" name="_jenis_keluarga_id[]" value="'+keluarga[i]['idJenis']+'">'+
                                '<input type="text" readonly class="form-control" name="_jenis_keluarga_nama[]" value="'+keluarga[i]['namaJenis']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_nama[]" value="'+keluarga[i]['nama']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_tempat_lahir[]" value="'+keluarga[i]['tempatLahir']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_tanggal_lahir[]" value="'+keluarga[i]['tanggalLahir']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="hidden" readonly class="form-control" name="_agama_id[]" value="'+keluarga[i]['idAgama']+'">'+
                                '<input type="text" readonly class="form-control" name="_agama_nama[]" value="'+keluarga[i]['namaAgama']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_alamat[]" value="'+keluarga[i]['alamat']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_notelp[]" value="'+keluarga[i]['notelp']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<input type="text" readonly class="form-control" name="_pekerjaan[]" value="'+keluarga[i]['pekerjaan']+'">'+
                            '</td>'+
                            '<td> ' + 
                                '<button type="button" onclick="hapusKeluarga('+(i-1)+')"  class="glyphicon glyphicon-trash btn btn-danger"></button>'+
                            '</td>'+
                        '</tr>');
                }
                    $('#keluargamurid-nama').val('');
                    $('#keluargamurid-tempat_lahir').val('');
                    $('#keluargamurid-tanggal_lahir').val('');
                    $('#keluargamurid-alamat').val('');
                    $('#keluargamurid-notelp').val('');
                    $('#keluargamurid-pekerjaan').val('');
                    $('#keluargamurid-id_jenis_keluarga').val(null).trigger('change');
                    $('#keluargamurid-id_agama').val(null).trigger('change');
            }

            hapusKeluarga = function(index) {
                keluarga.splice(index, 1);
                tampilData();
            }


            function inputArray() {
                var keluarga_murid = {
                    idJenis: $('#keluargamurid-id_jenis_keluarga').val(),
                    namaJenis: $('#keluargamurid-id_jenis_keluarga option:selected').text(),
                    nama: $('#keluargamurid-nama').val(),
                    tempatLahir: $('#keluargamurid-tempat_lahir').val(),
                    tanggalLahir: $('#keluargamurid-tanggal_lahir').val(),
                    idAgama: $('#keluargamurid-id_agama').val(),
                    namaAgama: $('#keluargamurid-id_agama option:selected').text(),
                    alamat: $('#keluargamurid-alamat').val(),
                    notelp: $('#keluargamurid-notelp').val(),
                    pekerjaan: $('#keluargamurid-pekerjaan').val()
                };
                return keluarga.push(keluarga_murid);
            }
        });

