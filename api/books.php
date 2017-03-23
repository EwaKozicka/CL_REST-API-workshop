

<?php

require_once './src/connDB.php';
require_once './src/book.php';

if ('GET' === $_SERVER['REQUEST_METHOD']) {
    $bookInfo = [];
    
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $book = new Book();
        $bookInfo = $book->loadFromDB($conn, $id);
        echo json_encode($bookInfo);
        
    } else {
        
        $sql = "SELECT `id` FROM `Book`;";

        try {
            $query = $conn->prepare($sql);
            $result = $query->execute();

            if ($result == true) {

                $idArray = $query->fetchAll();

                foreach ($idArray as $id) {
                    $book = new Book();
                    $bookInfo[] = $book->loadFromDB($conn, $id['id']);
                }
                echo json_encode($bookInfo);
            } else {
                echo "brak książek w bazie danych";
            }
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }  
}


if ('POST' === $_SERVER['REQUEST_METHOD']) {
    if (isset($_POST['title'], $_POST['author'], $_POST['description'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $desc = $_POST['description'];
        
        $book = new Book();
        $result = $book->create($conn, $title, $author, $desc);
        
        if ($result === null) {
            echo json_encode("empty");
        } else if ($result !== false) {
            echo json_encode("success");
        }
    }
}


if ('DELETE' === $_SERVER['REQUEST_METHOD']) {
    parse_str(file_get_contents("php://input"), $del_vars);
    $id = $del_vars['id'];
    
    $book = new Book();
    $book->loadFromDB($conn, $id);
    $result = $book->deleteFromDB($conn);
    
    if ($result = true) {
        echo json_encode("deleted");
    }
}

if ('PUT' === $_SERVER['REQUEST_METHOD']) {
    parse_str(file_get_contents("php://input"), $put_vars);
    
    var_dump($put_vars);
    
    $id = $put_vars['id'];
    $author = $put_vars['author'];
    $description = $put_vars['description'];
    
    $book = new Book();
    $book->loadFromDB($conn, $id);
    $name = $book->getName();
    $result = $book->update($conn, $name, $author, $description);
    
    if ($result != false) {
        echo json_encode("updated");
    }
}