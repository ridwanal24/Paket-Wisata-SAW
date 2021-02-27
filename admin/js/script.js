// ========== CUSTOM SCRIPT ========== //

// ---- REKOMENDASI ---- //

// HAPUS VARIABEL //
$('.btn-hapus').click(function(){
    if(confirm('Data akan dihapus?')){
        location.href = "index.php?page=variabelhapus&id=" + this.getAttribute('value');
    }
});

// TAMPILKAN ALTERNATIF //
$('select[name=paketwisata]').change(function(){
    if(this.getAttribute("value") != "null"){
        $.ajax({
            method:'get',
            data:{
                id: $('select[name=paketwisata]').val()
            },
            url:'rekomendasialternatif_tampil.php',
            success: function(data){
                data = JSON.parse(data);
                text = '';
                i = 1;
                data.forEach(item => {
                    text += `<tr>
                                <td>${i}</td>
                                <td>${item['nama_paketwisata']}</td>
                                <td>${item['kriteria']}</td>
                                <td>${item['variabel']}</td>
                            </tr>`
                    i += 1;
                });
                $('.table-alternatif tbody').html(text);
                $('.table-alternatif').DataTable();
            }
        })
    }
});

// UBAH ALTERNATIF //
$('select[name=id_paketwisata_edit]').change(function(){
    if(this.value != "null"){
        location.href = 'index.php?page=alternatifubah&id=' + this.value;
    }
});

// HAPUS ALTERNATIF //
$('.btn-hapus-alternatif').click(function(){
    if($('select[name=paketwisata]').val() != "null"){
        if(confirm('Data akan dihapus?')){
            location.href = "index.php?page=alternatifhapus&id=" + $('select[name=paketwisata]').val();
        }
    }
});

// ---- AKHIR REKOMENDASI ---- //