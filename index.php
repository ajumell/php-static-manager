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
     * Register section
     */
    private static function register($name, $path, $dependencies, $array) {
        if (isset($array, $name)) {
            // Error: already registered.
        }

        foreach ($dependencies as $dependency) {
            if (!isset($array[$dependency])) {
                // Error : Dependency not registered.
            }
        }

        $array[$name] = array(
            "path" => $path,
            "dependencies" => $dependencies,
        );

    }

    public static function register_js($name, $path, $dependencies) {
        StaticManager::register($name, $path, $dependencies, StaticManager::$js_registry);
    }

    public static function register_css($name, $path) {
        StaticManager::register($name, $path, array(), StaticManager::$css_registry);
    }

    /**
     * Change path section
     */
    private static function change_path($name, $path, $array) {
        if (!isset($array[$name])) {
            // Error : not registered
        }

        $record = $array[$name];
        $record['path'] = $path;
    }

    private static function change_path_js($name, $path) {
        StaticManager::change_path($name, $path, StaticManager::$js_registry);
    }

    private static function change_path_css($name, $path) {
        StaticManager::change_path($name, $path, StaticManager::$css_registry);
    }


    /**
     * Enqueue section
     */
    private static function enqueue($name, $array) {
        if (!isset($array[$name])) {
            // Error : not registered
        }

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
     * Dequeue section
     */
    private static function dequeue($name, $array) {
        if (!isset($array[$name])) {
            // Error : not registered
        }

        if (in_array($name, $array)) {
            // TODO: Implement
            // TODO: Automatically dequeue dependent scripts.
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