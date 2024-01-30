function getAutocomplete(search){
    $.ajax({
        url: "/autocomplete",
        method:"GET",
        data:{"search":search},
        success: function(response){
            $("#results").css({"display":"block"})
            $("#results").html(response)
        },
        error: function(error){
            console.log(error)
        }
    })
}
function fillRegularData(search,id,type){
    $("#regularSearchInput").val(search)
    $("#regularSearchIdValue").val(id)
    $("#regularSearchType").val(type)
    $("#results").css({"display":"none"})
    $("#regularSearchForm").submit()
}
function fillDestinationData(search,id,type,long,lat,rad){
    $("#destinationSearchInput").val(search)
    $("#destinationSearchIdValue").val(id)
    $("#destinationSearchType").val(type)
    $("#destinationLat").val(lat)
    $("#destinationLong").val(long)
    $("#destinationRad").val(rad)
    $("#results").css({"display":"none"})
}