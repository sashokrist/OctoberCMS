<?php namespace sj\Movies;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return[
            'Sj\Movies\Components\Actors' => 'actors',
            'Sj\Movies\Components\ActorForm' => 'actorform'
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'Sj\Movies\FormWidgets\Actorbox' => [
                'label' => 'Actorbox field',
                'code'  => 'actorbox'
            ]
        ];
    }

    public function registerSettings()
    {
    }
}
