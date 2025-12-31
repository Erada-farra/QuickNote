<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $index = $_POST["index"];

    $file = __DIR__ . "/data/notes.json";
    $notes = json_decode(file_get_contents($file), true);

    if (isset($notes[$index])) {
        array_splice($notes, $index, 1);
        file_put_contents($file, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}

header("Location: index.php");
exit;
