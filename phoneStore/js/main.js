$( document ).ready(function() {
   
    
    $("#btnPrijava").click(function () {
        let user = $("#user").val();
        let pass = $("#pass").val();
    
        if(user == "" || pass == "")
        {
            $("#odgovor").html("Sva polja su obavezna!");
            return false;
        }
    
        $.post("ajax/ajax.php?request=login", {user:user, pass:pass}, function(response) {
            if(response == "1")
                document.location.assign('index.php');
            else
                $("#odgovor").html(response);
        })
    })

});

function dodaj(id)
{
    $.post("ajax/ajax.php?request=buy", {id: id}, function(response) {
        alert(response);
    });
}

function ukloni(idModela)
{
    $.get("ajax/ajax.php?request=refund", {idModela: idModela}, function(response) {
        alert(response);
        window.location.reload();
    });
}