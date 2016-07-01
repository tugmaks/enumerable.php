<?php
/**
 * This file is part of the "litgroup/enumerable" package.
 *
 * (c) Roman Shamritskiy <roman@litgroup.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LitGroup\Enumerable\Test;

use LitGroup\Enumerable\Enumerable;

/**
 * Abstract test case for enumerable classes.
 *
 * @author Roman Shamritskiy <roman@litgroup.ru>
 *
 * @codeCoverageIgnore
 */
abstract class EnumerableTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Asserts that Enumerable has the same index as expected.
     *
     * @param mixed $expected Expected index.
     * @param Enumerable $enum Enumerable value.
     */
    public function assertEnumIndex($expected, Enumerable $enum)
    {
        $this->assertSame($expected, $enum->getIndex());
    }

    /**
     * Asserts that enumerable class contains exactly $count values.
     *
     * @param int $count Expected number of values.
     * @param string $enumClass Name of enumerable class.
     */
    public function assertEnumValuesCount($count, $enumClass)
    {
        if (!is_subclass_of($enumClass, Enumerable::class)) {
            throw new \InvalidArgumentException('$enumClass must be a name of enumerable class.');
        }

        $this->assertCount($count, call_user_func([$enumClass, 'getValues']));
    }
}