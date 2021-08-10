<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UrlController extends Controller
{
    /**
     * @Route("/profile/change-password", name="change-password")
     */
    public function indexAction(Request $request)
    {
        return $this->render('ChangePassword/change_password_content.html.twig');
    }

}
