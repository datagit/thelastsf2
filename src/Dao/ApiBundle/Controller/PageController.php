<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 17/10/2015
 * Time: 14:53
 */

namespace Dao\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

// Get Route Definition
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class PageController extends FOSRestController {

    /**
     * GET Route annotation.
     * @Get("/pages/")
     * Collection get action
     * @var Request $request
     * @return array
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets all Pages",
     *   output = "Dao\ApiBundle\Entity\Page",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found"
     *   }
     * )
     *
     */
    public function cgetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DaoApiBundle:Page')->findAll();

        throw new HttpException(400, "New comment is not valid.");

        $statusCode = 200;

        $view = $this->view(array('statusCode' => $statusCode, 'data' => $entities ), $statusCode);
        return $this->handleView($view);
    }

    /**
     * GET Route annotation.
     * @Get("/pages/{id}")
     * @var Request $request
     * @return array
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a Page for a given id",
     *   output = "Dao\ApiBundle\Entity\Page",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found"
     *   }
     * )
     *
     */
    public function getAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DaoApiBundle:Page')->find($id);

        $statusCode = 200;

        $view = $this->view(array('statusCode' => $statusCode, 'data' => $entities ), $statusCode);
        return $this->handleView($view);
    }

}