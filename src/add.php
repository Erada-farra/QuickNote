<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $content = trim($_POST["content"]);

    if ($content !== "") {
        $file = __DIR__ . "/data/notes.json";
        $notes = json_decode(file_get_contents($file), true);

        $notes[] = [
            "content" => $content,
            "date" => date("Y-m-d H:i")
        ];

        file_put_contents($file, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}

header("Location: index.php");
exit;
