<?php

use core\WriteMe;

require 'core/WriteMe.php';

$WriteMe = new WriteMe();

$WriteMe->set('heading', ['PHP Write Me', 'h1'], 1);

$WriteMe->set('horizontalRule', [], 1);

$WriteMe->set('heading', ['PHP Lib to Easily Generate .md Files', 'h2'], 2);

$WriteMe->set('blockquote', ['Developed by: gsdesenvolvedor@gmail.com (@gsdesenvolvedor)']);

$WriteMe->generate('README.md');

