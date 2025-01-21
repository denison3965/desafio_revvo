<?php

namespace App\UseCases;

use App\Repository\CourseReporitoryInterface;
use App\Entity\CourseEntity;

class ListCourseUseCase
{
    public function __construct(
        private CourseReporitoryInterface $repository
    ) {}

    /**
     * Summary of execute
     * @return CourseEntity[]
     */
    public function execute(): array {
        return $this->repository->listAll();
    }
}