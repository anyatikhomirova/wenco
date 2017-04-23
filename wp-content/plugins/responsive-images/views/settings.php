<div class="wrap">
<h2>Responsive Images</h2>

<form method="post" action="options.php">
	<?php settings_fields('ResponsiveImages') ?>
	<h3>General Settings</h3>
	<table class="form-table">
		<tr>
			<th scope="row">Default content width</th>
			<td>
				<input type="number" name="ResponsiveImages[content-widths][all]" value="<?php echo $this->get_option('content-widths[all]') ?>">
			</td>
		</tr>
		<tr>
			<th scope="row">Enabled For Individual Pages</th>
			<td>
				<?php $checked = $this->get_option('enabled-for-individual-pages') ? ' checked="checked"' : '' ?>
				<input type="checkbox" name="ResponsiveImages[enabled-for-individual-pages]"<?php echo $checked ?>>
			</td>
		</tr>
	</table>
	<h3>Content-size Specific Options</h3>
	<table class="form-table">
		<?php foreach(ResponsiveImages::$content_widths as $width): if (!is_numeric($width)) continue; ?>
			<tr>
				<th scope="row">Content Size at <?php echo $width ?>px max-width</th>
				<td>
					<input type="number" name="ResponsiveImages[content-widths][<?php echo $width ?>]" value="<?php echo $this->get_option('content-widths[' . $width . ']') ?>">
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	
	<h3>Post-type Specific Options</h3>
	<table class="form-table">
		<?php foreach (get_post_types(array('public'=>true),'object') as $type): ?>
		<tr>
			<th scope="row"><?php echo $type->label ?></th>
			<td>
				<label>
					<?php $checked = $this->get_option('enabled-for-'.$type->name) ? ' checked="checked"' : '' ?>
					Enabled: <input type="checkbox" name="ResponsiveImages[enabled-for-<?php echo $type->name ?>]"<?php echo $checked ?>>
				</label>
				<label>
					Override Content Width: 
						<input type="number" name="ResponsiveImages[content-width-for-<?php echo $type->name ?>]" value="<?php echo $this->get_option('content-width-for-'. $type->name); ?>">
				</label>
			</td>
		</tr>
		<?php endforeach ?>
	</table>

	<p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>
</form>
</div>