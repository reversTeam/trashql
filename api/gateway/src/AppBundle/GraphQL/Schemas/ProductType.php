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
use Youshido\GraphQl\Relay\Connection\ArrayConnection;
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
                    dump($value, $args, $type);
                    $product = json_decode(file_get_contents("http://riviere.io:8001/offers"), true);
                    return $product["name"];
                }
            ])
            ->addField('description', ['type' => TypeMap::TYPE_STRING, 'description' => 'The description of product.'])
            ->addField('offers', [
                'type'        => Connection::connectionDefinition(new OfferType()),
                'description' => 'Offers by product',
                'args'        => Connection::connectionArgs(),
                'resolve'     => function ($value = null, $args = [], $type = null) {
                    return ArrayConnection::connectionFromArray(array_map(function ($id) {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, "http://riviere.io:8001/offers");
                        curl_setopt($ch, CURLOPT_HEADER, TRUE);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        $test = curl_exec($ch);
                        curl_close($ch);
                        dump($test);
                        return $test;
                    }, $value['ships']), $args);
                }
            ]);;
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

    public function getProduct()
    {
        return [
            ''
        ];
    }

}