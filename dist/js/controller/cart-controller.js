$(document).ready(function (eventData) {
    checkLogin(eventData);
    setCart(eventData);
});
function checkLogin(eventData) {
    $.ajax({
        method:"GET",
        url: "api/session.php?action=authentication",
        async: false
    }).done(function (response) {
        if(!response){
            window.location.replace("login.html");
        }
    })
}
function setCart(eventData) {
    $.ajax({
        method:"GET",
        url: "api/cart.php?action=all",
        async:false
    }).done(function (response) {
        $("#cartTable tbody tr").remove();
        response.forEach(function (cartItem) {
            var cart = '<tr id="'+cartItem.ItemDet.ItemID+'">' +
                '<td> <img src="dist/images/items/'+cartItem.ItemDet.ItemPic+'"> </td>'+
                '<td>'+cartItem.ItemDet.ItemTitle+'</td>'+
                '<td>'+cartItem.ItemDet.ItemPrice+'</td>'+
                '<td>'+cartItem.Qty+'</td>'+
                '<td><i class="fas fa-trash"></i></td>'+
                '</tr>'
            $("#cartTable tbody").append(cart);
        })
        $("#cartTable tbody tr td i").click(deleteItem);
    })
}
function deleteItem(eventData) {
    var catcheddEvt = eventData.target;
    var row = $($(catcheddEvt).parent()).parent();
    var itemID = $(row).attr("id");
    $.ajax({
        method:"DELETE",
        url:"api/cart.php?id="+itemID,
        async: false
    }).done(function (response) {
        if(response){
            alert("Cart Item deleted successfully!");
            setCart(null);
        }
    })
}