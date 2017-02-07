<?php

namespace Drupal\joel\Controller;

use Drupal\Core\Controller\ControllerBase;

class JoelController extends ControllerBase
{   
    public function content()
    {
        \Drupal\Core\Database\Database::setActiveConnection('vcms');
        
        $result = \Drupal\Core\Database\Database::getConnection()
            ->select('testautoplay', 'n')
            ->fields('n')
            ->range(0, 100)
            ->execute();
        
        \Drupal\Core\Database\Database::setActiveConnection();
        
        return [
            '#theme' => 'index',
            '#logs' => $result->fetchAll(),
            '#show_text' => 'this is a report',
        ];
    }
}