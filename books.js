
$(function () {
    var container = $("#books");

    function loadBook() {
        container.html("");

        $.getJSON("./api/books.php", function (resp) {
            resp.forEach(function (book) {
                var divRow = $('<div class="row"></div>');
                var div = $('<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 name"></div>');
                var div2 = $('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 desc row justify-content-center hide"></div>');
                var bookDelete = $('<button class="delete btn btn-md btn-secondary">Delete</input>');

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

                bookDelete.click(function () {

                    var id = $(this).prev().attr("data-id");

                    if (confirm("Are you sure you want to delete this book?")) {
                        $.ajax({
                            url: "api/books.php?id=" + id,
                            data: {id: id},
                            type: "DELETE"})
                            .done(function (response) {
                                $(this).parent().remove();
                        console.log(response);
                                alert('book deleted');
                                loadBook();
                            })
                            .fail(function () {
                                alert("Something went wrong, try again");
                            });
                    }
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



    }
    ;

//    function deleteBook() {
//        var deleteButtons = $("button.delete");
//        
//        deleteButtons.forEach(function(del) {
//            del.click(function() {
//                
//                var id = $(this).prev().attr("data-id");
//                
//                if(confirm("Are you sure you want to delete this book?")){
//                    $.ajax({
//                        url: 'api/books.php?id=' + id,
//                        type: 'DELETE',
//                        data: 'id=' + id,
//                        success: function() { 
//                            $(this).parent().remove();
//                            alert('book deleted');
//                            loadBook();
//                        }
//                    });
//                }
//            });
//        });
//        
//    }


    loadBook();
    addBook();
//    deleteBook();



});