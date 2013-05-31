<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php foreach ($fields as $id => $field): ?>
  <?php if ($id == 'field_size'): ?>
<div class="views-field views-field-field-size">
  Size: <?php print bytesToSize($row->field_field_size[0]['raw']['value']); ?>
</div>
  <?php elseif ($id == 'field_cmis_file' || $id == 'field_video'): ?>
  <?php
  $file = new \stdClass();
  $file->filemime = $row->field_field_mimetype[0]['raw']['value'];
  $variables = array(
    'file' => $file,
    'icon_directory' => drupal_get_path('module', 'file') . '/icons',
  );
  print theme_file_icon($variables);
  ?>
  <?php print $field->content; ?>
  <?php elseif ($id == 'field_image' && key_exists('field_file', $fields)): ?>
  <?php 
  $img = $row->field_field_image[0]['raw'];
  $vid = $row->field_field_file[0]['raw'];
  unset($fields['field_video']);
  ?>
  <div class="video-preview">
    <a href="#"><img src="<?php print image_style_url('thumbnail', $img['uri']);?>" alt="Preview" /></a>
    <div class="video" style="display: none;">
      <video width="320" height="240" poster="<?php print image_style_url('large', $img['uri']);?>" controls="controls" preload="none">
        <source type="video/mp4" src="<?php print file_create_url($vid['uri']);?>" />
        <object width="320" height="240" type="application/x-shockwave-flash" data="<?php print file_create_url(drupal_get_path('module', 'import_production') . '/swf/flashmediaelement.swf');?>">
            <param name="movie" value="<?php print file_create_url(drupal_get_path('module', 'import_production') . '/swf/flashmediaelement.swf');?>" />
            <param name="flashvars" value="controls=true&file=<?php print file_create_url($vid['uri']);?>" />
            <!-- Image as a last resort -->
            <img src="<?php print image_style_url('large', $img['uri']);?>" width="320" height="240" title="No video playback capabilities" />
        </object>
      </video>
    </div>
      
  </div>
  <?php elseif ($id == 'field_file' && key_exists('field_image', $fields)): ?>
  <?php else: ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
  <?php endif; ?>
<?php endforeach; ?>
