<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($pageTitle)
                ? $pageTitle
                : "St Patricks' - Brain Break"; ?></title>
    <link rel="stylesheet" href="styles/app.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <?php if (isset($headerScripts)) {
        echo $headerScripts;
    } ?>
</head>

<body>
    <div class="container">
        <h1 class="display-1">🧠 No Brainer</h1>
        <p class="lead">Take a brain break.</p>

        <ul class="nav nav-pills mb-4 justify-content-center">
            <li class="nav-item">
                <a class="nav-link<?php echo $currentPage === 'game-wheel' ? ' active' : ''; ?>" href="index.php?page=game-wheel">Online Games</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo $currentPage === 'real-life-games' ? ' active' : ''; ?>" href="index.php?page=real-life-games">Real-Life Games</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo $currentPage === 'jokes' ? ' active' : ''; ?>" href="index.php?page=jokes">Jokes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link<?php echo $currentPage === 'trivia' ? ' active' : ''; ?>" href="index.php?page=trivia">Trivia</a>
            </li>
        </ul>

        <!-- Content slot where page-specific content will be injected -->
        <div id="content">
            <?php if (isset($content)) {
                echo $content;
            } ?>
        </div>

        <?php if (isset($footerScripts)) {
            echo $footerScripts;
        } ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </div>
</body>

</html>