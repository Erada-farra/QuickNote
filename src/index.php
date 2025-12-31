<?php
$notesFile = __DIR__ . "/data/notes.json";
$notes = json_decode(file_get_contents($notesFile), true);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تطبيق الملاحظات</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h1>📒 تطبيق الملاحظات</h1>

    <form class="note-form" action="add.php" method="POST">
        <textarea name="content" placeholder="اكتب ملاحظتك هنا..." required></textarea>
        <button type="submit">إضافة ملاحظة</button>
    </form>

    <h2>ملاحظاتك</h2>

    <div class="notes-list">
        <?php if (empty($notes)): ?>
            <p class="empty">لا توجد ملاحظات بعد.</p>
        <?php else: ?>
            <?php foreach ($notes as $index => $note): ?>
                <div class="note">
                    <p><?= htmlspecialchars($note['content']) ?></p>
                    <small><?= $note['date'] ?></small>

                    <form action="delete.php" method="POST">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <button class="delete-btn">حذف</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<script src="assets/app.js"></script>
</body>
</html>
