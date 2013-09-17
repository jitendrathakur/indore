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
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap', 'bootstrap-responsive', 'jquery-ui', 'ie7', 'all-ie-only', 'admin-custom'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<?php $baseUrl = Router::url('/', true ); ?>
<?php echo $this->Html->scriptBlock('var baseUrl = '.$this->Js->object($baseUrl).';'); ?>
	<div id="container">
		<div id="header">
			<?php echo $this->element('navbar'); ?>
		
		</div>
		
		<div id="content" class="container-fluid">
			<div class="row-fluid">
				<?php echo $this->element('admin-left-panel'); ?>
				<div class="span9">

					<?php echo $this->Session->flash(); ?>

					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
		<div id="footer">			
		</div>
	</div>
	<?php echo $this->Html->script(array('jquery-1.7.2.min', 'jquery-ui', 'jquery.selectbox-0.2', 'bootstrap', 'admin-custom')); ?>
	<?php //echo $this->Html->script(array('jquery-1.7.2.min', 'jquery.selectbox-0.2', 'bootstrap', 'home_script', 'admin-custom')); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
