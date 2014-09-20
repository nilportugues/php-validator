<?php
/**
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 * Date: 9/20/14
 * Time: 1:05 PM
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\NilPortugues\Validator\Resources;

/**
 * Class Dummy
 * @package Tests\NilPortugues\Validator\Resources
 */
class Dummy extends \DateTime implements DummyInterface
{
    /**
     * @var string
     */
    private $userName = 'username';

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }
}
