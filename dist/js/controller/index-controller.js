$(document).ready(function () {
    checkLogin();
    loadItems();
});
function loadItems(eventData) {
    $.ajax({
        method:"GET",
        url:"api/item.php?action=all",
        async: true
    }).done(function (response) {
        response.forEach(function (item) {
            var code = '<div class="item col-12 col-md-3">' +
                '<br><br>'+
                '       <input type="text" value="'+item.ItemID+'" class="hidden">'+
                '        <img src="dist/images/items/'+item.ItemPic+'" class="itemImg"/><br><br>' +
                '        <h4 class="Title">'+item.ItemTitle+'</h4><br>' +
                '        Price : <p1 class="priceTxt">'+item.ItemPrice+' LKR</p1><br><br>' +
                '        <button type="button" class="btn btn-success">Add to Cart</button><br/> <br>' +
                '    </div>'
            $("#itemsDiv").append(code);
            // console.log($("#itemsDiv div"));
        })
        $("#itemsDiv div").click(clickedDiv);
    })
}
function clickedDiv(eventData) {

    var clickedItem = eventData.target;
    if(clickedItem.tagName === "BUTTON"){
        window.location.assign("#");
        return;
    }
    var text = $(clickedItem).children("input");
    if(text === undefined || text === null){
        clickedItem = $(clickedItem).parent();
        text = $(clickedItem).children("input");
        console.log("Hi");
    }
    var id = $(text).val();
    window.location.assign("item.html?id="+id);
}
function checkLogin(eventData) {
    $.ajax({
        method:"GET",
        url: "api/session.php?action=authentication",
        async: false
    }).done(function (response) {
        if(!response){
            $("#UsernameDiv div").remove();
            var code = '<div id="SigninLinkDiv" class="navigations">' +
                '<a class="nav-item" href="login.html">Sign In</a>'+
                '</div>'
            $("#UsernameDiv").append(code);
        }
    })
}