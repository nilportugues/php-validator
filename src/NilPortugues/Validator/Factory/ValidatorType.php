<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 12/29/14
 * Time: 9:00 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NilPortugues\Validator\Factory;


/**
 * Class ValidatorType
 * @package NilPortugues\Validator\Factory
 */
class ValidatorType
{
    /**
     * @var array
     */
    protected static $supportedTypes = [
        'array',
        'integer',
        'float',
        'object',
        'string',
        'date',
        'file',
    ];

    /**
     * @param $type
     *
     * @return bool
     */
    public static function isSupported($type)
    {
        return in_array(strtolower($type), self::$supportedTypes, true);
    }
} 