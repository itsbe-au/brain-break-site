<?php
// Set page-specific title
$pageTitle = "St Patricks' - Brain Break | Trivia";
// Page content
$trivia = json_decode(file_get_contents(__DIR__ . '/../content/trivia.json'), true);
?>
<div class="trivia-container">
    <h2>Trivia</h2>

    <div class="row">
        <?php foreach ($trivia as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><?= $item; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>