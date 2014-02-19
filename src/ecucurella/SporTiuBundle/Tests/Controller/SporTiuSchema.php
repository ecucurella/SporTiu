<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\Common\Persistence\ObjectManager;

class SporTiuSchema
{

    public static function createSchema(ObjectManager $manager)
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
