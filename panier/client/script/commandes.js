

$(function () {
    function updateNBCommands() {
        $.ajax({
            url: "/client/controller/cartjson.php",
            type: "post",
            data: null,
            success: function(data){
                if (data.status == 1) {
                    // Récupération de la quantité
                    var oQuantity = $('#nbCartItems');
                    if (oQuantity != "undefined")
                        oQuantity.html(data.quantity);
                }
            },
            error:function(){
                alert("Erreur d'accès à la méthode des commandes");
            }
        });
    }

    updateNBCommands();
});