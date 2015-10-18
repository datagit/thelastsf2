<?php

namespace Dao\DevBundle\Controller;

use Dao\DevBundle\Entity\Task;
use Lsw\ApiCallerBundle\Call\HttpGetHtml;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/dev")
     * @Template()
     */
    public function indexAction()
    {
        // create a task and give it some dummy data for this example
        $task = $this->createForm(new Task());
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->getForm();

        return $this->render('AcmeTaskBundle:Default:new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/dev/new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit', array('label' => 'Create Task'))
            ->getForm();

        return $this->render('DaoDevBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    private function callApi() {
        $url = "http://google.com.vn";
        $parameters = array('q' => 'test');
        $output = $this->get('api_caller')->call(new HttpGetHtml($url, null, $parameters));
        return $output;
    }
}
