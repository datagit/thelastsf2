<?php

namespace Dao\DevBundle\Controller;

use Lsw\ApiCallerBundle\Call\HttpGetHtml;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        //echo '<pre>';
        print_r($this->callApi());
        return array('name' => $name);
    }

    private function callApi() {
        $url = "http://google.com.vn";
        $parameters = array('q' => 'test');
        $output = $this->get('api_caller')->call(new HttpGetHtml($url, null, $parameters));
        return $output;
    }
}
