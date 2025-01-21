<?php 

require_once "../../../../vendor/autoload.php";

use App\Repository\CourseRepositoryPostgress;
use App\UseCases\ListCourseUseCase;

$useCase = new ListCourseUseCase(new CourseRepositoryPostgress());

var_dump($useCase->execute());