<?php

if (!class_exists('cyn_register')) {
    class cyn_register
    {

        function __construct()
        {
            add_action('init', [$this, 'register_product_post_type']);
            add_action('init', [$this, 'register_inspiration_post_type']);
        }

        public function register_product_post_type()
        {
            $product_labels = [
                'name' => 'محصولات',
                'singular_name' => 'محصول'
            ];

            $product_args = [
                'labels' => $product_labels,
                'description' => 'Product custom post type.',
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'products'),
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => 20,
                'supports' => array('title', 'editor', 'author', 'thumbnail'),
                'taxonomies' => array('product-cat', 'brand'),
                'show_in_rest' => true
            ];

            register_post_type('product', $product_args);
        }

        public function register_inspiration_post_type()
        {
            $inspiration_labels = [
                'name' => 'ایده ها',
                'singular_name' => 'ایده'
            ];

            $inspiration_args = [
                'labels' => $inspiration_labels,
                'description' => 'Inspiration custom post type.',
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'inspiration'),
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => 20,
                'supports' => array('title', 'editor', 'author', 'thumbnail'),
                'taxonomies' => array('product-cat', 'brand'),
                'show_in_rest' => true
            ];

            register_post_type('inspiration', $inspiration_args);
        }
    }
}
