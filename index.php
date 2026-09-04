<?php

require_once __DIR__ . '/vendor/autoload.php';

include_once('./utils/utils.php');
use Controller\ControllerHome;
use Model\ModelPlayer;
use View\ViewHome;


$controllerHome = new ControllerHome(new modelPlayer(connect()), new ViewHome());

$controllerHome->registerPlayers()->displayPlayers()->render();