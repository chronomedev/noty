//Input checker
// 2018 Hansrenee Willysandro
//Ajax FROM HANDLER
// wwww group Web Design and Development 

$(document).ready(function(){
    $("#warningnotif").hide();
});


function closeWarning(){
    $("#warningnotif").hide();
    $(".container-fluid").fadeIn(500);
    
}

function MatchPassword(){

    var pw1 = document.getElementsByTagName("input")[3].value;
    var pw2 = document.getElementsByTagName("input")[4].value;
    
    console.log("pw1 = " + pw1 +" pw2 = " + pw2);

    if(pw1!=pw2){
        window.alert("PASSWORD YANG DI MASUKAN HARUS SAMA!");
    } else {
        document.getElementsByTagName("input")[3].value = chiper(pw1);
        console.log(chiper(pw1));
        document.getElementById("register_form").submit();
    }
}

function emptyChecker(){
    var masukan= document.getElementsByClassName('form-control')[5].value;
    var masukanpassword = document.getElementsByClassName('form-control')[4].value;
   
    console.log(masukan);
    if(masukan == null || masukan == ""){
        $(".container-fluid").hide();
       $("#warningnotif").fadeIn(500);
    } else{
        var form_update = document.getElementById("update_form");
        var lock = chiper(masukanpassword);
        var lockold = chiper(masukan);
        if(lock == "" || lock == null){
            lock = null;
        }
        document.getElementsByClassName('form-control')[5].value = lockold;
        document.getElementsByClassName('form-control')[4].value = lock;
        form_update.submit();
        // $.ajax({
        //     type : "POST",
        //     url : "ambilajax.php",
        //     data : { 'halo' : masukan},
        //     success: function(data){
        //         window.alert("Berhasil Update Profile!");
        //         //document.getElementsByClassName("container-fluid")[0].innerHTML = data;
        //     },
        //     error : function(data){
        //         window.alert("Gagal melakukan update ke database. Silahkan coba lagi.");
        //     }
        // });
    }
}



function addCategory(){
    var input = document.getElementsByTagName("input")[1].value;
    var form = document.getElementById("add_category_form");
    
    console.log(input);

    
    if(input=="" || input== null){
        window.alert("Nama kategori harus diisi!");
    } else {
        form.submit();
    }
    
}