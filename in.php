<?php

use App\Models\Users;
use App\Role;
use App\User;
use SleepingOwl\Admin\Form\FormElements;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(\App\Models\Users::class, function (ModelConfiguration $model){


    $model->creating(function(ModelConfiguration $model, \App\Models\Users $company) {

        $phone = Request::input('phone' );
        $surname = Request::input('surname' );
        $region = Request::input('region' );
        $name = Request::input('name' );
        $area = Request::input('area' );
        $email = Request::input('email' );
        $date = date('Y-m-d h:i:s');

        $users = DB::table('users')->insert(
            [
                'name' => $name,
                'email' => $email,
                'area' => $area,
                'region' => $region,
                'surname' => $surname,
                'phone' => $phone,
                'role' => '3',
                'created_at' => $date,
                'updated_at' => $date
            ]
        );

        $userRole = Role::where('name', 'User')->first();
        $user = User::where('name', '=', $name)->first();

        $user->roles()->attach($userRole->id);

        header('Location: /admin/users');

        die;

    });



    $model->setTitle('Пользователи');
    $model->onDisplay(function (){

        $display = AdminDisplay::table();

        $display->setHtmlAttribute('class', 'table-bordered table-primary table-hover');

        $display->getApply()->push(function ($query) {
            $query->orderBy('name', 'asc');
        });

        $display->paginate(10);
        $display->with('roles');

        $display->setColumns([

            AdminColumn::text('name', 'Имя'),
            AdminColumn::email('email', 'Email'),
            AdminColumnEditable::text('phone')->setLabel('Телефон'),
            AdminColumn::datetime('created_at')->setLabel('Дата регитрации')->setFormat('d.m.Y'),
//            AdminColumn::lists('roles.name', 'Роль'),
            AdminColumnEditable::select('role','user id')
                ->setModelForOptions(new Role)
                ->setLabel('Роль')
                ->setDisplay('name')
        ]);
        $display->getColumns()->getControlColumn();

        return $display;
    });

//    $role = App\Models\Users::create(['role' => '3']);

    $model->onCreateAndEdit(function($id = null) {


        $formPrimary = AdminForm::form()->addElement(
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('name', 'Имя')->required(),
                    AdminFormElement::text('email', 'Email')->required()->addValidationRule('email'),
                    AdminFormElement::text('surname', 'Фамилия')->required(),
                    AdminFormElement::text('region', 'Область')->required(),
                    AdminFormElement::text('area', 'Город')->required(),
                    AdminFormElement::text('phone', 'Телефон')->required(),
                ], 6)
        );
        $formHTML = AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::select('role','Роль')
                            ->setModelForOptions(new Role)
                            ->setLabel('Роль')
                            ->setDisplay('name')

                    ], 6)
            ])
        );
        $formVisual = AdminForm::form()->addElement(
            new FormElements([
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::password('password', 'Пароль')
                            ->required('Поле "ароль" обязетельно для заполнения')
                            ->addValidationRule('min:6','Пароль должен быть не менее 6 символов.')
                            ->hashWithBcrypt(),
                    ], 6)
            ])
        );

        $tabs = AdminDisplay::tabbed();

        $tabs->appendTab($formPrimary,  'Основные настройки');

        $tabs->appendTab($formHTML,     'Изменить роль');

        $tabs->appendTab($formVisual,   'Изменить пароль');

        return $tabs;

    });


});
