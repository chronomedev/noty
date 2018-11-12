//Effects for web pages
//2018 Hansrenee Willysandro 
// www group Web Design And Development


$(document).ready(function(){
    $(".add_icon").mouseenter(function(){
        document.getElementsByClassName("add_icon")[0].setAttribute("src", "img/add_icon_hovered.png");
    });
    $(".add_icon").mouseleave(function(){
        document.getElementsByClassName("add_icon")[0].setAttribute("src", "img/add_icon.png");
    });
});
