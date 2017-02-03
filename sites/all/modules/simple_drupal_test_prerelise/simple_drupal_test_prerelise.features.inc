<?php
/**
 * @file
 * simple_drupal_test_prerelise.features.inc
 */

/**
 * Implements hook_views_api().
 */
function simple_drupal_test_prerelise_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function simple_drupal_test_prerelise_image_default_styles() {
  $styles = array();

  // Exported image style: article_teaser_500_x_300.
  $styles['article_teaser_500_x_300'] = array(
    'label' => 'Article teaser 500 x 250',
    'effects' => array(
      4 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 500,
          'height' => 250,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: height_200.
  $styles['height_200'] = array(
    'label' => 'Gallery thumbnail',
    'effects' => array(
      3 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => 500,
          'height' => 500,
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function simple_drupal_test_prerelise_node_info() {
  $items = array(
    'article' => array(
      'name' => t('Article'),
      'base' => 'node_content',
      'description' => t('This Content type you could use when you need to create some news or article'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'page' => array(
      'name' => t('Page'),
      'base' => 'node_content',
      'description' => t('Simple content type for creating static pages.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}

/**
 * Implements hook_paragraphs_info().
 */
function simple_drupal_test_prerelise_paragraphs_info() {
  $items = array(
    'image_grid' => array(
      'name' => 'Images Grid',
      'bundle' => 'image_grid',
      'locked' => '1',
    ),
    'single_image' => array(
      'name' => 'Single Image',
      'bundle' => 'single_image',
      'locked' => '1',
    ),
    'text' => array(
      'name' => 'Text',
      'bundle' => 'text',
      'locked' => '1',
    ),
    'youtube' => array(
      'name' => 'YouTube',
      'bundle' => 'youtube',
      'locked' => '1',
    ),
  );
  return $items;
}
