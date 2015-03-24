<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Token;

class LoadTokenData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $token = new Token;
        $token->setToken("sxcdftrbgyijmko");
        
        $token->setUser($this->getReference('user'));
        $this->addReference('token', $token);
        
        $manager->persist($token);
        $manager->flush();
    }

    public function getOrder()
    {
        return 30;
    }
}
