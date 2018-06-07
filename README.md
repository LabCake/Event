# Event
Easy event handler for php

Usage example
```php
\LabCake\Event::register("test_event", function ($arg1, $arg2) {
    var_dump($arg1);
    var_dump($arg2);
});

\LabCake\Event::trigger("test_event", array("Hello", "World"));
```

Documentation not yet complete