
$(function () {
    $('a[id=btnAddCartItem]').bind('click', addCartItem);
    $('a[id=btnRemoveCartItem]').bind('click', removeCartItem);

    $('a[id=clearCart]').bind('click', function () {
        $.ajax({
            url: "/client/controller/cartitemmodifyajax.php",
            type: "post",
            data: { "action": "clear" },
            success: function(data){
                if (data.status == 1) {
                    var oListItems = $('#listItems');
                    // On parcours les TR et on les enlève
                    $('#listItems > tbody > tr').each(function () {
                        $(this).fadeOut('slow');
                    });
                    // On ajoute la ligne Aucun résultat
                    $('#listItems > tbody').append("<tr><td colspan='3'>Aucun résultat</td></tr>");

                    // Mise à jour des commandes
                    var oQuantity = $('#nbCartItems');
                    if (oQuantity != "undefined")
                        oQuantity.html("0");

                    // On grise les boutons
                    $('#validateCart').attr("disabled", true);
                    $('#clearCart').attr("disabled", true);
                }
                else
                    alert("Erreur pour vider le panier");
            },
            error:function(){
                alert("Erreur d'accès à la méthode de vider le panier");
            }
        });
    });

    function addCartItem() {
        modifyCartItem($(this), true);
    }

    function removeCartItem() {
        modifyCartItem($(this), false);
    }

    function modifyCartItem(anchorElement, add) {
        // Récupération de la ligne en cours
        var oTR = anchorElement.parent().parent();
        // Récupération de l'id de l'item
        var idItem = oTR.attr("id");
        // Récupération du libelle
        var oLibelle = oTR.find("#libelle");

        $.ajax({
            url: "/client/controller/cartitemmodifyajax.php",
            type: "post",
            data: { "id": idItem, "action": (add ? "add" : "remove") },
            success: function(data){
                var oTR = $('#' + data.id);
                if (data.status == 1) {
                    var oTR = $('#' + data.id);
                    // Récupération de la quantité
                    if (data.quantity == "0") {
                        oTR.fadeOut('slow');
                    } else {
                        var oQuantity = oTR.find("#quantity");
                        oQuantity.html(data.quantity);
                    }

                    // Mise à jour des commandes
                    // Récupération de la quantité
                    var oQuantity = $('#nbCartItems');
                    if (oQuantity != "undefined")
                        oQuantity.html(data.quantityTotal);
                }
                else
                    alert("Erreur de modification");
            },
            error:function(){
                alert("Erreur d'accès à la méthode de modification");
            }
        });
    }
});