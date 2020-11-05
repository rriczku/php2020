<?php
use Widget\Link;
use Widget\Button;
use Widget\Widget;
use Storage\FileStorage;
class App
{
    public function run() {
        $widgets= [
            new Link(1),new Link(2),new Link(3),
            new Button(1),new Button(2),new Button(3)
        ];
        $storage = new FileStorage();

        foreach($widgets as $widget)
            $storage->store($widget);

        $widgets=$storage->loadAll();

        foreach($widgets as $widget)
            $this->render($widget);

    }
    public static function render(Widget $widget)
    {
        $widget->draw();
    }
}
