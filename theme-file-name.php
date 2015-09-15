<?php

/*
Plugin Name: Theme File Name
Description: Theme File Name
Version: 1.0
Author: 
*/

if (!class_exists('helpfulThemeFileName')) {
    class helpfulThemeFileName
    {
        public function __construct()
        {
            add_action('admin_bar_menu', array($this, 'action_admin_bar_menu'), 99);
        }

        public function action_admin_bar_menu($wp_admin_bar)
        {
            /** @var WP_Admin_Bar $wp_admin_bar */

            $args = array(
                'id' => 'CurrentThemeFile',
                'title' => $this->template(),
                'meta' => array(
                    'html' => '',
                ),
            );

            $wp_admin_bar->add_node($args);
        }

        private function template()
        {
            global $template;

            return $this->replaceFile($template);
        }

        /**
         * Remove from path of file
         *
         * @param $template
         * @return mixed
         */
        private function replaceFile($template)
        {
            return str_replace(
                array(
                    trailingslashit(get_theme_root()),
                    trailingslashit(get_template()),
                    WP_CONTENT_DIR
                ), '', $template);
        }
    }
}

new helpfulThemeFileName;