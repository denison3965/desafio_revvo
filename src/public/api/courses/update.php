<?php 

require_once "../../../../vendor/autoload.php";

use App\Entity\CourseEntity;
use App\Repository\CourseRepositoryPostgress;
use App\UseCases\ListCourseUseCase;
use App\UseCases\UpdateCourseUseCase;


$useCase = new UpdateCourseUseCase(new CourseRepositoryPostgress());

$out = $useCase->execute('2', 'Title Updated', "Updated !! <script>alert('XSS');</script>", '123123213ndsjkbaskhdjfhbqwj');

var_dump($out);