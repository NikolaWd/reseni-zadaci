$(document).ready(function () {
    
    /*$("#btnPrihvati").click(function() {
        let idN = $(this).data('id');
        alert(idN);
        return false;
        $.post("ajax/ajax_php.php?zahtev=prihvati", {idN: idN}, function(response){
            document.location.assign('radnik.php');
        })
    })*/

    /*
    $("#btnOdbij").click(function() {
        let idN = $("#idN").val();
        $.post("ajax/ajax_php.php?zahtev=odbij", {idN: idN}, function(response){
            
            document.location.assign('radnik.php');
        })
    })
    */


    $("#btnPoruci").click(function() {
        let ime = $("#ime").val();
        let prezime = $("#prezime").val();
        let adresa = $("#adresa").val();
        let pbroj = $("#pbroj").val();
        let velicina = $("input[name='ponuda']:checked").val();

        if(ime == "" || prezime == "" || adresa == "" || pbroj == "" || !velicina)
        {
            $("#narudzbina").html("Svi podaci su obavezni!");
            return false;
        }

        $.post('ajax/ajax_php.php?zahtev=narudzbina', {velicina: velicina}, function(response){
            alert(response);
        })

        /*
        let check=$(".dodatak");
        //alert(check.length);
        let dod="";
        for(el of check){
            //console.log(el);
            //console.log($(el).val());
            if ($(el).prop("checked")) //alert($(el).val());
                dod+=$(el).val()+"|";
        }
        alert(dod);
        
            */
        
        
    })

})
function prihvati(idN){
    //let idN = $(this).data('id');
    //alert(idN);
    //return false;
    $.post("ajax/ajax_php.php?zahtev=prihvati", {idN: idN}, function(response){
        document.location.assign('radnik.php');
    })
}

function odbij(idN)
{
    $.post("ajax/ajax_php.php?zahtev=odbij", {idN: idN}, function(response){
        document.location.assign('radnik.php');
    })
}