img .size-full { max-width: 100%; }
<?php foreach ($this->data['media_rules'] as $size => $widths): ?>
	<?php if ('all' != $size): ?>
		@media (max-width: <?php echo $size ?>px) {
	<?php endif ?>
		<?php foreach ($widths as $class_width => $real_width): ?>
			.<?php echo ResponsiveImages::$class_name_prefix . $class_width ?> {
				width: <?php echo $real_width ?>%;
			}
		<?php endforeach ?>
	<?php if ('all' != $size): ?>
		}
	<?php endif ?>
<?php endforeach ?>
