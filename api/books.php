<?php

require_once './src/connDB.php';
require_once './src/book.php';

if ('GET' === $_SERVER['REQUEST_METHOD']) {
    $bookInfo = [];
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