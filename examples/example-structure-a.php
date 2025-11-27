<?php
require_once '../vendor/autoload.php';


$form = (new Form())
    ->setAttrs([
        'method' => 'post',
        "action" => '/test',
    ])
    ->addChild(
        (new Div())
            ->setAttrs([
                'id' => 'myDiv',
                'class' => 'container',
                'style' => 'background-color:#f5f5f5;padding:20px;border:1px solid #ccc;'
            ])
            ->setContext('Testing div.... might appear or not')
            ->addChild(
                (new Input())
                    ->setAttrs([
                        'type' => 'text',
                        'placeholder' => 'enter username...',
                        'name' => 'username',
                        'id' => 'username'
                    ])
            )
            ->addChild(
                (new Input())
                    ->setAttrs([
                        'type' => 'text',
                        'placeholder' => 'enter password...',
                        'name' => 'password',
                        'id' => 'password'
                    ])
            )
            ->addChild(
                (new Button())
                ->setContext('Click me bitch')
                ->setAttr('type', 'submit')
            )
    ); //

// Render form
echo $form->render();
