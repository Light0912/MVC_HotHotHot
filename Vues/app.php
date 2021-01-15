
    <main>
        <form id="app" action="" method="post">
            <label for="number">Groupe de</label>
            <input type="number" min="1" max="5" name="number" id="number" required>
            <button type="submit" name="generate">Génerer</button>
        </form>
        <section class="result">
            <?php if (isset($_POST['generate'])): ?>
            <?php $i = 0; ?>
            <?php foreach ($students as $student): ?>
                <?php if ($i % $_POST['number'] == 0) echo "<h2>Groupe N°" . ($i / $_POST['number'] + 1) . "</h2>"; ?>
                <p><?= $student[0]?></p>
            <?php $i++; ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </section>
    </main>

