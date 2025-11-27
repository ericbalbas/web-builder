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

// Create <head> with title, meta, and link
$head = new Head();
$head->addChild((new Title())->setContext('Full HTML Elements Test'))
    ->addChild((new Meta())->setAttr('charset', 'UTF-8'));
    // ->addChild((new Link())->setAttrs(['rel' => 'stylesheet', 'href' => 'style.css']));

// Create <body>
$body = new Body();

// Header example
$header = new Header();
$header->addChild((new H1())->setContext('HTML Elements Test Page'));

// Paragraph example
$paragraph = new P();
$paragraph->setContext('This page demonstrates all your HTML component classes.');

// Form example
$form = (new Form())->setAttr('action', '#')->setAttr('method', 'post');
$form->addChild((new Input())->setAttrs(['type' => 'text', 'name' => 'username', 'placeholder' => 'Username']))
    ->addChild((new Input())->setAttrs(['type' => 'password', 'name' => 'password', 'placeholder' => 'Password']))
    ->addChild((new Button())->setContext('Submit'));

// Image example
$img = (new Img())->setAttr('src', 'corgi.jpg')->setAttr('alt', 'Placeholder');

// Table example
$table = new Table();
$row = new Tr();
$row->addChild((new Td())->setContext('Cell 1'))
    ->addChild((new Td())->setContext('Cell 2'));
$table->addChild($row);

// List example
$ul = new Ul();
$ul->addChild((new Li())->setContext('Item 1'))
    ->addChild((new Li())->setContext('Item 2'))
    ->addChild((new Li())->setContext('Item 3'));

// Footer example
$footer = new Footer();
$footer->setContext('© 2025 Test Page');

// Assemble body
$body->addChild($header)
    ->addChild($paragraph)
    ->addChild($form)
    ->addChild($img)
    ->addChild($table)
    ->addChild($ul)
    ->addChild($footer);

// Assemble html
$html->addChild($head)->addChild($body);

// Output the full page
echo $html->render();
