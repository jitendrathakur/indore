<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Survey Site');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>:
		<?php echo "Indore giva"; //echo $title_for_layout; ?>
	</title>

        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="robots" content="follow, index" />
        <!--  SEO STUFF END -->
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--  revolution slider plugin : begin -->        
       
        <!--  revolution slider plugin : end -->    
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic" rel="stylesheet" type="text/css" />      
        <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen" />
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap', 'bootstrap-responsive', 'custom','styler','isotope','color_scheme','font-awesome','font-awesome-ie7', 'flexslider', 'rs-responsive'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<?php $baseUrl = Router::url('/', true ); ?>
<?php echo $this->Html->scriptBlock('var baseUrl = '.$this->Js->object($baseUrl).';'); ?>


	<div id="over">
		<div id="out_container">
<!-- THE LINE AT THE VERY TOP OF THE PAGE -->
        <div class="top_line"></div>
<!-- HEADER AREA -->
		<?php echo $this->element('header'); ?>

<!-- MAIN CONTENT AREA -->
        <div class="main-content">
            <div class="container">

                <?php //echo $this->element('banner'); ?>

        		<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
<!-- MAIN CONTENT AREA: SLIDER BANNER (REVOLUTION SLIDER) -->
           
                <?php //echo $this->element('block1'); ?>

                <?php //echo $this->element('block2'); ?>

                <?php //echo $this->element('block3'); ?>

                
<!-- MAIN CONTENT AREA: bizstrap CUSTOM - PORTFOLIO GRID BLOCK (ORIGINALLY DESIGNED FOR HOME PAGE) -->
                <?php //echo $this->element('testimoniol'); ?>

                <?php //echo $this->element('block4'); ?>

                <?php //echo $this->element('block5'); ?>

                <?php echo $this->element('before-footer'); ?>

                <?php echo $this->element('footer'); ?>               
            


    	    </div>
    	</div>
    </div>
</div>






<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        
<?php echo $this->Html->script(array('jquery-ui.min', 'bootstrap', 
'style-switcher/style-switcher', 'jquery.flexslider-min', 'jquery.isotope', 'jquery.fancybox.pack.js?v=2.1.0', 'revolution.custom', 'custom')); ?>
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
