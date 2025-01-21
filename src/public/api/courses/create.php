<?php 

require_once "../../../../vendor/autoload.php";

use App\Repository\CourseRepositoryPostgress;
use App\UseCases\CreateCourseUseCase;

echo 'ola mundo';

// $c = new ConnectionDB();

$useCase = new CreateCourseUseCase(
    new CourseRepositoryPostgress()
);

var_dump(value: $useCase->execute('PHP', 'Another Courser', 'asndjkasndjkadnjakdn'));
