<?php include 'views/partials/header.php'; ?>

<div class="container mt-4">
    <h2>Státusz módosítása</h2>
    <form method="POST" action="index.php?route=product/updateStatus">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <div class="mb-3">
            <label>Státusz:</label>
            <select name="status" class="form-select">
                <?php foreach (['Beérkezett', 'Hibafeltárás', 'Alkatrész beszerzés alatt', 'Javítás', 'Kész'] as $status): ?>
                    <option value="<?= $status ?>" <?= $product['status'] == $status ? 'selected' : '' ?>><?= $status ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Mentés</button>
    </form>
</div>

<?php include 'views/partials/footer.php'; ?>
