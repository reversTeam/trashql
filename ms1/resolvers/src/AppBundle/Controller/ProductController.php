<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("/products")
 */
class ProductController extends BaseController
{
	protected $entities = [
		[
			"id" => 1,
			"name" => "Product 1",
			"description" => "Product description 1",
		],
		[
			"id" => 2,
			"name" => "Product 2",
			"description" => "Product description 2",
		],
		[
			"id" => 3,
			"name" => "Product 3",
			"description" => "Product description 3",
		],
		[
			"id" => 4,
			"name" => "Product 4",
			"description" => "Product description 4",
		],
		[
			"id" => 5,
			"name" => "Product 5",
			"description" => "Product description 5",
		],
		[
			"id" => 6,
			"name" => "Product 6",
			"description" => "Product description 6",
		],
		[
			"id" => 7,
			"name" => "Product 7",
			"description" => "Product description 7",
		],
	];
}

