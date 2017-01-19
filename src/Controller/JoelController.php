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
            ->range(0, 10)
            ->execute();
        
        // 切回drupal預設的DB連線
        \Drupal\Core\Database\Database::setActiveConnection();
        
        while($record = $result->fetchAssoc()) {
            print_r($record);
            echo PHP_EOL;
        }
        
        return [
            '#type' => 'markup',
            '#markup' => 'Hi Joel',
        ];
    }
}
