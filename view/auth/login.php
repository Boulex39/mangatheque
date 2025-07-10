<?php
$title = 'Connexion';
ob_start();
?>

<h2>Connexion</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color: red;"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form action="/mangatheque/login" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <input type="submit" name="submit" value="Login">
    </div>
</form>

<?php
$content = ob_get_clean();
ob_end_clean();
require __DIR__ . '/../base-html.php';
