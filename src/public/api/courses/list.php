<?php 

require_once "../../../../vendor/autoload.php";

use App\Repository\CourseRepositoryPostgress;
use App\UseCases\ListCourseUseCase;

$useCase = new ListCourseUseCase(new CourseRepositoryPostgress());

$courses = $useCase->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="http://localhost:8080/assets/style.css" rel="stylesheet"/>
    <title>Lista de cursos</title>

    <script>
        function convertToBase64(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                objReader.onload = function(e) {
                    document.getElementById('imageBase64').value = e.target.result;
                };
                objReader.readAsDataURL(file);
            }
        }

        function openLink(link) {
            window.open(link, '_blank');
        }
    </script>

</head>
<body>
    <header class="py-3 border-bottom header-custumer">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
        <div class="">
            <img height="25px" src="https://c5gwmsmjx1.execute-api.us-east-1.amazonaws.com/prod/empresa/logo/158128/revvo_.png" alt="logo">
        </div>
        <div class="d-flex align-items-center">
            <form class="w-100 me-3">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <div class="flex-shrink-0 dropdown">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            </div>
        </div>
        </div>
    </header>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <div class="carousel-inner">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>     
            </div>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="info-carousel">
                    <div class="tittle">LOREM IPSUM</div>
                    <div class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                    </div>
                    <button type="button" class="btn btn-outline-light ms-3 mt-3"> VER CURSO</button>
                </div>
                <img style="object-fit: cover" height="400px" src="https://ejep.com.br/wp-content/uploads/2023/12/tipos-de-empreendedorismo.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <div class="info-carousel">
                    <div class="tittle">LOREM IPSUM</div>
                    <div class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                    </div>
                    <button type="button" class="btn btn-outline-light ms-3 mt-3"> VER CURSO</button>
                </div>
                <img style="object-fit: cover" height="400px"  src="https://ejep.com.br/wp-content/uploads/2023/12/tipos-de-empreendedorismo.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <div class="info-carousel">
                    <div class="tittle">LOREM IPSUM</div>
                    <div class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                    </div>
                    <button type="button" class="btn btn-outline-light ms-3 mt-3"> VER CURSO</button>
                </div>
                <img style="object-fit: cover" height="400px" src="https://ejep.com.br/wp-content/uploads/2023/12/tipos-de-empreendedorismo.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="container main-container mt-5 ms-4 me-4">
        <h5> MEUS CURSOS </h5>
        <hr>
        
        <div class="container my-5">
            <div class="d-flex flex-wrap justify-content-start gap-3">
                
                <?php foreach ($courses as $course): ?>
                    <div class="card" style="width: 18rem;">
                        <img src=" <?= $course->image ?> " class="card-img-top" alt="..." style="max-height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"> <?= $course->title ?> </h5>
                            <p class="card-text" style="min-height: 50px;"> <?= $course->description ?> </p>
                            <button onclick="openLink(' <?= $course->url ?> ')" type="button" class="btn btn-success">VER CURSO</button>
                        </div>
                    </div>
                <?php endforeach ?>

                <div onclick="(window.location.href='http://localhost:8080/api/courses/create.php')" class="add-new-course d-flex align-items-center justify-content-center text-center" style="width: 18rem; color: gray; font-weight: bolder; font-size: large; cursor: pointer;">
                    + <br>
                    Adiciona <br>
                    Curso <br>
                </div>

            </div>
        </div>

    </div>


</body>
</html>