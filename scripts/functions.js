function asc_sort(a, b){
        return ($(b).text()) < ($(a).text()) ? 1 : -1;    
    }

function updateList(){
    $("#ingredientsListSide").empty();
    var favorite = [];
    var stringListIngredients = "";
    $.each($('input[type=checkbox]:checked'), function(){            
        favorite.push($(this).val().toLowerCase());
    });
    $.each(favorite, function( index, value ) {
        var foodName = value.substring(0,value.indexOf("_"));
        var foodId = value.substring(value.indexOf("_")+1);
        $("#ingredientsListSide").append('<li class="list-group-item" value="'+foodId+'" style="height: 30px; padding: 5px 15px;"><i class="far fa-trash-alt iconFood" id="iconFood'+foodId+'" style="color:red"></i></button>'+'&nbsp&nbsp'+foodName+'</li>');
        stringListIngredients = stringListIngredients + ',' + foodId;
    });
    $("#ingredientsListSide li").sort(asc_sort).appendTo('#ingredientsListSide');
    $("#listIngredients").val(stringListIngredients);
}


$( document ).ready(function(){
    updateList();

    $(document).on('click', '.iconFood', function(ev) {
    // $(".iconFood").click(function(ev){
        var foodId = ev.target.id.substring(8)
        $("#exampleCheck"+foodId).click(); // Unchecks the ingredient
        // updateList();
        // console.log(foodId);
    })


});