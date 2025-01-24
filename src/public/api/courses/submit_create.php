<?php 

require_once "../../../../vendor/autoload.php";
use App\Repository\CourseRepositoryPostgress;
use App\UseCases\CreateCourseUseCase;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $imageBase64 = $_POST['imageBase64'];
    $url = $_POST['url'];

    if ($title && $description && $imageBase64 && $url) {
        $useCase = new CreateCourseUseCase(
            new CourseRepositoryPostgress()
        );
        $useCase->execute($title, $description, $imageBase64, $url);
        header("Location: list.php");
        exit;
    } else {
        echo "Erro: Todos os campos são obrigatórios.";
    }
}