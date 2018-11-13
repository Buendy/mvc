<div class="container">
    <h2>¿Que quieres saber?</h2>
    <p>Dinos cuál es tu pegunta. Al preguntar intenta ser claro y plantear tu duda de manera que pueda servir de utilidad para otras personas</p>

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
        <p>
            <label for="asunto">Asunto</label>
            <span><input type="text" name="asunto" value=""> </span>
        </p>
        <p>
            <label for="cuerpo"></label>
            <span><textarea name="cuerpo" rows="8" cols="80"></textarea> </span>

        </p>
        <p><input type="submit" name="" value=""> </p>
    </form>
</div>