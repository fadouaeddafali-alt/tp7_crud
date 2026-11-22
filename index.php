
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des formations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            Gestion des formations
        </a>
    </div>
</nav>

<div class="container mt-5">

    <h1 class="text-center mb-4">
        Bienvenue dans notre application
    </h1>

    <p class="text-center text-muted">
        Application de gestion des formations,
        des étudiants et des modules.
    </p>

    <div class="row mt-5 g-4">

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h4>Formations</h4>
                    <p>Gérer les formations.</p>
                    <a href="formation/index.php"
                       class="btn btn-primary">
                        Accéder
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h4>Étudiants</h4>
                    <p>Gérer les étudiants.</p>
                    <a href="etudiant/index.php"
                       class="btn btn-success">
                        Accéder
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h4>Modules</h4>
                    <p>Gérer les modules.</p>
                    <a href="module/index.php"
                       class="btn btn-warning">
                        Accéder
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
