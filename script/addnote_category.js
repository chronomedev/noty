// handling add notes and category
// Hansrenee Willysandro 
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


function addCategoryPage(){

    window.location.assign('addcategory.php');

}

function deleteNote(){
    var form = document.getElementById("edit_note_form");
    document.getElementsByClassName("instruksi_update")[0].value = "delete";
    //window.alert(document.getElementsByTagName("input")[3].value);
    form.submit();

}

function deleteCategory(){
    var form = document.getElementById("form_edit_category");
    document.getElementsByClassName("pilihan_instruksi")[0].value = "delete";
    form.submit();
}

function updateCategory(){
    var form = document.getElementById("form_edit_category");
    document.getElementsByClassName("pilihan_instruksi")[0].value = "update";
    form.submit();
}

function updateNote(){
    var form = document.getElementById("edit_note_form");
    document.getElementsByClassName("instruksi_update")[0].value = "update";
    form.submit();
}

function editCategory(id_kategori_masukan){

    window.location.assign("editcategory.php?ctg="+id_kategori_masukan);

}
