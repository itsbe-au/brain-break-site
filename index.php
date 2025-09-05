<?php
// Default to game-wheel if no page is specified
$currentPage = isset($_GET["page"]) ? $_GET["page"] : "game-wheel";

// Sanitize the page name to prevent directory traversal attacks
$currentPage = basename($currentPage);

// Set the default page title
$pageTitle = "St Patricks' - Brain Break";

// Initialize variables that can be set by included pages
$headerScripts = "";
$content = "";
$footerScripts = "";

// Check if the requested page file exists
$pagePath = __DIR__ . "/pages/" . $currentPage . ".php";

// If the page exists, include it to populate the variables
if (file_exists($pagePath)) {
    // We use output buffering to capture the content
    ob_start();
    include $pagePath;
    $content = ob_get_clean();
} else {
    // If page doesn't exist, show a 404 message
    $content = '<div class="notification is-warning">
                    <p>Sorry, the requested page was not found.</p>
                    <p><a href="index.php">Return to home page</a></p>
                </div>';
}

// Include the layout which will use the variables we've set
include __DIR__ . "/layout.php";
