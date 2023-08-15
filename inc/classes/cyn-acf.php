<?php

if (!class_exists('cyn_acf')) {
    class cyn_acf
    {

        function __construct()
        {
            add_filter('acf/settings/url', function ($url) {
                return MY_ACF_URL;
            });
            add_filter('acf/settings/show_updates', '__return_false', 100);
            // add_filter('acf/settings/show_admin', '__return_false');

            $this->cyn_acf_actions();
        }

        public function cyn_acf_actions()
        {
        }
    }
}
