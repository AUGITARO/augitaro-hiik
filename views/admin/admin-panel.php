<?php

/** @var yii\web\View $this */
/** @var ?string $flashMessage */

use yii\helpers\Url;

?>
<section class="admin-panel">
    <div class="container">

        <?php if (isset($flashMessage)): ?>
            <script>alert('<?= $flashMessage ?>')</script>
        <?php endif; ?>

        <a class="" href="<?= Url::to(['user/logout']) ?>">Выйти из аккаунта</a>
    </div>
</section>
