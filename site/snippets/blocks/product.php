<div class="product">
    <img src=<?= $block -> image() -> toFile() -> url()?> />
    <div><?= $block -> text() ?></div>
    <a target="_blank" class="button" href=<?= $block -> link() -> toUrl() ?>>Purchase</a>
</div>



