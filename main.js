/* Mascara y validation */
var externalId = document.querySelector('#externalId');

externalId.addEventListener("keyup",function(){

    externalId.value = externalId.value.replace(/[^0-9-]/g,'');

    if(externalId.value.length == 8){

        externalId.value += "-";

    }
});