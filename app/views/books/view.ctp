<div class="grid_1">&nbsp;</div>
<div class="grid_10">
    <div class="byline">
        <div id="title"><?php echo $book['Book']['title']; ?></div>
        <div id="author">by <?php echo $book['Book']['author']; ?></div>
    </div>
</div>
<div class="grid_1 center"><?php echo $this->HTML->image('refresh.png', array('url' => '/recommend'));?></div>
<div class="clear">&nbsp;</div>

<div class="grid_1">&nbsp;</div>
<div class="grid_10">
    <div id="book">
        <?php
        echo $this->HTML->image($book['Book']['amzn_image_url'], array('class' => 'cover', 'url' => $book['Book']['amzn_url']));
        ?>
        <span class="description"><?php echo $book['Book']['amzn_review'];?></span>
    </div>
</div>
<div class="grid_1">&nbsp;</div>
<div class="clear">&nbsp;</div>

<div id="checkout">
    <div class="grid_2 prefix_7"><?php echo $this->HTML->link("Library Search", "http://www.worldcat.org/search?q=" . urlencode($book['Book']['title']) . "&qt=advanced", array('class' => 'button' ));?></div>
    <div class="grid_2 suffix_1"><?php echo $this->HTML->link('Go to Amazon', $book['Book']['amzn_url'], array('class' => 'button' ));?></div>
    <div class="clear"></div>
</div>