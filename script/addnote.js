//handling add notes
//Hansrenee Willysandro 
// notty www group

var kategori

function getCategory(id_elemen_masukan){
    kategori = document.getElementById(id_elemen_masukan).innerHTML;
    document.getElementsByClassName("kategori_note")[0].value= kategori;
    console.log(kategori);
}
