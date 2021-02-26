// ========== CUSTOM SCRIPT ========== //

// HAPUS REKOMENDASI VARIABEL //
$('.btn-hapus').click(function(){
    if(confirm('Yakin mau menghapus?')){
        location.href = "index.php?page=variabelhapus&id=" + this.getAttribute('value');
    }
});

// TAMPILKAN REKOMENDASI ALTERNATIF
$('select[name=paketwisata]').change(function(){
    if(this.getAttribute("value") != "null"){
        $.ajax({
            xhr: function(){
                let xhr = new window.XMLHttpRequest();
                xhr.addEventListener('progress',function(){
                    console.log('download');
                },false);
                return xhr;
            },
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
                                <td></td>
                            </tr>`
                    i += 1;
                });
                $('.table-alternatif tbody').html(text);
                $('.table-alternatif').DataTable();
            }
        })
    }
});