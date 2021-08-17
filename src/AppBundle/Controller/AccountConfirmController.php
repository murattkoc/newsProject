<?php

namespace UsersBundle\Controller;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountConfirmController extends Controller
{
    /**
     * @Route("/account-confirm", name="account-confirm")
     */
    public function accountAction(Request $request)
    {

        $token=$request->query->get('token');
        $user=$request->query->get('usr');
        /** @var User $user */
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy( array('confirm_token' => $token,'username'=>$user, 'newsActivation'=>0));
        if($user) {
            $user->setNewsActivation(1);
            $user->setRoles((array)"ROLE_AUTHOR");
            $entityManager = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->render('AppBundle::account_confirmed.html.twig', [
                'flag' => 1
            ]);
        }
        else {
            return $this->render('AppBundle::account_confirmed.html.twig', [
                'flag' => 0
            ]);
        }


    }
}
