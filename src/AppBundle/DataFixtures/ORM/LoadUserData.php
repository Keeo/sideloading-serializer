<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User;
        $user->setName("Martin");
        
        $user->setCompany($this->getReference("company"));
        $this->addReference("user", $user);
        
        $manager->persist($user);
        $manager->flush();
    }

    public function getOrder()
    {
        return 20;
    }
}
