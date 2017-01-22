<?php

namespace Agee\Console\Services\Make;

use Agee\Console\Service;

class Module extends Service
{

    use traitMaker;

    protected $availableCalls = ['help', 'model', 'controller', 'view', 'crud'];

    public function getModel($modelName, $fields){
        $response = "\n\n--- Creating model --- \n\n";
        $response.=$this->createModel($modelName,$fields);
        return $response;
    }

    public function getController($controllerName){
        $response = "\n\n--- Creating controller --- \n\n";
        $response.=$this->createController($controllerName);

        return $response;
    }

    public function getView($viewName){
        $response = "\n\n--- Creating view --- \n\n";
        $response.=$this->createView($viewName);

        return $response;
    }


    public function getCrud($objectName, $objectFields){
        $response = "\n\n--- Creating CRUD package --- \n\n";
        $response.=$this->createCRUD($objectName,$objectFields);
        return $response;
    }





    public function getHelp(){
        $text = "---- Carl - Agee manager ----\n";
        $text.= "Make module - Available commands:\n\n";
        $text.= "  model [array of model fields] \n    - run migration from /Apps/Migrate\n\n";
        $text.= "  view \n    - run migration from /Apps/Migrate\n\n";
        $text.= "  controller \n    - run migration from /Apps/Migrate\n\n";
        $text.= "  crud [array of model fields] \n    - run migration from /Apps/Migrate\n\n";
        $text.= "\n\n";
        return $text;
    }

}