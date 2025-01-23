<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Page Criar Curso</title>

    <script>
        function convertToBase64(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imageBase64').value = e.target.result;
                };
                reader.readAsDataURL(file);
            }
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

    
    <div class="container mt-5">
        <h1 class="text-center">Criar Curso</h1>
        <form action="submit_create.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" required placeholder="Digite o título do curso">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Digite a descrição do curso"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="convertToBase64(event)" required>
                <input type="hidden" id="imageBase64" name="imageBase64">
            </div>
            <!-- Botão de envio -->
            <button type="submit" class="btn btn-primary">Criar Curso</button>
        </form>
    </div>

</body>
</html>