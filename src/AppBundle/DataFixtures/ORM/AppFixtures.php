<?php
/**
 * Created by PhpStorm.
 * User: smerth
 * Date: 2015-07-29
 * Time: 13:35
 */

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;

/**
 * Class TestDataLoader
 * @package AppBundle\DataFixtures\ORM
 */
class TestDataLoader extends DataFixtureLoader
{
    /**
     * {@inheritdoc}
     */
    protected function getFixtures()
    {
        return  array(
        	// __DIR__.'/AliceTestData_User.yml',
            __DIR__.'/AliceTestData_BlogPosts.yml',
            // __DIR__.'/AliceTestData_Comment.yml',
        );
    }
}
