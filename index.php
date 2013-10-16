<?php


/**
 * Class StaticManager
 */
class StaticManager {

    private static $css_registry = array();
    private static $js_registry = array();
    private static $css_queue = array();
    private static $js_queue = array();


    /**
     *
     * Register section
     *
     */
    private static function register($name, $path, $array) {

    }

    public static function register_js($name, $path) {

    }

    public static function register_css($name, $path) {

    }


    /**
     *
     * Enqueue section
     *
     */
    private static function enqueue($name, $array) {
        if (!in_array($name, $array)) {
            $array[] = $name;
        } else {
            // Already added.
        }
    }

    public static function enqueue_js($name) {
        StaticManager::enqueue($name, StaticManager::$js_queue);
    }

    public static function enqueue_css($name) {
        StaticManager::enqueue($name, StaticManager::$css_queue);
    }


    /**
     *
     * Dequeue section
     *
     */
    private static function dequeue($name, $array) {
        if (in_array($name, $array)) {
            $array[] = $name;
        } else {
            // Error
        }
    }

    public static function dequeue_js($name) {
        StaticManager::dequeue($name, StaticManager::$js_queue);
    }

    public static function dequeue_css($name) {
        StaticManager::dequeue($name, StaticManager::$css_queue);
    }


}