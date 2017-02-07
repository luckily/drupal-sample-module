<?php

namespace Drupal\joel\Controller;

use Drupal\Core\Controller\ControllerBase;

class JoelController extends ControllerBase
{   
    public function content()
    {
        // 切換DB連線
        \Drupal\Core\Database\Database::setActiveConnection('your_db');
        
        $result = \Drupal\Core\Database\Database::getConnection()
            ->select('your_table', 'n')
            ->fields('n')
            ->range(0, 100)
            ->execute();
        
        // 切回drupal預設的DB連線
        \Drupal\Core\Database\Database::setActiveConnection();
        
        return [
            '#theme' => 'index',
            '#logs' => $result->fetchAll(),
            '#show_text' => 'this is a report',
        ];
    }
}
