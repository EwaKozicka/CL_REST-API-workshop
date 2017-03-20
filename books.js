
$(function() {
    var container = $(".row");
    
    function loadBook() {
        container.html("");
        
        $.getJSON("./api/books.php", function(reply) {
            reply.forEach(function(book) {
                var title = $('<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">' + book.name + '</div><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">...Szczegóły...</div> ');
                container.append(title);
            });
        });
    }
    
    loadBook();
    
});