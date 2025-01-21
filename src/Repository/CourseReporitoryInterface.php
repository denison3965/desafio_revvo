<?php

namespace App\Repository;

use App\Entity\CourseEntity;

interface CourseReporitoryInterface 
{
    public function create(CourseEntity $course);

    /**
     * Summary of listAll
     * @return CourseEntity[]
     */
    public function listAll(): array;

    public function update(string $id, CourseEntity $courseEntity): bool;
}