<?php


namespace App\UseCases;

use App\Entity\CourseEntity;
use App\Repository\CourseReporitoryInterface;

class CreateCourseUseCase 
{

    public function __construct(
        private CourseReporitoryInterface $repository
    ) {}

    public function execute(
        string $title,
        string $description,
        string $image,
        string $url
    ) {
        $course = new CourseEntity($title, $description, $image, $url);
        $this->repository->create($course);
        return true;
    }
}