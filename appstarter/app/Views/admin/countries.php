<h1>Countries</h1>
<form action="/admin/add-country" method="post">
    <input type="text" name="name" placeholder="Country name" required>
    <button type="submit">Add</button>
</form>
<ul>
    <?php foreach ($countries as $country): ?>
        <li>
            <?= $country['name'] ?>
            <a href="/admin/edit-country/<?= $country['id'] ?>">Edit</a>
            <a href="/admin/delete-country/<?= $country['id'] ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>
