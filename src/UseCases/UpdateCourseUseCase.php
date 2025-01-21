<?php 


namespace App\UseCases;

use App\Entity\CourseEntity;
use App\Repository\CourseReporitoryInterface;

class UpdateCourseUseCase
{
    public function __construct(
        private CourseReporitoryInterface $repository
    ) {}

    public function execute(
        string $id,
        string $title,
        string $description,
        string $image,
    ): bool {
        $result = $this->repository->update($id, new CourseEntity(
            $title,
            $description,
            $image
        ));

        return $result;
    }

}