<?php if (! is_null(\Mini\Core\Session::get('feedback_negative')) && count(\Mini\Core\Session::get('feedback_negative'))>0) : ?>
    <div class="errorf">
        <ul>
            <?php foreach (\Mini\Core\Session::get('feedback_negative') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<?php if (! is_null(\Mini\Core\Session::get('feedback_positive')) && count(\Mini\Core\Session::get('feedback_positive'))>0) : ?>
    <div class="exitof">
        <ul>
            <?php foreach (\Mini\Core\Session::get('feedback_positive') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>