$(document).ready(function () {
  $(".show_pizza").click(function (event) {
    event.preventDefault();

    var pizzaName = $(this).data("name");
    var pizzaId = $(this).data("id");

    $.ajax({
      url: "/pizzas/ingredients/" + pizzaId,
      type: "GET",
      success: function (response) {
        $("#detail .grid-title").text("Pizza: " + pizzaName);
        var ingredientContainer = $(".grid_ingredients");
        ingredientContainer.empty();
        var total = 0;
        response.forEach(function (ingredient) {
          var ingredientElement = $("<div>", {
            class: "grid-item",
            text: ingredient.ingredient_name,
          });

          ingredientContainer.append(ingredientElement);
          total += parseFloat(ingredient.price);
        });
        total *= 1.5;
        $(".grid_total .amount").text(total.toFixed(2));
        $("#detail").css("display", "block");
        $("#changes").css("display", "block");
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });
  $(".add_ingredient").click(function (event) {
    event.preventDefault();
    var ingredientName = $(this).data("name");
    var price = $(this).data("price");
    var ingredientContainer = $(".grid_ingredients");
    var ingredientElement = $("<div>", {
      class: "grid-item",
      text: ingredientName,
    });

    ingredientContainer.append(ingredientElement);
    var totalPre = $(".grid_total .amount").text();
    var newTotal = parseFloat(totalPre) + price * 1.5;
    $(".grid_total .amount").text(newTotal);
  });
});
