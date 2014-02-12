<?php

namespace ecucurella\SporTiuBundle\DataFixtures\ORM;

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\Common\Persistence\ObjectManager;

class SporTiuSchema
{

    public static function generateSchema(ObjectManager $manager)
    {
        $metadatas = $manager->getMetadataFactory()->getAllMetadata();
        if (!empty($metadatas)) {
            $tool = new SchemaTool($manager);
            $tool->createSchema($metadatas);
        }
    }
 
    public static function dropSchema(ObjectManager $manager)
    {
        $metadatas = $manager->getMetadataFactory()->getAllMetadata();
        if (!empty($metadatas)) {
            $tool = new SchemaTool($manager);
            $tool->dropSchema($metadatas);
        }
    }

}
