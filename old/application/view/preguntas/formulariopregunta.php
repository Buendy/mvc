<div class="container">
    <h2>¿Que quieres saber?</h2>
    <p>
        Dinos cuál es tu pregunta. Al preguntar intenta ser claro y plantear tu duda de manera que pueda servir también de utilidad a otras personas.
    </p>

    <?php if (isset($this->errores) && count($this->errores)>0) : ?>
        <div class="errorf">
            <ul>
                <?php foreach ($this->errores as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
        <p>
            <label for="asunto">Asunto</label>
            <span>
				<input type="text" name="asunto" value="<?= isset($this->datos['asunto']) ? $this->datos['asunto'] : '' ?>">
			</span>
        </p>
        <p>
            <label for="cuerpo">Cuerpo</label>
            <span>
				<textarea name="cuerpo"><?= isset($this->datos['cuerpo']) ? $this->datos['asunto'] : '' ?></textarea>
			</span>
        </p>
        <p><input type="submit" value="Enviar"></p>
    </form>
</div>