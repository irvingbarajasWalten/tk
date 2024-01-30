//lookup for events
function getEvents(){
    $.ajax({
        url: "/event/list",
        method:"GET",
        data:{
            "id":$("#destinationSearchIdValue").val(),
            "type":$("#destinationSearchType").val(),
            "search":$("#destinationSearchInput").val(),
            "lat": $("#destinationLat").val(),
            "long": $("#destinationLong").val(),
            "startDate": $("#startDate").val(),
            "endDate": $("#endDate").val(),
            "rad": $("#destinationRad").val()
        },
        beforeSend: function(){
            $("#events-content").html(preloader)
        },
        success: function(response){
            $("#events-content").html(response)
        },
        error: function(error){
            console.log(error)
        }
    })
}
$(document).ready(()=>{
    getEvents()
})

var searchTimeout = null;
//fill form inputs for get request
function autoFill(element){
    fillDestinationData(element.attr("search"),element.attr("searchId"),element.attr("searchType"),element.attr("long"),element.attr("lat"),element.attr("rad"))
}
//catching input keyup event (using timeout for handling the multiple requests in short time)
$("#destinationSearchInput").on("keyup",function(event){
    $(this).trigger("reset")
    clearTimeout(searchTimeout)
    searchTimeout = setTimeout(function(){
        getAutocomplete($("#destinationSearchInput").val())
    },700)
})
let preloader = '<div class="row mt-3"><div class="card" aria-hidden="true"><div class="card-body"><h5 class="card-title placeholder-glow"><span class="placeholder col-6"></span></h5><p class="card-text placeholder-glow"><span class="placeholder col-7"></span><span class="placeholder col-4"></span><span class="placeholder col-4"></span><span class="placeholder col-6"></span><span class="placeholder col-8"></span></p></div></div></div>'