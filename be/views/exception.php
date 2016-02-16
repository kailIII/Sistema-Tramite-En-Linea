<?php if($viewParams["showTrace"]){ ?>
		<h2>Exception found!</h2>
<?php }else{ ?>
		<h2>Ups... parece que hubo un problema.</h2>
<?php } ?>
<dl>
	<dt>Codigo:</dt>
	<dd><?php echo $viewParams["exception"]->getCode(); ?></dd>
	<dt>Mensaje:</dt>
	<dd><?php echo $viewParams["exception"]->getMessage(); ?></dd>
	<?php 
		if($viewParams["showTrace"]){
	?>
		<dt>Trace:</dt>
		<dd><pre><?php print_r($viewParams["exception"]->getTrace()); ?></pre></dd>
	<?php
		}
	?>
</dl>