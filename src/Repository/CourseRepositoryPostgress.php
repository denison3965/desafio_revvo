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
}