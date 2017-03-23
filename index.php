<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <title>REST-API CL Workshop</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="rest-api.css" rel="stylesheet">
        <script src="jquery-3.1.1.js"></script>
        <script src="books.js"></script>
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
                                <div class="field">
                                <label class="control-label" for="title">Title:</label>
                                <input type="text" id ="title" class="form-horizontal" name="title" placeholder="Name...">
                                </div>
                                <div class="field">
                                <label class="control-label" for="author">Author:</label>
                                <input type="text" id="author" class="form-horizontal" name="author" placeholder="Author...">
                                </div>
                                <div class="field">
                                <label class="control-label" for="description">Description:</label>
                                <input type="text" id="desc" class="form-horizontal" name="description" placeholder="Description...">
                                </div>
                            </div>
                            <input type="submit" id="submit" class="btn btn-md btn-secondary" value="Add book"></input>

                            <h2 class="lead">Your books:</h2>
                    </div>

                </div>
                <div id="books">

                </div>
            </div>
        </div>

        
    </body>
</html>