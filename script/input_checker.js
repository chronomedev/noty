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

function emptyChecker(){
    var masukan= document.getElementsByClassName('form-control')[5].value;
   
    console.log(masukan);
    if(masukan == null || masukan == ""){
        $(".container-fluid").hide();
       $("#warningnotif").fadeIn(500);
    } else{
        $.ajax({
            type : "POST",
            url : "ambilajax.php",
            data : { 'halo' : masukan},
            success: function(data){
                window.alert("Berhasil Update Profile!");
            },
            error : function(data){
                window.alert("Gagal melakukan update ke database. Silahkan coba lagi.");
            }
        });
    }
}