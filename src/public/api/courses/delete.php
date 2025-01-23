<?php 

require_once "../../../../vendor/autoload.php";

use App\Repository\CourseRepositoryPostgress;
use App\UseCases\DeleteCourseUseCase;


$useCase = new DeleteCourseUseCase(new CourseRepositoryPostgress());
$out = $useCase->execute('3');

var_dump($out);

//TODO: FAZER FRONT