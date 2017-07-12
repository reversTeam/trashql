<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/offers")
 */
class OfferController extends BaseController
{
	protected $entities = [
		[
			"id" => 1,
			"name" => "Offer 1",
			"description" => "Offer description 1",
		],
		[
			"id" => 2,
			"name" => "Offer 2",
			"description" => "Offer description 2",
		],
		[
			"id" => 3,
			"name" => "Offer 3",
			"description" => "Offer description 3",
		],
		[
			"id" => 4,
			"name" => "Offer 4",
			"description" => "Offer description 4",
		],
		[
			"id" => 5,
			"name" => "Offer 5",
			"description" => "Offer description 5",
		],
	];
}
