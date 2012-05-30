<?php

/**
 * Implements hook_process_region().
 */
function ribbon_process_region(&$vars) {
  if (in_array($vars['elements']['#region'], array('header_first', 'content', 'menu', 'branding'))) {
    $theme = alpha_get_theme();

    switch ($vars['elements']['#region']) {
      case 'header_first':
        $vars['title_prefix'] = $theme->page['title_prefix'];
        $vars['title'] = $theme->page['title'];
        $vars['title_suffix'] = $theme->page['title_suffix'];
        $vars['title_hidden'] = $theme->page['title_hidden'];
        break;
      
      case 'content':
        $vars['tabs'] = $theme->page['tabs'];
        $vars['action_links'] = $theme->page['action_links'];
        $vars['feed_icons'] = $theme->page['feed_icons'];
        break;
        
      case 'menu':
        $vars['main_menu'] = $theme->page['main_menu'];
        $vars['secondary_menu'] = $theme->page['secondary_menu'];
        break;

      case 'branding':
        $vars['site_name'] = $theme->page['site_name'];
        $vars['linked_site_name'] = l($vars['site_name'], '<front>', array('attributes' => array('title' => t('Home')), 'html' => TRUE));
        $vars['site_slogan'] = $theme->page['site_slogan'];
        $vars['site_name_hidden'] = $theme->page['site_name_hidden'];
        $vars['site_slogan_hidden'] = $theme->page['site_slogan_hidden'];
        $vars['logo'] = $theme->page['logo'];
        $vars['logo_img'] = $vars['logo'] ? '<img src="' . $vars['logo'] . '" alt="' . check_plain($vars['site_name']) . '" id="logo" />' : '';
        $vars['linked_logo_img'] = $vars['logo'] ? l($vars['logo_img'], '<front>', array('attributes' => array('rel' => 'home', 'title' => check_plain($vars['site_name'])), 'html' => TRUE)) : '';
        break;
    }
  }
}