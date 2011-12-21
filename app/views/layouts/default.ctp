<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('960.css');
        echo $this->Html->css('style.css');
    ?>
    <link href='http://fonts.googleapis.com/css?family=Habibi' rel='stylesheet' type='text/css'>
    <title><?php echo $title_for_layout; ?></title>
</head>
<body>
    <img class="source-image" src="<?php echo $photo_url; ?>" alt="" />
    <div id="top"><div id="sitename"><?php echo $this->HTML->link('Bookoneer',"/", array(), null, false); ?></div></div>
    <div class="container container_12">
        <?php echo $content_for_layout; ?>
        <div class="clear"></div>
    </div>
	<?php
	    echo $this->Js->writeBuffer(); // Write cached scripts
	    echo $scripts_for_layout;
	?>

	<?php
	    // echo $this->Html->script('script.js');
	?>
</body>
<script>

</script>

</html>