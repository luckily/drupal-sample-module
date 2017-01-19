<?php

namespace Drupal\joel\Controller;

use Drupal\Core\Controller\ControllerBase;

class JoelController extends ControllerBase
{
    public function content()
    {
        return [
            '#type' => 'markup',
            '#markup' => t('Hello world'),
        ];
    }
}