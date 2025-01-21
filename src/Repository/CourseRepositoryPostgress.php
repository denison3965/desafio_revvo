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
        $query = "INSERT INTO courses (title, description, image) VALUES (:title, :description, :image)";
        $stmt = $this->connection->pdo->prepare($query);
        $stmt->bindParam(':title', $courseEntity->title);
        $stmt->bindParam(':description', $courseEntity->description);
        $stmt->bindParam(':image', $courseEntity->image);
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
                $value['image']
            ));
        }

        return $courses;
    }

    public function update(string $id, CourseEntity $courseEntity): bool {
        $sql = "
            UPDATE courses SET
            title = ?,
            description = ?,
            image = ? WHERE id = ?
        ";

        $sanitized_title = htmlspecialchars($courseEntity->title, ENT_QUOTES, 'UTF-8');
        $sanitized_description = htmlspecialchars($courseEntity->description, ENT_QUOTES, 'UTF-8');
        $sanitized_image = htmlspecialchars($courseEntity->image, ENT_QUOTES, 'UTF-8');


        $statement = $this->connection->pdo->prepare($sql);
        $statement->bindParam(1, $sanitized_title);
        $statement->bindParam(2, $sanitized_description);
        $statement->bindParam(3, $sanitized_image);
        $statement->bindParam(4, $id);
        return $statement->execute();

    }

}