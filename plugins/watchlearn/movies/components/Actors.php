<?php namespace Watchlearn\Movies\Components;

use Cms\Classes\ComponentBase;
use Watchlearn\Movies\Models\Actor;

class Actors extends ComponentBase{

    public function componentDetails()
    {
        return [
            'name' => 'Actor list',
            'description' => 'List of actors'
        ];
    }

    public function defineProperties()
    {
        return [
            'result' => [
                'title' => 'Number of actors',
                'description' => 'How many actor do you want to display',
                'default' => 0,
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Only number allowed'
            ],

            'sortOrder' => [
                'title' => 'Sort actors',
                'description' => 'Sort those actors',
                'type' => 'dropdown',
                'default' => 'name asc'
            ]
        ];
    }

    public function getSortOrderOptions(){
        return [
            'name asc' => 'Name (ascending)',
            'name desc' => 'Name (descending)'
        ];
    }

    public function onRun()
    {
        $this->actors = $this->loadActors();
    }

    protected function loadActors(){
        $query = Actor::all();

        if($this->property('sortOrder') == 'name asc'){
            $query = $query->sortBy('name');
        }

        if($this->property('sortOrder') == 'name desc'){
            $query = $query->sortByDesc('name');
        }

        if($this->property('result') > 0){
            $query = $query->take($this->property('result'));
        }
        return $query;
    }

    public $actors;
}
