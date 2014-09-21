<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 11:46 AM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Traits;

/**
 * Class Generic
 * @package Tests\NilPortugues\Validator\Traits
 */
trait GenericTrait
{
    /**
     * @param string|null $value
     *
     * @return bool
     */
    public static function isRequired($value)
    {
        return isset($value) === true
        && is_null($value) === false
        && empty($value) === false;
    }

    /**
     * @param string|null $value
     *
     * @return bool
     */
    public static function isNotNull($value)
    {
        return $value !== null && $value !== '';
    }
}
