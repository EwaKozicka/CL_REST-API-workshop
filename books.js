
$(function () {
    var container = $("#books");

    function loadBook() {
        container.html("");

        $.getJSON("./api/books.php", function (resp) {
            resp.forEach(function (book) {
                var divRow = $('<div class="row"></div>');
                var div = $('<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 name"></div>');
                var div2 = $('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc row justify-content-center hide"></div>');
                var bookDelete = $('<button class="btn btn-md btn-secondary delete">Delete</input>');

                divRow.appendTo(container);
                div.appendTo(divRow);
                div.text(book.name);
                div.attr("data-id", book.id);
                bookDelete.appendTo(divRow);
                divRow.appendTo(container);
                div2.appendTo(container);

                
                div.click(function () {
                    $.getJSON("./api/books.php?id=1", {id: div.attr("data-id")}, function (response) {
                        div2.html("");
                        var p1 = $("<p>" + "Author: " + response.author + "</p>");
                        var p2 = $("<p>" + "Description: " + response.description + "</p>");
                        div.parent().next().toggleClass("hide");
                        p1.appendTo(div2);
                        p2.appendTo(div2);
                    });
                });

            });
        });

    }

    loadBook();

});