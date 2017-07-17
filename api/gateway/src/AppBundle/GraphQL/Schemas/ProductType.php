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
use AppBundle\GraphQL\Schemas\OfferType;

use Youshido\GraphQL\Relay\Connection\ArrayConnection;
use Youshido\GraphQL\Relay\Connection\Connection;


class ProductType extends AbstractObjectType
{
    const TYPE_KEY = 'product';

    public function build($config)
    {
        $config
            ->addField(new GlobalIdField(self::TYPE_KEY))
            ->addField('name', [
                'type' => TypeMap::TYPE_STRING,
                'description' => 'The name of product.',
                'resolve'     => function ($value = null, $args = [], $type = null) {
                    return $value['label'];
                }
            ])
            ->addField('description', ['type' => TypeMap::TYPE_STRING, 'description' => 'The description of product.'])
            ->addField('offers', [
                'type'        => Connection::connectionDefinition(new OfferType()),
                'description' => 'The offer used by the product',
                'args'        => Connection::connectionArgs(),
                'resolve'     => function ($value = null, $args = [], $type = null) {
                    return ArrayConnection::connectionFromArray($value['offers']);
                }
            ]);
    }

    public function getOne($id)
    {
        return TestDataProvider::getShip($id);
    }

    public function getDescription()
    {
        return 'product type';
    }

    public function getInterfaces()
    {
        return [new NodeInterfaceType()];
    }

    public function getProduct($value = null, $args, $info)
    {
        $product = json_decode(file_get_contents("http://172.20.0.1:8000/product/".$args['id']), true);
        return $product;
    }

}