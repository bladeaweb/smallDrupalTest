<?php
/**
 * @file
 * simple_drupal_test_prerelise.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function simple_drupal_test_prerelise_taxonomy_default_vocabularies() {
  return array(
    'themes_of_articles' => array(
      'name' => 'Themes of articles',
      'machine_name' => 'themes_of_articles',
      'description' => 'Articles Themes.',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
