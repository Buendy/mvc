<div class="container">
    <?php foreach ($this->canciones as $cancion) :?>
    <article class="listadoCanciones">
        <header>
            <a href="/canciones/ver/<?= $cancion->id ?>"><?= $cancion->track ?></a>
        </header>
        <p>Artista: <?= $cancion->artist ?></p>
    </article>
    <?php endforeach; ?>
</div>
