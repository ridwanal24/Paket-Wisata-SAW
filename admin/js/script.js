// HAPUS REKOMENDASI VARIABEL //
$('.btn-hapus').click(function(){
    if(confirm('Yakin mau menghapus?')){
        location.href = "index.php?page=variabelhapus&id=" + this.getAttribute('value');
    }
});