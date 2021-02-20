<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout.html.php');

?>

<h1><?= $this->input("headline", ["width" => 540]); ?></h1>
<div class="product-info">
    <?php if($this->editmode):
        echo $this->relation('product');
    else: ?>
    <div id="product">
        <?php

        $prod = new \Pimcore\Model\DataObject\Product\Listing();
        foreach($prod as $product) 
        {
            $prod = $this->relation('product')->getElement();
            ?>
        

        <!-- /** @var \Pimcore\Model\DataObject\Product $product */ -->
        
        
        <h2><?= $this->escape($product->getName()); ?></h2>
        <div class="content">
            <?= $this->$prod[$product->getDescription()]?>
        </div>
        <div class="content">
            <?= $product->getName(); ?>
        </div>
<div class="content">
    <?php
    $picture = $product->getImage();
    if($picture instanceof \Pimcore\Model\Asset\Image):
        /** @var \Pimcore\Model\Asset\Image $picture */
        
    ?>
        <?= $picture->getThumbnail("content")->getHtml(); ?>
    <?php endif; ?>
    
</div>
    </div>
    <?php } ?>
    <?php endif; ?>
</div>