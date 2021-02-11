<section class="docs">
    <a href="/doc/delete/<?=$doc->getId()?>">Supprimer</a>
    <a href="/doc/update/<?=$doc->getId()?>">Modifier</a>
    <h1>Documentation</h1>
    <h2><?=$doc->getTitle()?></h2>
    <p><?=$doc->getContent()?></p>
</section>