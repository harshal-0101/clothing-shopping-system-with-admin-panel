$(document).ready(function() {
    $("#product-d-btn").click(function() {
        $("#details").slideToggle()("slow");
        $("#down").hide();
        $("#up").show();
    });
});

var FavouriteItemBTN = document.getElementById('FavouriteItemBTN');
var UNFavouriteItemBTN = document.getElementById('UNFavouriteItemBTN');

FavouriteItemBTN.onclick = function() {
    UNFavouriteItemBTN.style.display = 'block';
    FavouriteItemBTN.style.display = 'none';
}
UNFavouriteItemBTN.onclick = function() {
    UNFavouriteItemBTN.style.display = 'none';
    FavouriteItemBTN.style.display = 'block';
}