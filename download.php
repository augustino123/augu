<?php
// download.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];
    $format = $_POST['format'];

    // Validate URL
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        die("Invalid URL.");
    }

    // Command to use yt-dlp for downloading
    $outputDir = __DIR__ . '/downloads/';
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0755, true);
    }

    // Choose format
    $command = ($format === 'audio') ?
        "yt-dlp -x --audio-format mp3 -o '{$outputDir}%(title)s.%(ext)s' $url" :
        "yt-dlp -f best -o '{$outputDir}%(title)s.%(ext)s' $url";

    // Execute the command
    $output = [];
    $returnVar = 0;
    exec($command, $output, $returnVar);

    if ($returnVar === 0) {
        echo "Download completed successfully! Check the 'downloads' folder.";
    } else {
        echo "An error occurred during the download.";
    }
}
