<?php

/**
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT License
 */

namespace Propel\Tests\Generator\Platform;

use Propel\Generator\Builder\Util\XmlToAppData;

/**
 * Base class for all Platform tests
 * @package    generator.platform
 */
abstract class PlatformTestBase extends \PHPUnit_Framework_TestCase
{

    abstract protected function getPlatform();

    protected function getDatabaseFromSchema($schema)
    {
        $xtad = new XmlToAppData($this->getPlatform());
        $appData = $xtad->parseString($schema);

        return $appData->getDatabase();
    }

    protected function getTableFromSchema($schema, $tableName = 'foo')
    {
        return $this->getDatabaseFromSchema($schema)->getTable($tableName);
    }

}
