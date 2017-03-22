<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>REST-API CL Workshop</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="rest-api.css" rel="stylesheet">
    </head>

    <body>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                <div class="cover-container">
                    <div class="inner cover">
                        <h1 class="cover-heading">Manage your library</h1>
                        <h2 class="lead">Add a new book:</h2>
                        <form action="" method="post" role="form">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" id ="title" class="form-control" name="title" placeholder="Name...">
                                <label for="author">Author:</label>
                                <input type="text" id="author" class="form-control" name="author" placeholder="Author...">
                                <label for="description">Description:</label>
                                <input type="text" id="desc" class="form-control" name="description" placeholder="Description...">
                            </div>
                            <input type="submit" id="submit" class="btn btn-md btn-secondary" value="Add book"></input>

                            <h2 class="lead">Your books:</h2>
                    </div>

                    <!--                 
                                <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
                                
                                <p class="lead">
                                  <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
                                </p>-->
                </div>
                <div id="books">

                </div>
            </div>
        </div>

        <script src="jquery-3.1.1.js"></script>
        <script src="books.js"></script>
    </body>
</html>