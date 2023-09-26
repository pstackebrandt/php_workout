<?php

declare(strict_types=1);

namespace train_b4_insert_media\classes;

use PHPUnit\Framework\TestCase;
use train_b4_insert_media\classes\MediumType;
use train_b4_insert_media\classes\Medium;
use train_b4_insert_media\classes\MediumInterface;

require_once __DIR__ . '\..\include\config.inc.php';
require_once 'MediumInterface.php';
require_once 'Medium.class.php';

#echo 'PROJECT_ROOT = ' . PROJECT_ROOT;

// call this file with:
// vendor/bin/phpunit train_b4_insert_media/classes/MediumTypeTest.class.test.php

class MediumTypeTest extends TestCase
{
    // public function testWhetherTestingWorks()
    // {
    //     $this->assertEquals('ok', 'ok');

    //     // $this->assertNull(MediumType::getValueOrNull(null), 'Should return null if the parameter is null.');
    // }

    // public function testWhetherTestingWorksAndFailsTest()
    // {
    //     $this->assertEquals('ok', 'not ok');
    // }

    public function testGetValueOrNull_returnsNull()
    {
        $this->assertNull(MediumType::getValueOrNull(null), 'Should return null if the parameter is null.');
    }

    public function testGetValueOrNull_returnsDvdValue()
    {
        $this->assertEquals('DVD', MediumType::getValueOrNull(MediumType::DVD));
    }
}

// exit('test ok');