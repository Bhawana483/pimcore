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
        echo $this->relation('category');
    else: ?>
    <div id="product">
        <?php

        $prod = new \Pimcore\Model\DataObject\category\Listing();
        foreach($prod as $category) 
        {
            $prod = $this->relation('category')->getElement();
            ?>
        

        <!-- /** @var \Pimcore\Model\DataObject\Product $product */ -->
        
        
        <h2><?= $this->escape($category->getName()); ?></h2>
        <div class="content">
            <?= $this->$prod[$category->getDescription()]?>
        </div>
        <div class="content">
            <?= $this->$prod[$category->getColor()]?>
        </div>
        <div class="content">
            <?= $category->getName(); ?>
        </div>
<div class="content">
    <?php
    $picture = $category->getImage();
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