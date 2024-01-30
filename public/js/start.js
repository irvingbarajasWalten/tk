//fill form inputs for get request
function autoFill(element){
    if(element.attr("searchType")!='destination'){
        fillRegularData(element.attr("search"),element.attr("searchId"),element.attr("searchType"))
    }else{
        fillDestinationData(element.attr("search"),element.attr("searchId"),element.attr("searchType"),element.attr("long"),element.attr("lat"),element.attr("rad"))
    }
}
var searchTimeout = null;
//catching input keyup event (using timeout for handling the multiple requests in short time)
$("#regularSearchInput").on("keyup",function(event){
    $(this).trigger("reset")
    clearTimeout(searchTimeout)
    searchTimeout = setTimeout(function(){
        getAutocomplete($("#regularSearchInput").val())
    },700)
})
$("#destinationSearchInput").on("keyup",function(event){
    $(this).trigger("reset")
    clearTimeout(searchTimeout)
    searchTimeout = setTimeout(function(){
        getAutocomplete($("#destinationSearchInput").val())
    },700)
})