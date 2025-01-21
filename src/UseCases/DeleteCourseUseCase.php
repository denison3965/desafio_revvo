<?php

namespace App\UseCases;

use App\Repository\CourseReporitoryInterface;

class DeleteCourseUseCase
{

    public function __construct(
        private CourseReporitoryInterface $repository
    ) {}

    public function execute(string $id): bool {
        return $this->repository->delete($id);
    }
}