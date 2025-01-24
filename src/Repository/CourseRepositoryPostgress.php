<?php

namespace App\Repository;

use App\config\ConnectionDB;
use App\Entity\CourseEntity;

class CourseRepositoryPostgress implements CourseReporitoryInterface 
{

    private $connection;

    public function __construct() {
        $this->connection = new ConnectionDB();
    }

    public function create(CourseEntity $courseEntity) {
        $query = "INSERT INTO courses (title, description, image, url) VALUES (:title, :description, :image, :url)";
        $stmt = $this->connection->pdo->prepare($query);
        $stmt->bindParam(':title', $courseEntity->title);
        $stmt->bindParam(':description', $courseEntity->description);
        $stmt->bindParam(':image', $courseEntity->image);
        $stmt->bindParam(':url', $courseEntity->url);
        $stmt->execute();
        return true;
    }

    /**
     * @return CourseEntity[]
     */
    public function listAll(): array {
        $query = 'SELECT * FROM courses';
        $data = $this->connection->pdo->query($query)->fetchAll();

        $courses = [];
        foreach ($data as $value) {
            array_push($courses, new CourseEntity(
                $value['title'],
                $value['description'],
                $value['image'],
                $value['url']
            ));
        }

        return $courses;
    }

    public function update(string $id, CourseEntity $courseEntity): bool {
        $sql = "
            UPDATE courses SET
            title = ?,
            description = ?,
            image = ?,
            url = ? WHERE id = ?
        ";

        $sanitized_title = htmlspecialchars($courseEntity->title, ENT_QUOTES, 'UTF-8');
        $sanitized_description = htmlspecialchars($courseEntity->description, ENT_QUOTES, 'UTF-8');
        $sanitized_image = htmlspecialchars($courseEntity->image, ENT_QUOTES, 'UTF-8');
        $sanitized_url = htmlspecialchars($courseEntity->url, ENT_QUOTES, 'UTF-8');

        $statement = $this->connection->pdo->prepare($sql);
        $statement->bindParam(1, $sanitized_title);
        $statement->bindParam(2, $sanitized_description);
        $statement->bindParam(3, $sanitized_image);
        $statement->bindParam(4, $sanitized_url);
        $statement->bindParam(5, $id);
        return $statement->execute();

    }

    public function delete(string $id): bool {
        $sql = "DELETE FROM courses WHERE id = ?";
        $sanitized_id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
        
        $statement = $this->connection->pdo->prepare($sql);
        $statement->bindParam(1, $sanitized_id);
        return $statement->execute();
    }

}