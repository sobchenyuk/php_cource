<?php


use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Models\Category::class, function (ModelConfiguration $model){
    $model->setTitle('Категории');


    $model->onDisplay(function (){

        $display = AdminDisplay::tree()->setValue('title');

        return $display;
    });

    $model->onEdit(function($id) {

        $form = AdminForm::form()->setElements([
            AdminFormElement::text('title', 'Название категории')->required(),
        ]);

        return $form;
    });

    $model->onCreate(function($id = null) {

        $form = AdminForm::form()->setElements([
            AdminFormElement::text('title', 'Название категории')->required(),
        ]);

        return $form;
    });
});
