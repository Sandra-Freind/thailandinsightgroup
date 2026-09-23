<?php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$activeNav = 'contact';
$pageTitle = 'Kontakt';
$pageDescription = 'Kontakt zur Thailand Insight Group.';
require __DIR__ . '/includes/page-start.php';

if (empty($_SESSION['contact_csrf'])) {
    $_SESSION['contact_csrf'] = bin2hex(random_bytes(24));
}
$sent = false;
$formError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = trim((string) ($_POST['email'] ?? ''));
    $message = trim((string) ($_POST['message'] ?? ''));
    $token = (string) ($_POST['csrf'] ?? '');
    $trap = (string) ($_POST['website'] ?? '');

    if ($trap !== '' || !hash_equals((string) $_SESSION['contact_csrf'], $token)) {
        $formError = 'Die Sicherheitsprüfung ist fehlgeschlagen.';
    } elseif ($name === '' || mb_strlen($name) > 120 || !filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($message) < 3 || mb_strlen($message) > 5000) {
        $formError = 'Bitte prüfe deine Eingaben.';
    } else {
        $file = __DIR__ . '/data/messages.json';
        $rows = is_file($file) ? json_decode((string) file_get_contents($file), true) : [];
        if (!is_array($rows)) {
            $rows = [];
        }
        $rows[] = [
            'time' => date(DATE_ATOM),
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ];
        if (file_put_contents($file, json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX) !== false) {
            $sent = true;
            $_SESSION['contact_csrf'] = bin2hex(random_bytes(24));
        } else {
            $formError = 'Die Nachricht konnte nicht gespeichert werden. Der Ordner data braucht Schreibrechte.';
        }
    }
}
$c = $cms['contact'];
?>
<section class="contact-page">
    <h1><?= e($c['title']) ?></h1>
    <p><?= e($c['subtitle']) ?></p>
    <p class="meta">
        Email: <?= e($cms['site']['contact_email']) ?><br>
        Tel: <?= e($cms['site']['contact_phone']) ?>
    </p>
    <?php if ($sent): ?><p class="success"><?= e($c['success']) ?></p><?php endif; ?>
    <?php if ($formError !== ''): ?><p class="error"><?= e($formError) ?></p><?php endif; ?>
    <form class="contact-form" method="post" action="kontakt.php">
        <input type="hidden" name="csrf" value="<?= e((string) $_SESSION['contact_csrf']) ?>">
        <div style="position:absolute;left:-9999px" aria-hidden="true">
            <label>Website</label>
            <input name="website" tabindex="-1" autocomplete="off">
        </div>
        <label><?= e($c['name_label']) ?></label>
        <input name="name" maxlength="120" required>
        <label><?= e($c['email_label']) ?></label>
        <input type="email" name="email" maxlength="254" required>
        <label><?= e($c['message_label']) ?></label>
        <textarea name="message" maxlength="5000" required></textarea>
        <button type="submit"><?= e($c['button']) ?></button>
    </form>
</section>
<?php require __DIR__ . '/includes/page-end.php'; ?>
