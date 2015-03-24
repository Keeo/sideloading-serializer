<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Company;

class LoadCompanyData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $company = new Company;
        $company->setName("Great Company");
        $this->addReference('company', $company);
        
        
        
        $manager->persist($company);
        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
