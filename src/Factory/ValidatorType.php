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
        'array' => 'isArray',
        'int' => 'isInteger',
        'integer' => 'isInteger',
        'float' => 'isFloat',
        'object' => 'isObject',
        'string' => 'isString',
        'date' => 'isDateTime',
        'file' => 'isFileUpload',
    ];

    /**
     * @param $type
     *
     * @return bool
     */
    public static function isSupported($type)
    {
        return isset(self::$supportedTypes[strtolower($type)]);
    }

    /**
     * @param $type
     *
     * @return mixed
     */
    public static function getMethod($type)
    {
        return self::$supportedTypes[strtolower($type)];
    }
}
