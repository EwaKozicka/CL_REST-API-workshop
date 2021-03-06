<?php

require_once 'connDB.php';

class Book implements JsonSerializable {

    private $id, $name, $author, $description;

    public function __construct() {
        $this->id = -1;
        $this->name = '';
        $this->author = '';
        $this->description = '';

        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    function getAuthor() {
        return $this->author;
    }

    function getDescription() {
        return $this->description;
    }

    function setName($name) {
        if (!empty($name) && is_string($name) && strlen($name) < 255) {
            $newName = strtoupper($name[0]) . substr($name, 1);
            $this->name = $newName;
        }
    }

    function setAuthor($author) {
        if (!empty($author) && is_string($author) && strlen($author) < 255) {
            $newAuthorArray = [];
            $splittedAuthor = explode(" ", $author);
            foreach ($splittedAuthor as $part) {
                $newAuthorArray[] = strtoupper($part[0]) . substr($part, 1);
            }
            $newAuthor = implode(" ", $newAuthorArray);

            $this->author = $newAuthor;
        }
    }

    function setDescription($description) {
        if (!empty($description) && is_string($description)) {
            $this->description = $description;
        }
    }

    function create($conn, $name, $author, $description) {
        if ($this->getId() == -1 && !empty($name) && !empty($author) && !empty($description)) {

            $this->setName($name);
            $nameToAdd = $this->getName();
            $this->setAuthor($author);
            $authorToAdd = $this->getAuthor();
            $this->setDescription($description);
            $descriptionToAdd = $this->getDescription();

            $sql = "INSERT INTO `Book`(`name`, `author`, `description`) VALUES (:name, :author, :description);";

            try {
                $query = $conn->prepare($sql);
                $query->execute([
                    'name' => $nameToAdd,
                    'author' => $authorToAdd,
                    'description' => $descriptionToAdd,
                ]);

                $this->id = $conn->lastInsertId();

                return $this;
            } catch (PDOException $ex) {
                echo $ex->getMessage();

                return false;
            }
        } else {
            return null;
        }
    }

    function update($conn, $author, $description) {
        if ($this->getId() != -1) {

            $sql = "UPDATE `Book` SET `name` = :name, `author` = :author, `description` = :description WHERE `id` = :id;";

            $this->setAuthor($author);
            $verifiedAuthor = $this->getAuthor();
            $this->setDescription($description);
            $verifiedDescription = $this->getDescription();

            try {
                $query = $conn->prepare($sql);
                $result = $query->execute([
                    'name' => $this->getName(),
                    'author' => $verifiedAuthor,
                    'description' => $verifiedDescription,
                    'id' => $this->getId(),
                ]);

                return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();

                return false;
            }
        }
    }

    function deleteFromDB($conn) {
        if ($this->getId() !== -1) {

            $sql = "DELETE FROM `Book` WHERE `id` = :id;";

            try {
                $query = $conn->prepare($sql);
                $query->execute([
                    'id' => $this->getId(),
                ]);
                $this->id = -1;

                return true;
            } catch (PDOException $ex) {
                echo $ex->getMessage();

                return false;
            }
        } return true;
    }

    function loadFromDB($conn, $id) {

        $sql = 'SELECT * FROM `Book` WHERE `id` = :id';

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'id' => $id,
            ]);
            $book = $query->fetch(PDO::FETCH_ASSOC);

            $this->id = $book['id'];
            $this->name = $book['name'];
            $this->author = $book['author'];
            $this->description = $book['description'];
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        if ($book != null) {
            return $this;
        } else {
            return null;
        }
    }

    function loadAllFromDB($conn) {
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

                return $bookInfo;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "author" => $this->author,
            "description" => $this->description,
        ];
    }

}
