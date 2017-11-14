<?php

namespace App\Admin\Http\Sections;

use AdminColumn;
use AdminColumnEditable;
use AdminDisplay;
use AdminForm;
use AdminFormButton;
use AdminFormElement;
use AdminNavigation;
use SleepingOwl\Admin\Form\FormElements;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;


use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Delete;
use SleepingOwl\Admin\Form\Buttons\Cancel;

/**
 * Class Social
 *
 * @property \App\Models\Social $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Social extends Section implements Initializable
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
    protected $title = "Социальные сети";

    /**
     * @var string
     */
    protected $alias = "social";

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
        return AdminDisplay::table()

            ->setHtmlAttribute('class', 'table-bordered table-primary table-hover')

            ->setColumns(
                AdminColumn::text('title', 'Название'),
                AdminColumn::image('img', 'Иконка')
                    ->setHtmlAttribute('class', 'hidden-sm hidden-xs foobar'),
                AdminColumnEditable::text('link')->setLabel('Ссылка на страницу')
            )->paginate(15);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $form = AdminForm::form()->setElements([
            AdminFormElement::text('title', 'Название')->required(),
            AdminFormElement::image('img', 'Иконка для сайта')->required(),
            AdminFormElement::text('link', 'Ссылка на страницу')->required(),
        ]);
        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
}
