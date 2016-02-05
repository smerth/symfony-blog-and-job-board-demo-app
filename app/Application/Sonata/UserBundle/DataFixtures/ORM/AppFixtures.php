<?php
// From -> http://pygmeeweb.com/2013/10/14/cms-day06-data-fixtures.html
// src/Application/Sonata/UserBundle/DataFixtures/ORM/LoadUserData.php
namespace Application\Sonata\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

use Application\Sonata\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture
                   implements OrderedFixtureInterface,
                              FixtureInterface,
                              ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $filename = __DIR__ . DIRECTORY_SEPARATOR  . 'LoadUserData.yml';
        $yml      = Yaml::parse(file_get_contents($filename));
        $userManager = $this->container->get('fos_user.user_manager');

        foreach ($yml as $userReference => $data) {
            $user = $userManager->createUser();
            $user->setUsername($data['username']);
            $user->setEmail($data['email']);
            $user->setPlainPassword($data['plainPassword']);

            $user->setDateOfBirth(new \DateTime(strtotime($data['date_of_birth'])));
            $user->setFirstname($data['firstname']);
            $user->setLastname($data['lastname']);
            $user->setGender($data['gender']);
            $user->setPhone($data['phone']);
            $user->setEnabled(true);

            if(isset($data['isAdmin']) && $data['isAdmin']){
                $user -> setRoles(array('ROLE_SUPER_ADMIN'));
            }

            $userManager->updateUser($user, true);
            $this->addReference($userReference, $user);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }

}
