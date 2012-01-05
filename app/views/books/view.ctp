<div class="row">
    <div class="ten columns offset-by-one">
        <div class="byline">
            <div id="title"><?php echo $book['Book']['title']; ?></div>
            <div id="author">by <?php echo $book['Book']['author']; ?></div>
        </div>
    </div>
    <div class="one column centered">
        <?php echo $this->HTML->image('refresh.png', array('url' => '/recommend'));?>
        <div class="tiny">Otra vez!</div>
    </div>
</div>
<div class="row">
    <div class="ten columns centered">
        <div id="book">
            <?php
            echo $this->HTML->image($book['Book']['amzn_image_url'], array('class' => 'cover', 'url' => $book['Book']['amzn_url']));
            ?>
            <span class="description"><?php echo $book['Book']['amzn_review'];?></span>
        </div>
    </div>
</div>
<div class="row">
    <div id="checkout">
        <div class="one column offset-by-six"><?php echo $this->HTML->link("Library Search", "http://www.worldcat.org/search?q=" . urlencode($book['Book']['title']) . "&qt=advanced", array('class' => 'blue nice button radius' ));?></div>
        <div class="one column"><?php echo $this->HTML->link('View on Amazon', $book['Book']['amzn_url'], array('class' => 'blue nice button radius' ));?></div>
    </div>
</div>