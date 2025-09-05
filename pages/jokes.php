<?php
// Set page-specific title
$pageTitle = "St Patricks' - Brain Break | Jokes";
// Page content
$jokes = json_decode(file_get_contents(__DIR__ . '/../content/jokes.json'), true);
?>
<div class="jokes-container">
    <h2>Jokes</h2>

    <div class="row">
        <?php foreach ($jokes as $joke): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $joke['question']; ?></h5>
                        <p class="card-text"><?= $joke['answer']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>