<div class="wrap">
<div id="icon-options-general" class="icon32"></div><h2><?php _e('RSS Manager', 'rss-manager'); ?></h2>
<?php
  if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	if ($_POST['rm_submit']=="1") //если вызвали метод Post
	{     
		$options['custom_field_name'] = $_POST['rm_custom_field_name'];		
		$options['readmore_text'] = $_POST['rm_readmore_text'];		
		$options['category_text'] = $_POST['rm_category_text'];
		$options['tag_text'] = $_POST['rm_tag_text'];		
		$options['thumbnail_position'] = $_POST['rm_thumbnail_position'];		
		$options['thumbnail_width'] = $_POST['rm_thumbnail_width'];		 
		$options['thumbnail_height'] = $_POST['rm_thumbnail_height'];
		$options['cats_tags_position'] = $_POST['rm_cats_tags_position'];
		$options['readmore_align'] = $_POST['rm_readmore_align'];
		$options['rss_pause_time'] = $_POST['rm_pause_time'];
		$options['rss_unit_of_time'] = $_POST['rm_unit_of_time'];
		$options['content_text_align'] = $_POST['rm_content_text_align'];
		$options['custom_footer_code'] = wp_kses_stripslashes($_POST['rm_custom_footer_code']);
		$options['custom_header_code'] = wp_kses_stripslashes($_POST['rm_custom_header_code']);
		update_option('rss_manager', $options);
		?>
		<div class="updated"><p><strong><?php _e('Plugin settings were successfully updated!', 'rss-manager'); ?></strong></p></div>
    <?php
	} 
  $options = rss_manager_options();
	$plugin_dir = get_bloginfo('wpurl') . '/' . PLUGINDIR . '/' . dirname(plugin_basename(__FILE__)) . '/';
	?>
	<style type="text/css">
 img {vertical-align:middle; margin:10px;}
  </style>
	<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
	<div id="poststuff" class="ui-sortable">
  <div class="postbox opened">
  <h3><?php _e('General settings', 'rss-manager'); ?></h3>
  <div class="inside">
  <table class="form-table">
  <tbody>
  
<div style="padding:10px; font-size:1.2em;">
<p><?php _e( 'Please donate if you like this plugin!', 'rss-manager' ); ?></p>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<p><?php _e( 'It is better to set "For each article in a feed, show -> Summary" in reading options before using this plugin.', 'rss-manager' ); ?></p>
<p>
<?php _e( 'Hint: If you don\'t like how WordPress truncates your posts, put your manualy truncated post version in the \'Excerpt\' field in your post editor. ', 'rss-manager' ); ?></p></div> 
  <tr valign="top">
  
  <th scope="row"><?php _e( 'Select the delay time for Feeds', 'rss-manager' ); ?> </th>
  <td>
  <input name="rm_pause_time" type="text" id="rm_pause_time" value="<?php echo $options['rss_pause_time']; ?>" class="small-text" />
  <select name="rm_unit_of_time">
  <option value="MINUTE" <?php if ($options['rss_unit_of_time'] == "MINUTE") echo "selected"; ?> ><?php _e('Minute(s)', 'rss-manager'); ?></option>
  <option value="HOUR" <?php if ($options['rss_unit_of_time'] == "HOUR") echo "selected"; ?> ><?php _e('Hour(s)', 'rss-manager'); ?></option>
  <option value="DAY" <?php if ($options['rss_unit_of_time'] == "DAY") echo "selected"; ?> ><?php _e('Day(s)', 'rss-manager'); ?></option>
  <option value="WEEK" <?php if ($options['rss_unit_of_time'] == "WEEK") echo "selected"; ?> ><?php _e('Week(s)', 'rss-manager'); ?></option>
  <option value="MONTH" <?php if ($options['rss_unit_of_time'] == "MONTH") echo "selected"; ?> ><?php _e('Month(s)', 'rss-manager'); ?></option>
  <option value="YEAR" <?php if ($options['rss_unit_of_time'] == "YEAR") echo "selected"; ?> ><?php _e('Year(s)', 'rss-manager'); ?></option>
  </select></td>
  
  </tr>
  <tr valign="top">
  <th scope="row"><label for="rm_readmore_text"><?php _e('Read more link text', 'rss-manager'); ?></label></th>
	<td><input type="text" size=20 name="rm_readmore_text" value="<?php echo $options['readmore_text']; ?>" /><br />
  <?php _e('Link alignment:', 'rss-manager'); ?><br />
  <select name="rm_readmore_align">
  <option value="left" <?php if ($options['readmore_align'] == "left") echo "selected"; ?> ><?php _e('Left', 'rss-manager'); ?></option>
  <option value="right" <?php if ($options['readmore_align'] == "right") echo "selected"; ?> ><?php _e('Right', 'rss-manager'); ?></option>
  <option value="center" <?php if ($options['readmore_align'] == "center") echo "selected"; ?> ><?php _e('Center', 'rss-manager'); ?></option>
  </select>
  </td>	
	</tr>
  <tr valign="top">
  <th scope="row"><label for="rm_category_text"><?php _e('Category list title', 'rss-manager'); ?></label></th>
	<td><input type="text" size=20 name="rm_category_text" value="<?php echo $options['category_text']; ?>" /></td>
	<td rowspan="2"><?php _e("Hint: To hide read more link, categories list or tags - leave the corresponding input field blank.", 'rss-manager'); ?></td>
	</tr>
  <tr valign="top">
	<th scope="row"><label for="rm_tag_text"><?php _e('Tag list title', 'rss-manager'); ?></label></th>
  <td><input type="text" size=20 name="rm_tag_text" value="<?php echo $options['tag_text']; ?>" /></td>
  </tr>
  <tr valign="top">
	<th scope="row"><label for="rm_tag_text"><?php _e('Where to show tags and categories?', 'rss-manager'); ?></label></th>
  <td><select name="rm_cats_tags_position">
  <option value="before-text" <?php if ($options['cats_tags_position'] == "before-text") echo "selected"; ?> ><?php _e('Before text', 'rss-manager'); ?></option>
  <option value="after-text" <?php if ($options['cats_tags_position'] == "after-text") echo "selected"; ?> ><?php _e('After text', 'rss-manager'); ?></option>
  <option value="after-title" <?php if ($options['cats_tags_position'] == "after-title") echo "selected"; ?> ><?php _e('Right after the title', 'rss-manager'); ?></option>
  <option value="bottom" <?php if ($options['cats_tags_position'] == "bottom") echo "selected"; ?> ><?php _e('In the bottom', 'rss-manager'); ?></option>
  </select></td>
  </tr>
  <tr valign="top">
	<th scope="row"><?php _e('Post text alignment', 'rss-manager'); ?></th><td> <select name="rm_content_text_align">
  <option value="left" <?php if ($options['content_text_align'] == "left") echo "selected"; ?> ><?php _e('Left', 'rss-manager'); ?></option>
  <option value="right" <?php if ($options['content_text_align'] == "right") echo "selected"; ?> ><?php _e('Right', 'rss-manager'); ?></option>
  <option value="center" <?php if ($options['content_text_align'] == "center") echo "selected"; ?> ><?php _e('Center', 'rss-manager'); ?></option>
  </select> </td>
  </tr></tbody></table>
       <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Update settings', 'rss-manager'); ?>"></p>
  </div>
  </div>
  </div>
  
  <div id="poststuff" class="ui-sortable">
  <div class="postbox opened">
  <h3><?php _e("Post's thumbnail settings", 'rss-manager'); ?></h3>
  <div class="inside">
  <p><?php _e("If you have WordPress version 2.9 or higher, you can use built-in thumbnails support - RSS Manager will fetch them automatically.", 'rss-manager'); ?></p>
  
  <p><?php _e("If you are using custom fields to assign images to each post, you can show these images in your RSS feed. You can assign custom fields in the post editor.", 'rss-manager'); ?></p>
  
  <table class="form-table">
  <tbody>
  <tr valign="top">
	<th scope="row"><label for="rm_custom_field_name"><?php _e("Post's thumbnail custom field name", 'rss-manager'); ?></label></th>
	<td><input type="text" size=20 name="rm_custom_field_name" value="<?php echo $options['custom_field_name']; ?>" /></td>
	</tr>
  <tr valign="top">
	<th scope="row"><label for="rm_thumbnail_width"><?php _e('Limit thumbnail width', 'rss-manager'); ?></label></th>
	<td><input type="text" size=5 name="rm_thumbnail_width" value="<?php echo $options['thumbnail_width']; ?>" />px</td>
	<td rowspan="2"><?php _e("Hint: To prevent images proportions change, better limit only width, or only height - not both in the same time.", 'rss-manager'); ?></td>
	</tr>
  <tr valign="top">
	<th scope="row"><label for="rm_thumbnail_height"><?php _e('Limit thumbnail height', 'rss-manager'); ?></label></th>
	<td><input type="text" size=5 name="rm_thumbnail_height" value="<?php echo $options['thumbnail_height']; ?>" />px</td>
  </tr>
  </tbody></table>
  <table class="form-table">
  <tbody>
  <tr valign="top">
  <th scope="row"><label for="rm_template"><?php _e('Thumbnail position', 'rss-manager'); ?></label></th>
  <td>
  <?php _e('Choose the position:', 'rss-manager'); ?><br />
  <table>
  <tr><td><label><input name="rm_thumbnail_position" type="radio" value="none" <?php if ($options['thumbnail_position'] == "none") echo "checked='checked'"; ?> /> 
	<?php echo '<img src="' . $plugin_dir . 'img/no-image.png" alt="template1" />'; ?></label>
</td><td><label><input name="rm_thumbnail_position" type="radio" value="left" <?php if ($options['thumbnail_position'] == "left") echo "checked='checked'"; ?> /> 
	<?php echo '<img src="' . $plugin_dir . 'img/left.png" alt="template1" />'; ?></label>
</td><td><label><input name="rm_thumbnail_position" type="radio" value="right" <?php if ($options['thumbnail_position'] == "right") echo "checked='checked'"; ?> /> 
	<?php echo '<img src="' . $plugin_dir . 'img/right.png" alt="template1" />'; ?></label>
</td></tr>
	
			<tr>
<td><label><input name="rm_thumbnail_position" type="radio" value="top-left" <?php if ($options['thumbnail_position'] == "top-left") echo "checked='checked'"; ?> /> 
	<?php echo '<img src="' . $plugin_dir . 'img/top-left.png" alt="template1" />'; ?></label>
</td><td><label><input name="rm_thumbnail_position" type="radio" value="top-center" <?php if ($options['thumbnail_position'] == "top-center") echo "checked='checked'"; ?> /> 
	<?php echo '<img src="' . $plugin_dir . 'img/top-center.png" alt="template1" />'; ?></label>
</td>
<td><label><input name="rm_thumbnail_position" type="radio" value="top-right" <?php if ($options['thumbnail_position'] == "top-right") echo "checked='checked'"; ?> /> 
	<?php echo '<img src="' . $plugin_dir . 'img/top-right.png" alt="template1" />'; ?></label>
</td></tr></table>
  </td>
	</tr>
   </tbody></table>
   <input type="hidden" name="rm_submit" value="1" />
   <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Update settings', 'rss-manager'); ?>"></p>
  </div>
  </div>
  </div>
  <div id="poststuff" class="ui-sortable">
  <div class="postbox opened">
  <h3><?php _e('Insert custom code before and after items', 'rss-manager'); ?></h3> 
  <div class="inside">
  <p><strong><?php _e("Be very careful with the following options, they can crash the output of your feed.", 'rss-manager'); ?></strong></p>
  <table class="form-table">
  <tbody>
  <tr valign="top">
	<th scope="row"><label for="rm_custom_header_code"><?php _e("Add custom code before each item", 'rss-manager'); ?></label><br /></th>
  <td><textarea type="text" name="rm_custom_header_code" id="rm_custom_header_code" rows="10" cols="50" class="large-text code" ><?php echo $options['custom_header_code']; ?></textarea></td>
  </tr>
  <tr valign="top">
	<th scope="row"><label for="rm_custom_footer_code"><?php _e("Add custom code after each item", 'rss-manager'); ?></label></th>
  <td><textarea type="text" name="rm_custom_footer_code" id="rm_custom_footer_code" rows="10" cols="50" class="large-text code" ><?php echo $options['custom_footer_code']; ?></textarea></td>
  </tr>
  </tbody></table>
  <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Update settings', 'rss-manager'); ?>"></p>

  </div>
  </div>
  </div>
  </form>
  
</div>  