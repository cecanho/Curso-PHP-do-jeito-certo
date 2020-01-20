<?php

include '../../../autoload.php';

// Create new Plates instance
$templates = new League\Plates\Engine('templates');

// Preassign data to the layout
$templates->addData(['company' => 'PHP do jeito certo!'], 'layout');

// Render a template
echo $templates->render('profile', ['name' => 'Cristiano']);
