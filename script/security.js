// Security countermeasures - Chiper function to prevent the package to be decode
// 2018 Hansrenee Willysandro 
// www noty Webdesign and Development


function chiper(pw){
    var alfabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
    'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y', 'z'];

    var karakterSwitch = [ 'z', 'y', 'x', 'w', 'v', 'u', 't', 's', 'r', 'q',
        'p', 'o', 'n', 'm', 'l', 'k', 'j', 'i', 'h', 'g',
        'f', 'e', 'd', 'c', 'b', 'a'];

    pecah = pw.split("");
    var append = "";

    for(i=0;i<pecah.length;i++){
    
        for(z=0;z<alfabet.length;z++){
            if(pecah[i] == alfabet[z]){
                append = append + karakterSwitch[z];
                console.log(pecah[i]);
            }    
        }
    }
    return append;

}

