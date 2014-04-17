<?php

/**
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "pumpe" to match
 *    your subthemes name, e.g. if you name your theme "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "pumpe".
 * 2. Uncomment the required function to use.
 */

/**
 * Override or insert variables into the html templates.
 */
function pumpe_preprocess_html(&$vars) {
  // Load the media queries styles
  // Remember to rename these files to match the names used here - they are
  // in the CSS directory of your subtheme.
  $media_queries_css = array(
    'pumpe.responsive.style.css',
    'pumpe.responsive.gpanels.css'
  );
  load_subtheme_media_queries($media_queries_css, 'pumpe');

 /**
  * Load IE specific stylesheets
  * AT automates adding IE stylesheets, simply add to the array using
  * the conditional comment as the key and the stylesheet name as the value.
  *
  * See our online help: http://adaptivethemes.com/documentation/working-with-internet-explorer
  *
  * For example to add a stylesheet for IE8 only use:
  *
  *  'IE 8' => 'ie-8.css',
  *
  * Your IE CSS file must be in the /css/ directory in your subtheme.
  */
  /* -- Delete this line to add a conditional stylesheet for IE 7 or less.
  $ie_files = array(
    'lte IE 7' => 'ie-lte-7.css',
  );
  load_subtheme_ie_styles($ie_files, 'pumpe');
  // */
}

/* -- Delete this line if you want to use this function
function pumpe_process_html(&$vars) {
}
// */

/**
 * Override or insert variables into the page templates.
 */
/* -- Delete this line if you want to use these functions
function pumpe_preprocess_page(&$vars) {
}

function pumpe_process_page(&$vars) {
}
// */

/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function pumpe_preprocess_node(&$vars) {
}

function pumpe_process_node(&$vars) {
}
// */

/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function pumpe_preprocess_comment(&$vars) {
}

function pumpe_process_comment(&$vars) {
}
// */

/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function pumpe_preprocess_block(&$vars) {
}

function pumpe_process_block(&$vars) {
}
// */

/**
 * Add the Style Schemes if enabled.
 * NOTE: You MUST make changes in your subthemes theme-settings.php file
 * also to enable Style Schemes.
 */
/* -- Delete this line if you want to enable style schemes.
// DONT TOUCH THIS STUFF...
function get_at_styles() {
  $scheme = theme_get_setting('style_schemes');
  if (!$scheme) {
    $scheme = 'style-default.css';
  }
  if (isset($_COOKIE["atstyles"])) {
    $scheme = $_COOKIE["atstyles"];
  }
  return $scheme;
}
if (theme_get_setting('style_enable_schemes') == 'on') {
  $style = get_at_styles();
  if ($style != 'none') {
    drupal_add_css(path_to_theme() . '/css/schemes/' . $style, array(
      'group' => CSS_THEME,
      'preprocess' => TRUE,
      )
    );
  }
}
// */


/**
 * Returns HTML for a breadcrumb trail.
 */
function pumpe_breadcrumb($vars) {
	$title = drupal_get_title();
  $breadcrumb = $vars['breadcrumb'];
  $show_breadcrumb = theme_get_setting('breadcrumb_display');
  if ($show_breadcrumb == 'yes') {
    $show_breadcrumb_home = theme_get_setting('breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }
    if (!empty($breadcrumb)) {
      $heading = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
      $separator = filter_xss(theme_get_setting('breadcrumb_separator'));
      $output = '';
      foreach ($breadcrumb as $key => $val) {
        if ($key == 0) {
          $output .= '<li class="crumb">' . $val . '</li>';
        }
        else {
          $output .= '<li class="crumb"><span>' . $separator . '</span>' . $val . '</li>';
        }
      }
      return $heading . '<ol id="crumbs">' . $output . $separator . $title . '</ol>';
    }
  }
  return t('Home');
}