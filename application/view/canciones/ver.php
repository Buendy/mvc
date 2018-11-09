<div class="container">
    <h2><?= $detalles->track?></h2>
    <p>Artista:<br><?= $detalles->artist ?></p>
    <p>URL: <br>
        <a href="<?= $detalles->link ?>"><?= $detalles->link?></a>
    </p>
    <p>
        <a href="/canciones/listar"><== Volver al listado de canciones</a>
    </p>
</div>