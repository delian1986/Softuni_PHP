<?php
/**
 * Base Controller
 * Loads the models and views
 */

class Controller
{
    //Load model
    public function model($model){
        //require model file
        require_once APPROOT.'/Models/'.$model.'.php';

        //Instantiate model
        return new $model();
    }

    //Load view
    public function view($view,$data=[]): void
    {
        //Check for view file
        if (file_exists(APPROOT.'/Views/'.$view.'.php')){
            require_once APPROOT.'/Views/'.$view.'.php';
        }else{
            die('View does noe exists');
        }
    }
}