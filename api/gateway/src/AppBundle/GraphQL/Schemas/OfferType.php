<?php
/*
* This file is a part of GraphQL project.
*
* @author Alexandr Viniychuk <a@viniychuk.com>
* created: 5/10/16 11:17 PM
*/

namespace AppBundle\GraphQL\Schemas;



use Youshido\GraphQL\Relay\Field\GlobalIdField;
use Youshido\GraphQL\Relay\NodeInterfaceType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\TypeMap;
use Youshido\GraphQl\Relay\Connection\ArrayConnection;
use Youshido\GraphQL\Relay\Connection\Connection;

class OfferType extends AbstractObjectType
{
    const TYPE_KEY = 'offer';

    public function build($config)
    {
        $config
            ->addField(new GlobalIdField(self::TYPE_KEY))
            ->addField('name', ['type' => TypeMap::TYPE_STRING, 'description' => 'The name of offer.'])
            ->addField('description', ['type' => TypeMap::TYPE_STRING, 'description' => 'The description of offer.']);
    }

    public function getOne($id)
    {
        return TestDataProvider::getShip($id);
    }

    public function getDescription()
    {
        return 'offer type';
    }

    public function getInterfaces()
    {
        return [new NodeInterfaceType()];
    }

}
