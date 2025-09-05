<?php
// Set page-specific title
$pageTitle = "St Patricks' - Brain Break | Real-Life Games";
// Page content
$games = json_decode(file_get_contents(__DIR__ . '/../content/real-life-games.json'), true);
?>
<div id="real-life-games-container">
    <h2>Real-Life Games</h2>


    <div class="row">
        <?php foreach ($games as $i => $game): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $game['name']; ?></h4>
                        <h6 class="card-subtitle text-muted"><?php echo $game['description']; ?></h6>
                        <?php if (!empty($game['howToPlay'])): ?>
                            <button
                                type="button"
                                class="btn btn-primary btn-sm mt-3 how-to-play-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#how-to-play"
                                data-title="<?php echo htmlspecialchars($game['name']); ?>"
                                data-body="<?php echo htmlspecialchars($game['howToPlay']); ?>">How to play</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal Body -->
<div
    class="modal fade"
    id="how-to-play"
    tabindex="-1"
    data-bs-backdrop="dynamic"
    data-bs-keyboard="true"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">How to Play</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Select a game to see how to play!</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var backdrop = document.getElementById('real-life-games-container');
        var modal = document.getElementById('how-to-play');
        var modalTitle = modal.querySelector('.modal-title');
        var modalBody = modal.querySelector('.modal-body');
        var buttons = document.querySelectorAll('.how-to-play-btn');
        buttons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var title = btn.getAttribute('data-title');
                var body = btn.getAttribute('data-body');
                modalTitle.textContent = title + ' - How to Play';
                modalBody.textContent = body;
            });
        });
    });
</script>