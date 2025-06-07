<?php include 'views/partials/header.php'; ?>

<div class="container mt-4">
    <h2>Szerviz összesítő</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Szériaszám</th><th>Gyártó</th><th>Típus</th>
                <th>Leadás dátuma</th><th>Státusz</th><th>Kapcsolattartó</th><th>Telefon</th><th>Email</th><th>Művelet</th><th>Utolsó státuszváltozás időpontja</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): 
                $colors = [
                    'Beérkezett' => 'table-primary',
                    'Hibafeltárás' => 'table-danger',
                    'Alkatrész beszerzés alatt' => 'table-warning',
                    'Javítás' => 'table-secondary', //bootstrapben nem találtam lila színt ezért lett szürke, ha meg CSS-sel akartam ezt megváltoztatni, azt a bootstrap class felülírja//
                    'Kész' => 'table-success'
                ];
            ?>
            <tr class="<?= $colors[$product['status']] ?? '' ?>">
                <td><?= htmlspecialchars($product['serial_number']) ?></td>
                <td><?= htmlspecialchars($product['manufacturer']) ?></td>
                <td><?= htmlspecialchars($product['type']) ?></td>
                <td><?= $product['submission_date'] ?></td>
                <td><?= $product['status'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['phone'] ?></td>
                <td><?= $product['email'] ?></td>
                <td>
                    <a href="index.php?route=product/editStatus&id=<?= $product['id'] ?>" class="btn btn-sm btn-outline-secondary">Státusz</a>
                </td>
                <td><?= $product['submission_date'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'views/partials/footer.php'; ?>
