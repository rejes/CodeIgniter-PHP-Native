/*!
 * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
(function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    $('.ubah-role').on('click', function() {
        const id = $(this).data('id');
        $('.pengguna_id_edit').val(id);
    });


    $('.hapus-pengguna').on('click', function() {
        const id = $(this).data('id');
        $('.id_hapus_pengguna').val(id);
    });

    $('.detail-pengguna').on('click', function() {
        const id = $(this).data('id');
        const username = $(this).data('username');
        const nama = $(this).data('nama');
        const no_telepon = $(this).data('no_telepon');
        const alamat = $(this).data('alamat');
        const role = $(this).data('role');
        $('.table_nama').text(nama);
        $('.table_username').text(username);
        $('.table_telepon').text(no_telepon);
        if (role == 1) {
            $('.table_role').text('administrator');
        } else {
            $('.table_role').text('Kasir');
        }
        $('.table_alamat').text(alamat);
    });

    $('.edit-kategori').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        $('.kategori_id_edit').val(id);
        $('.kategori_nama_edit').val(nama);
    });

    $('.hapus-kategori').on('click', function() {
        const id = $(this).data('id');
        $('.id_hapus_kategori').val(id);
    });

    $('.edit-satuan').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        $('.satuan_id_edit').val(id);
        $('.satuan_nama_edit').val(nama);
    });

    $('.hapus-satuan').on('click', function() {
        const id = $(this).data('id');
        $('.id_hapus_satuan').val(id);
    });


    $('.hapus-barang').on('click', function() {
        const id = $(this).data('id');
        $('.id_hapus_barang').val(id);
    });

    $('.edit-item').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');

        const barcode = $(this).data('barcode');
        const harga = $(this).data('harga');
        const stok = $(this).data('stok');



        $('.id_edit_item').val(id);
        $('.nama_edit_item').val(nama);
        $('.barcode_edit_item').val(barcode);
        $('.stok_edit_item').val(stok);
        $('.harga_edit_item').val(harga);
    });

    // $('.edit-pelanggan').on('click', function() {
    //     const id = $(this).data('id');
    //     const nama = $(this).data('nama');
    //     const alamat = $(this).data('alamat');
    //     const telepon = $(this).data('telepon');
    //     const jenkel = $(this).data('jenkel');
    //   
    //     if (jenkel === "L") {
    //         $('#laki_laki_edit').attr('checked', 'checked');
    //     };



    //     if (jenkel === "P") {
    //         $('#perempuan_edit').attr('checked', 'checked');
    //     }


    //     $('.pelanggan_id_edit').val(id);
    //     $('.pelanggan_nama_edit').val(nama);
    //     $('.pelanggan_telepon_edit').val(telepon);
    //     $('.pelanggan_alamat_edit').text(alamat);

    // });


    $('.hapus-pelanggan').on('click', function() {
        const id = $(this).data('id');

        $('.id_hapus_pelanggan').val(id);
    });

    $('.keterangan-supplier').on('click', function() {
        const deksripsi = $(this).data('keterangan');

        $('.isiketerangan').text(deksripsi);
    });
    $('.edit-supplier').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const alamat = $(this).data('alamat');
        const telepon = $(this).data('telepon');
        const keterangan = $(this).data('keterangan');


        $('.supplier_id_edit').val(id);
        $('.supplier_nama_edit').val(nama);
        $('.supplier_telepon_edit').val(telepon);
        $('.supplier_alamat_edit').text(alamat);
        $('.supplier_keterangan_edit').text(keterangan);

    });


    $('.hapus-supplier').on('click', function() {
        const id = $(this).data('id');
        $('.id_hapus_supplier').val(id);
    });

    $('.tambah-stok').on('click', function() {
        const id = $(this).data('id');
        $('.item_id').val(id);

    });



    $('.pilih-barang').on('click', function() {
        const barcode = $(this).data('barcode');
        const id = $(this).data('id');

        $('.barang-id').val(id);

        $('.input-barcode').val(barcode);
        $('#caribarang').modal('hide');
    });

    $('.pilih-barang-kasir').on('click', function() {
        const barcode = $(this).data('barcode');
        const id = $(this).data('id');

        $('.barang-id').val(id);

        $('.kasir-barcode').val(barcode);
        $('#cariitem_kasir').modal('hide');
    });


    $('.batal-stokmasuk').on('click', function() {
        const jumlah = $(this).data('jumlah');
        const id_stokmasuk = $(this).data('id_stokmasuk');
        const id_barang = $(this).data('id_barang');


        $('.id_stokmasuk_batal').val(id_stokmasuk);
        $('.jumlah_batal').val(jumlah);
        $('.id_barang_batal').val(id_barang);
    });
    $('.hapus-stokmasuk').on('click', function() {

        const id_stokmasuk = $(this).data('id_stokmasuk');


        $('.id_stokmasuk_hapus').val(id_stokmasuk);

    });

    $('.batal-stokkeluar').on('click', function() {
        const jumlah = $(this).data('jumlah');
        const id_stokkeluar = $(this).data('id_stokkeluar');
        const id_barang = $(this).data('id_barang');


        $('.id_stokkeluar_batal').val(id_stokkeluar);
        $('.jumlah_batal').val(jumlah);
        $('.id_barang_batal').val(id_barang);
    });

    $('.hapus-stokkeluar').on('click', function() {

        const id_stokkeluar = $(this).data('id_stokkeluar');



        $('.id_stokkeluar_hapus').val(id_stokkeluar);

    });


    $('.tabel-kasir').dataTable({
        "searching": false,

    });

    function rupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }
    $('.counter').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    function tampil_data_barang(no_keranjang) {
        let no = no_keranjang;

        $.ajax({
            type: 'post',
            data: {
                'no_keranjang': no,
            },
            url: 'Inti/Transaksi/getkeranjang',
            dataType: 'json',
            success: function(respone) {

                if (respone.keranjang) {

                    let tabel = '';
                    let no = 1;
                    let total = 0

                    if (respone.keranjang.length === 0) {
                        $('.tagihan_kasir').text("Rp.0");
                    } else {
                        for (let i = 0; i < respone.keranjang.length; i++) {

                            let btn = '<div class="number"><button class="minus" data-barang="' + respone.keranjang[i]['id_barang'] + '" data-id="' + respone.keranjang[i]['id_keranjang'] + '"><i class="fas fa-minus"></i>' +
                                '</button><input class="input-qty" readonly type="number" max="' + respone.keranjang[i]['stok_barang'] + '" min="1" value="' + respone.keranjang[i]['qty'] + '"/><button data-barang="' + respone.keranjang[i]['id_barang'] + '" data-id="' + respone.keranjang[i]['id_keranjang'] + '" class="plus"><i class="fas fa-plus"></i></button></div>';

                            tabel += '<tr><td>' + no + '</td><td>' + respone.keranjang[i]['barcode_barang'] + "</td><td>" + respone.keranjang[i]['nama_barang'] + '</td><td>' + 'Rp.' + rupiah(respone.keranjang[i]['harga_barang']) + '</td><td>' + btn + '</td><td>' + 'Rp.' + rupiah(respone.keranjang[i]['harga_barang'] * respone.keranjang[i]['qty']) + '</td> <td>' +
                                '<button type="button" class="btn btn-sm btn-dark batal-keranjang" data-id="' + respone.keranjang[i]['id_keranjang'] + '"><i class="fas fa-times"></i> Batal</button></td></tr>';


                            no = no + 1;
                            total = total + (respone.keranjang[i]['harga_barang'] * respone.keranjang[i]['qty']);
                            $('.tagihan_kasir').text("Rp." + rupiah(total));


                            $('.tagihan_kasir').text("Rp." + rupiah(total));
                        }
                    }
                    $('.kasir-body').html(tabel);
                    $('.jumlah_kasir').val('');
                    $('.kasir-barcode').val('');



                }


            }


        });

    }

    $('#data_table').DataTable();



    $(window).on("load", function() {
        $.ajax({
            type: 'post',
            url: 'Inti/Transaksi/no_penjualan',
            dataType: 'Json',
            success: function(respone) {
                if (respone.no_penjualan) {

                    tampil_data_barang(respone.no_penjualan);

                }

            }
        });

    });

    $(document).on('click', '.minus', function() {
        let id = $(this).data('id');
        let barang_id = $(this).data('barang');


        $.ajax({
            type: 'post',
            url: 'Inti/Transaksi/minusqty',
            data: {
                'id_keranjang': id,
                'barang_id': barang_id,
            },
            dataType: 'Json',
            success: function(respone) {
                if (respone.no_penjualan) {
                    tampil_data_barang(respone.no_penjualan);
                }

            }
        });

    });
    $(document).on('click', '.plus', function() {
        let id = $(this).data('id');
        let barang_id = $(this).data('barang');
        console.log(barang_id);




        $.ajax({
            type: 'post',
            url: 'Inti/Transaksi/plusqty',
            data: {
                'id_keranjang': id,
                'barang_id': barang_id,
            },
            dataType: 'Json',
            success: function(respone) {
                if (respone.no_keranjang) {
                    tampil_data_barang(respone.no_keranjang);
                }

            }
        });

    });


    $('.edit-pelanggan').on('click', function() {

        let id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: 'Master/Pelanggan/getpelangganbyid',
            data: {
                'id_pelanggan': id,
            },
            dataType: 'Json',
            success: function(respone) {

                $('.edit_id_pelanggan').val(respone.pelanggan.id_pelanggan);
                $('.edit_nama_pelanggan').val(respone.pelanggan.nama_pelanggan);
                $('.edit_telepon_pelanggan').val(respone.pelanggan.no_telepon_pelanggan);
                $('.edit_alamat_pelanggan').text(respone.pelanggan.alamat_pelanggan);
                if (respone.pelanggan.jeniskelamin == "L") {
                    $('.jenkel_l').attr('selected', 'selected');
                } else if (respone.pelanggan.jeniskelamin == "P") {
                    $('.jenkel_p').attr('selected', 'selected');
                }
            }



        });



    })


    $('.lihat-keranjang').on('click', function() {
        let id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: 'Laporan/Penjualan/getkeranjang',
            data: {
                'id_penjualan': id,
            },
            dataType: 'Json',
            success: function(respone) {
                if (respone.keranjang) {
                    let tabel = '';
                    let total = 0
                    for (let i = 0; i < respone.keranjang.length; i++) {
                        tabel += '<tr><td>' + respone.keranjang[i]['nama_barang'] + '</td><td>' + 'Rp.' + rupiah(respone.keranjang[i]['harga_barang']) + '</td><td>' + respone.keranjang[i]['qty'] + '</td><td>' + 'Rp.' + rupiah(respone.keranjang[i]['harga_barang'] * respone.keranjang[i]['qty']) + '</td></tr>';
                        total = total + (respone.keranjang[i]['harga_barang'] * respone.keranjang[i]['qty']);
                    }
                    $('.isi-keranjang').html(tabel);
                    $('.total-keranjang').text('Grand Total : Rp.' + rupiah(total));
                    $('#judul-keranjang').text('Keranjang NP-' + id);
                }
            }


        });

    })






    $('.hitung_kembalian').on('click', function() {

        let bayar = $('.bayar_kasir').val();
        $.ajax({
            type: 'post',
            url: 'Inti/Transaksi/totaltagihan',
            dataType: 'Json',
            success: function(respone) {
                if (respone.grandtotal) {
                    respone.grandtotal
                    if (parseInt(bayar) < parseInt(respone.grandtotal)) {
                        $('.kembalian_kasir').text('Maaf uang  tidak cukup');
                    } else if (parseInt(bayar) == parseInt(respone.grandtotal)) {
                        $('.kembalian_kasir').text('Uang Pembayaran Pas');
                    } else {

                        let kembali = parseInt(bayar) - parseInt(respone.grandtotal);
                        $('.kembalian_kasir').text("Rp." + rupiah(kembali));

                    }

                }

            }
        });
    });


    $('.btn-nota').on('click', function() {


        let no_penjualan = $(this).data('no_penjualan');
        $.ajax({
            type: 'post',
            url: 'Inti/Transaksi/nota_penjualan',
            data: {
                'no_penjualan': no_penjualan,
            },
            dataType: 'Json',
            success: function(respone) {


                let tabel = '';

                let total = 0
                for (let i = 0; i < respone.keranjang.length; i++) {
                    tabel += ' <tr><td class="left strong">' + respone.keranjang[i]['nama_barang'] + '</td> <td class="left">' + "Rp." + rupiah(respone.keranjang[i]['harga_barang']) + '</td>' +
                        ' <td class="right">' + respone.keranjang[i]['qty'] + '</td><td class="center">' + "Rp." + rupiah(respone.keranjang[i]['harga_barang'] * respone.keranjang[i]['qty']) + '</td></tr>';

                    $('.tabel-notapenjualan').html(tabel);

                    total = total + (respone.keranjang[i]['harga_barang'] * respone.keranjang[i]['qty']);

                    $('.grandtotal_np').text("Rp." + rupiah(total));

                }

            }
        });



    });

    $('.btn-keterangan').on('click', function() {
        let keterangan = $(this).data('keterangan');
        $('.detailketeranganstokmasuk').text(keterangan);
    })

    $('.cari-item-kasir').on('click', function() {
        $('.info-kasir').html('');
    })


    function tambahkeranjang() {
        let databarcode = $('.kasir-barcode').val();
        let qty = $('.jumlah_kasir').val();


        $.ajax({
            type: 'post',
            url: 'Inti/Transaksi/getitem',
            data: {
                'barcode': databarcode,
                'qty': qty,
            },
            dataType: 'Json',
            success: function(respone) {
                console.log(respone);
                if (respone.error) {
                    $('.kasir-barcode').addClass('is-invalid');
                    $('.error-barcode').text(respone.error);
                } else if (respone.no_penjualan_update) {
                    console.log(respone.no_penjualan_update);
                    // update qty
                    $('.kasir-barcode').removeClass('is-invalid');
                    $('.jumlah_kasir').val(respone.qtyinput);
                    console.log(respone.no_penjualan_update);
                    tampil_data_barang(respone.no_penjualan_update);

                } else if (respone.no_penjualan) {
                    console.log(respone.no_penjualan);
                    // tambah item ke keranajang
                    $('.kasir-barcode').removeClass('is-invalid');
                    $('.jumlah_kasir').val(respone.inputqty);
                    let no_penjualan = respone.no_penjualan;
                    tampil_data_barang(no_penjualan);
                } else if (respone.stoktidakcukup) {

                    $('.info-kasir').html(' <div class="alert alert-warning alert-dismissible fade show mx-2" role="alert">' +
                        '' + respone.stoktidakcukup + '' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span></button> </div>');
                }
            }
        });
    }



    $('.kirim-barcode').on('click', function() {
        tambahkeranjang();
    });


    $('.kasir-barcode').on('change', function() {
        tambahkeranjang();

    });






    $(document).on('click', '.batal-keranjang', function() {
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
            type: 'post',
            url: 'Inti/Transaksi/hapuskeranjang',
            data: {
                'id_keranjang': id,
            },
            dataType: 'Json',
            success: function(respone) {


                if (respone.berhasil) {

                    tampil_data_barang(respone.no_keranjang_hapus);
                }

            }
        });
    });


    // $('.buat-kwitansi').on('click', function() {
    //     let pelanggan = $('.pelanggan_kasir').val();


    // });














})(jQuery);