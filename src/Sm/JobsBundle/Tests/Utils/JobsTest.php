<?php
/**
 * Created by PhpStorm.
 * User: smerth
 * Date: 2015-07-27
 * Time: 12:11
 */

namespace Sm\JobsBundle\Tests\Utils;
use Sm\JobsBundle\Utils\Jobs;

class JobsTest extends \PHPUnit_Framework_TestCase
{
    public function testSlugify()
    {
        $this->assertEquals('sensio', Jobs::slugify('Sensio'));
        $this->assertEquals('sensio-labs', Jobs::slugify('sensio labs'));
        $this->assertEquals('sensio-labs', Jobs::slugify('sensio   labs'));
        $this->assertEquals('paris-france', Jobs::slugify('paris,france'));
        $this->assertEquals('sensio', Jobs::slugify('  sensio'));
        $this->assertEquals('sensio', Jobs::slugify('sensio  '));
        $this->assertEquals('n-a', Jobs::slugify(''));
        $this->assertEquals('n-a', Jobs::slugify(' - '));
        if (function_exists('iconv'))
        {
            $this->assertEquals('developpeur-web', Jobs::slugify('Développeur Web'));
        }
    }
}
