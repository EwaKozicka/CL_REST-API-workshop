
$(function () {
    var container = $("#books");

    function loadBook() {
        container.html("");

        $.getJSON("./api/books.php", function (resp) {
            resp.forEach(function (book) {
                var divRow = $('<div class="row"></div>');
                var div = $('<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 name"></div>');
                var div2 = $('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc row justify-content-center hide"></div>');
                var bookDelete = $('<button class="push btn btn-md btn-secondary">Delete</input>');
                var bookUpdate = $('<button class="push btn btn-md btn-secondary">Update</input>');

                divRow.appendTo(container);
                div.appendTo(divRow);
                div.text(book.name);
                div.attr("data-id", book.id);
                bookDelete.appendTo(divRow);
                bookUpdate.appendTo(divRow);
                divRow.appendTo(container);
                div2.appendTo(container);

//rozwijanie opisu
                div.click(function () {
                    $.getJSON("./api/books.php?id=1", {id: div.attr("data-id")}, function (response) {
                        div2.html("");
                        var i1 = $('<p>Author: <input class="input" type="text" value="' + response.author + '"></p>');
                        var i2 = $('<p>Description: <textarea class="input" rows="4">' + response.description + '</textarea></p>');
                        div.parent().next().toggleClass("hide");

                        i1.appendTo(div2);
                        i2.appendTo(div2);
                    });
                });

                bookDelete.click(function () {

                    var id = $(this).prev().attr("data-id");
                    //nie wiem, jak inaczej dostać się do tego elementu, próbowałam robić tę funkcję nie wewnątrz funkcji loadBook, jednak wtedy nie działa wybieranie elementów; wiem, że to rozwiązanie jest wrażliwe na zmiany pozycji elementów, ale na lepsze nie wpadłam

                    if (confirm("Are you sure you want to delete this book?")) {
                        $.ajax({
                            url: "api/books.php?id=" + id,
                            data: {id: id},
                            type: "DELETE"})
                                .done(function (response) {
                                    $(this).parent().remove();
                                    alert('book deleted');
                                    loadBook();
                                })
                                .fail(function () {
                                    alert("Something went wrong, try again");
                                });
                    }
                });


                bookUpdate.click(function () {
                    var id = $(this).prev().prev().attr("data-id");
                    var author = $(this).parent().next().find("input").val();
                    var desc = $(this).parent().next().find("textarea").val();
                    $.ajax({
                        url: 'api/books.php?id='+id,
                        data: {id: id, author: author, description: desc},
                        type: "PUT"})
                            .done(function (response) {
                                console.log(response);
                                alert('book updated');
                                loadBook();
                            })
                            .fail(function () {
                                alert("Something went wrong, try again");
                            });
                });



            });
        });

    }

    function addBook() {
        var submit = $("#submit");

        submit.click(function (event) {
            event.preventDefault();

            var title = $("#title");
            var author = $("#author");
            var description = $("#desc");

            $.ajax({
                url: "./api/books.php",
                data: {title: title.val(), author: author.val(), description: description.val()},
                type: "POST",
                dataType: "json"})
                    .done(function (response) {
                        if (response == "success") {
                            loadBook();
                            title.val("");
                            author.val("");
                            description.val("");
                            alert("book added");
                        }
                    })
                    .fail(function () {
                        alert("Something went wrong, try again");
                    });

        });



    };

    loadBook();
    addBook();

});