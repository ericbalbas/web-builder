<?php

require_once '../vendor/autoload.php';

use Api\Web\Components\Root\Html;
use Api\Web\Components\Root\Head;
use Api\Web\Components\Root\Body;
use Api\Web\Components\Root\Title;
use Api\Web\Components\Root\Meta;
use Api\Web\Components\Root\Link;
use Api\Web\Components\Layout\Div;
use Api\Web\Components\Layout\Header;
use Api\Web\Components\Layout\Footer;
use Api\Web\Components\Typography\H1;
use Api\Web\Components\Typography\P;
use Api\Web\Components\Form\Form;
use Api\Web\Components\Form\Input;
use Api\Web\Components\Form\Button;
use Api\Web\Components\Media\Img;
use Api\Web\Components\Table\Table;
use Api\Web\Components\Table\Tr;
use Api\Web\Components\Table\Td;
use Api\Web\Components\Lists\Ul;
use Api\Web\Components\Lists\Li;

// Create <html>
$html = new Html();

// Head
$head = (new Head())
    ->addChild((new Title())->setContext('Full HTML Elements Test'))
    ->addChild((new Meta())->setAttr('charset', 'UTF-8'))
    ->addChild((new Link())->setAttrs(['rel' => 'stylesheet', 'href' => 'style.css']));

// Body
$body = new Body();

// Header
$header = (new Header())
    ->addChild((new H1())->setContext('HTML Elements Test Page')->class('title'));

// Paragraph
$paragraph = (new P())
    ->setContext('This page demonstrates all your HTML component classes.')
    ->class('description');

// Form
$form = (new Form())
    ->action('#')
    ->method('post')
    ->class('login-form')
    ->addChild(
        (new Input())
            ->type('text')
            ->name('username')
            ->placeholder('Username')
            ->id('username')
            ->class('form-control')
    )
    ->addChild(
        (new Input())
            ->type('password')
            ->name('password')
            ->placeholder('Password')
            ->id('password')
            ->class('form-control')
    )
    ->addChild(
        (new Button())
            ->type('submit')
            ->setContext('Login')
            ->class('btn btn-primary')
    );

// Image
$img = (new Img())
    ->src('corgi.jpg')
    ->alt('Placeholder Image')
    ->class('rounded');

// Table
$table = (new Table())
    ->class('table')
    ->addChild(
        
        (new Tr())->mapChild([['Row 1', 'Cell 1'], ['Row 2', 'Cell 2']], function($row) {
            return (new Tr)->mapChild($row, function($cell) {
                return (new Td)->setContext($cell);
            });
        })    
    );

// List
$ul = (new Ul())->class('list')->mapChild(['list 1', 'list 2', 'list 3'], function($list){
    return (new Li)->setContext($list);
});

// Footer
$footer = (new Footer())->setContext('© 2025 Test Page')->class('footer');

// Assemble Body
$body->mapChild([$header, $paragraph, $form, $img, $table, $ul, $footer]);

// Assemble HTML
$html->addChild($head)
    ->addChild($body);

// Render Page
echo $html->render();
