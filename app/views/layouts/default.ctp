<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php
        $api = "ABQIAAAAAMPeJi3jrrgEijI2XaX-shT7g99ROZkAi_Cp-gMUrVuZ_69itRQjnbU3dIFh0hWjduwZYw4BQa0S7w";

        echo $this->Html->meta('icon');
        echo $this->Html->css('app.css');
        echo $this->Html->css('foundation.css');
        echo $this->Html->css('ie.css');
        echo $this->Html->css('style.css?foundation');
    ?>
    <link href='http://fonts.googleapis.com/css?family=Habibi' rel='stylesheet' type='text/css'>
    <title><?php echo $title_for_layout; ?></title>
</head>
<body>
    <img class="source-image" src="<?php echo $photo_url; ?>" alt="" />
    <div id="top">
        <div id="sitename">
            <?php echo $this->HTML->link('Bookoneer',"/", array(), null, false); ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="twelve columns page">
                <?php echo $content_for_layout; ?>
            </div>
        </div>
    </div>
	<?php
	    echo $this->Js->writeBuffer(); // Write cached scripts
	    echo $scripts_for_layout;
	?>
</body>
<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28108800-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"/>
<?php
    echo $this->Html->script('foundation.js');
    echo $this->Html->script('app.js');
?>
</html>