<?php
// Preprocess page
function small_theme_preprocess_page(&$variables) {
	// Remove title on front page
	if ($variables['is_front']) {
		if(!empty($variables['node'])){
			$variables['title'] = false;
		}
	}
}