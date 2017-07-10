<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;


abstract class BaseController extends Controller
{

	protected $entities = [];

    /**
     * @Route("")
     */
	public function listAction(Request $request)
{
		return new JsonResponse($this->entities);
	}

    /**
     * @Route("/{id}", requirements={"id" = "\d+"})
     */
	public function viewAction(Request $request, $id)
	{
		if (isset($this->entities[$id - 1])) {
			$data = $this->entities[$id - 1];
		} else {
			$data = [
				'error' => 1,
				'message' => "Entity not found",
			];
		}
		return new JsonResponse($data);
	}

}
