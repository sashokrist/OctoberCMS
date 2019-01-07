<?php namespace Watchlearn\Movies\Components;

use Cms\Classes\ComponentBase;
use Input;
use Validator;
use Redirect;
use Watchlearn\Movies\Models\Actor;
use Flash;

class ActorForm extends ComponentBase
{
    public function componentDetails(){
        return [
            'name' => 'Actor Form',
            'description' => 'Enter actors'
        ];
    }

    public function onSave(){

        $actor = new Actor();
        $actor->name = Input::get('name');
        $actor->lastname = Input::get('lastname');
        $actor->actorimage = Input::get('actorimage');
        $actor->save();
        Flash::success('Actor is added');
        return Redirect::back();

    }
}
