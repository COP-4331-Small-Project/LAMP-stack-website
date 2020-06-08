$(document).ready(function(){
    $("#searchText").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#contacts tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
