//handling add notes
//Hansrenee Willysandro 
// notty www group

var kategori

function getCategory(id_elemen_masukan){
    var convertToString = String(id_elemen_masukan);
    console.log(convertToString);
    var pecah = convertToString.split('javascript:getCategory(');
    var append="";
    //cleansing data////
    for(i=0;i<pecah.length;i++){
            append = append + pecah[i];
    }
    var pecah2 = append.split(');');
    //////
    console.log(pecah2[0]);
    document.getElementsByClassName("kategori_note")[0].value= pecah2[0];
    var logz = document.getElementsByClassName("kategori_note")[0].value;
    window.alert(logz);
}
