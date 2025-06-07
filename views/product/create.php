<?php include 'views/partials/header.php'; ?>

<div class="container mt-4">
    <h2>Új termék leadása</h2>
    <form method="POST" action="index.php?route=product/store">
        <div class="mb-3"><label>Szériaszám:</label><input type="text" name="serial" class="form-control" required></div>
        <div class="mb-3"><label>Gyártó:</label><input type="text" name="manufacturer" class="form-control" required></div>
        <div class="mb-3"><label>Típus:</label><input type="text" name="type" class="form-control" required></div>
        <hr>
        <div class="mb-3"><label>Név:</label><input type="text" name="name" class="form-control" required></div>
        <div class="mb-3"><label>Telefon:</label><input type="text" name="phone" class="form-control" required></div>
        <div class="mb-3"><label>Email:</label><input type="email" name="email" class="form-control" required></div>
        <button type="submit" class="btn btn-primary">Mentés</button>
    </form>
</div>

<?php include 'views/partials/footer.php'; ?>
