$(document).ready(function (eventData) {
    checkLogin(eventData);
    loadData();
})
function loadData(){
    var x = location.search;
    var qStringArr = x.split("=");
    console.log(qStringArr);
    if(qStringArr.length !== 2){
        alert("Error loading page!");
        return;
    }
    var itemid = qStringArr[1];
    $.ajax({
        method:"GET",
        url: "api/item.php?action=one&id="+itemid,
        async:true
    }).done(function (response) {
        if(response === null){
            return;
        }
        $("#imgPro").attr("src","dist/images/items/"+response.ItemPic)
        $("#Title").text(response.ItemTitle);
        $("#stock").text(response.stock);
        $("#PriceDiv").text(response.ItemPrice);
    })
}
$("#btnAddToCart").click(btnClick);
function btnClick(eventData){
    var x = location.search;
    var qStringArr = x.split("=");
    console.log(qStringArr);
    if(qStringArr.length !== 2){
        alert("Error loading page!");
    }
    var itemid = qStringArr[1];
    var qty = parseInt($("#txtQty").val());
    $.ajax({
        method:"POST",
        url:"api/cart.php",
        data:{
            action: "save",
            itemID: itemid,
            qty: qty
        },
        async: true
    }).done(function (response) {
        if(!response){
            alert("Adding cart failed!");
        }else {
            alert("successfully added to the");
        }
    })
}
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