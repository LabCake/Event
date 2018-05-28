<?php

/**
 * A simple event handler in PHP
 * @author LabCake
 * @copyright 2018 LabCake
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace LabCake;
class Event
{
    /**
     * @var array List of all registered events
     */
    private static $_events = array();

    /**
     * Register an event
     * @param string $name
     * @param mixed $callback
     */
    public static function register($name, $callback)
    {
        if (is_array($name)) {
            foreach ($name as $n) {
                self::register($n, $callback);
            }
            return;
        }

        if (!isset(self::$_events[$name]))
            self::$_events[$name] = array();

        self::$_events[$name][] = $callback;
    }

    /**
     * Trigger event handlers specified name
     * @param $name
     * @param array $args
     */
    public static function trigger($name, $args = array())
    {
        $name = strtolower($name);

        if (!isset(self::$_events[$name]))
            return;

        if (!is_array(self::$_events[$name]))
            return;

        foreach (self::$_events[$name] as $event) {
            if (is_callable($event)) {
                call_user_func_array($event, $args);
            }
        }
    }
}