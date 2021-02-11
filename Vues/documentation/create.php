<form action="" method="post">
    <label>
        <input type="text" name="title">
    </label>
    <label>
        <textarea name="content" id="content"></textarea>
    </label>
    <select name="parent_id" id="parent_id">
        <option value="0">Aucun parent</option>
        <?php foreach ($docs as $doc): ?>
            <option value="<?= $doc['id'] ?>"><?= $doc['title'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="new_doc">Créer</button>
</form>