<?php

/** @var yii\web\View $this */
/** @var ?string $flashMessage */

use yii\helpers\Url;

?>

<section>
    <div class="container">

        <?php if (isset($flashMessage)): ?>
            <script>alert('<?= $flashMessage ?>')</script>
        <?php endif; ?>

        <a class="btn btn-primary" href="<?= Url::to(['user/logout']) ?>">Пипец</a>
    </div>
</section>


