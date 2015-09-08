<?php
	if( count($errorData)>0) {
	?>
	<ul class="errorholder">
	<?PHP
		foreach ($errorData as $error) {
	?>
	<li><?PHP echo $error;?></li>
	<?
		}
	?>
	</ul>
	<?
	}
?>