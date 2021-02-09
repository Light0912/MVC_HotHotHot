<section class="docs">
    <a href="/docs/create">Nouveau</a>
    <h1>Documentation</h1>
    <h2>Sommaire</h2>
    <?php foreach ($docs as $doc): ?>
    <h3><a href="/docs/<?=$doc['id']?>"><?=$doc['title']?></a></h3>
    <?php endforeach; ?>
</section>

