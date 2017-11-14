<?php

namespace App\Admin\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Form\FormElements;

use App\Models\MainForm;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;


use SleepingOwl\Admin\Form\Buttons\Save;

/**
 * Class MainForms
 *
 * @property \App\Models\MainForm $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class MainForms extends Section implements Initializable
{

    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Основные';

    /**
     * @var string
     */
    protected $alias ='main_settings';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        app()->booted(function() {
            \AdminNavigation::getPages()
                ->findById('main-examples')
                ->addPage(
                    $this->makePage(0)
                );
        });
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $tabs = AdminDisplay::tabbed();

        $form = $this->fireEdit( MainForm::first()->id );


        $form->getButtons()->replaceButtons([
            'delete' => null,
            'save'   => (new Save())->setText('Сохранить')
        ]);

        $tabs->appendTab(
            new  FormElements([
                $form
            ]),
            //Название таба
            'Основные настройки сайта'
        );

        return $tabs;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
{
    return AdminForm::panel()
        ->addBody([
            AdminFormElement::text('description', 'Мета-тег Description')->required(),
            AdminFormElement::text('title', 'H1')->required(),
            AdminFormElement::text('copyright', 'Текст в подвале сайта')->required(),
        ])
        ->setHtmlAttribute('enctype', 'multipart/form-data');
}


}
