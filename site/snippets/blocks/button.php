<?php if(str_contains($block -> link(), "page://")): ?>
    <a class="button" href=<?= $block -> link() -> toUrl() ?> ><?= $block -> text() ?></a>
<?php else: ?>
    <a class="button" target="_blank" href=<?= $block -> link() -> toUrl() ?> ><?= $block -> text() ?></a>
<?php endif ?>