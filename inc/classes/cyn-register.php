<?php

if (!class_exists('cyn_register')) {
    class cyn_register
    {

        function __construct()
        {
            add_action('init', [$this, 'register_product_post_type']);
            add_action('init', [$this, 'cyn_add_product_cat_taxonomy']);

            add_action('init', [$this, 'register_inspiration_post_type']);
            add_action('init', [$this, 'cyn_add_inspiration_cat_taxonomy']);

            add_action('init', [$this, 'register_fqa_post_type']);
            add_action('init', [$this, 'cyn_add_fqa_cat_taxonomy']);
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
                'taxonomies' => array('product-cat'),
                'show_in_rest' => true
            ];

            register_post_type('product', $product_args);
        }

        function cyn_add_product_cat_taxonomy()
        {
            $labels = [
                'name' => 'دسته ها'
            ];

            $args = [
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => ['slug' => 'product-cat'],
            ];

            register_taxonomy('product-cat', ['product'], $args);
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
                'taxonomies' => array('inspiration-cat'),
                'show_in_rest' => true
            ];

            register_post_type('inspiration', $inspiration_args);
        }

        function cyn_add_inspiration_cat_taxonomy()
        {
            $labels = [
                'name' => 'دسته ها'
            ];

            $args = [
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => ['slug' => 'product-cat'],
            ];

            register_taxonomy('inspiration-cat', ['inspiration'], $args);
        }

        public function register_fqa_post_type()
        {
            $fqa_labels = [
                'name' => 'سوالات',
                'singular_name' => 'سوال'
            ];

            $fqa_args = [
                'labels' => $fqa_labels,
                'description' => 'FQA custom post type.',
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'fqa'),
                'capability_type' => 'post',
                'has_archive' => true,
                'hierarchical' => false,
                'menu_position' => 20,
                'supports' => array('title', 'editor', 'author', 'thumbnail'),
                'taxonomies' => array('fqa-cat', 'brand'),
                'show_in_rest' => true
            ];

            register_post_type('fqa', $fqa_args);
        }

        function cyn_add_fqa_cat_taxonomy()
        {
            $labels = [
                'name' => 'دسته ها'
            ];

            $args = [
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => ['slug' => 'fqa-cat'],
            ];

            register_taxonomy('fqa-cat', ['fqa'], $args);
        }
    }
}
