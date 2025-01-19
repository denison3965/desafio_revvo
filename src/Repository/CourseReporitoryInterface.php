<?php

namespace App\Repository;

use App\Entity\CourseEntity;

interface CourseReporitoryInterface 
{
    public function create(CourseEntity $course);
}