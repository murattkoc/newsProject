<?php

namespace AppBundle\Controller;
use AppBundle\Entity\User;
use AppBundle\Entity\News;
use AppBundle\Form\CustomRegistrationType;
use AppBundle\Form\NewsShareType;
use AppBundle\Manager\UserManager;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


class RegistrationController extends \FOS\UserBundle\Controller\RegistrationController
{
    /**
     * @Route ("/custom-register", name="custom_registration")
     */
    public function customRegisterAction(Request $request, ValidatorInterface $validator)
    {
        /**
        $user = new User();
        $form = $this->createForm(new CustomRegistrationType(), $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $hash = $user->getPassword();
            $user->setP
            
            $user->setRegistrationDate(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            die("tmm");

        }
        return $this->render('AppBundle::custom_register.html.twig', [
            'form' => $form->createView()
        ]);*/
    }

    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new CustomRegistrationType(), $user);
        $form->handleRequest($request);
        $username=$user->getUsername();
        $name=$user->getFirstName();
        $email=$user->getEmail();
        if($form->isSubmitted() && $form->isValid()){
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRegistrationDate(new \DateTime());
            $token = sha1("yonca");
            $user->setConfirmToken($token);
            $user->setEnabled("t");
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $user->getProfImage();
            if($file) {
                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $file->move(
                        $this->getParameter('brochures_directory'),
                        $fileName
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochure' property to store the PDF file name
                // instead of its contents
                $user->setProfImage($fileName);

                // ... persist the $product variable or any other work

            }
            else {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                $url = $this->generateUrl('account-confirm', array(
                    'token' => $token,
                    'usr' => $username
                ), UrlGeneratorInterface::ABSOLUTE_URL);
                // url data save
                $message = (new \Swift_Message('Please verify your Habernews account'))
                    ->setFrom('HaberNews@gmail.com')
                    ->setTo($email)
                    ->setBody("<p>Hi <b>$name</b></p><p>You need to verify this account to post news on HaberNews.</p><p>Please onclick to the link below</p> <br> <a href=" . $url . ">Confirm Account</a><p>Thanks...</p><br><b><p>HaberNews Crew</b></p>", 'text/html');

                $this->get('mailer')->send($message);
            }
            return $this->render('FOSUserBundle:Registration:confirmed.html.twig', [
                'form' => $form->createView(),
                'username'=>$username,
                'email'=>$email
            ]);
        }
        else {

        return $this->render('AppBundle::custom_register.html.twig', [
            'form' => $form->createView()
        ]);}
    }

    public function registerAction2(Request $request)
    {
        /**
        /** @var $formFactory FactoryInterface
        $formFactory = $this->get('fos_user.registration.form.factory');
//        /** @var $userManager UserManagerInterface
//        $userManager = $this->get('fos_user.user_manager');

        /** @var UserManager $userManager
        $userManager = $this->get('app.user.manager');


        /** @var $dispatcher EventDispatcherInterface
        $dispatcher = $this->get('event_dispatcher');

        /** @var User $user
        $user = $userManager->createUser();
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                $userManager->updateUser($user);
                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));
                $email = $user->getEmail();
                $username = $user->getUsername();
                $name = $user->getFirstName();
                $id = $user->getId();
                $token = sha1("yonca");
                $user->setRegistrationDate(new \DateTime());
                $token .= $id;
                $user->setConfirmationToken($token);
                $user->setProfImage('/tmp/test.jpg');
                $url = $this->generateUrl('account-confirmed', array(
                    'token' => $token
                ), UrlGeneratorInterface::ABSOLUTE_URL);
                // url data save

                $entityManager = $this->getDoctrine()->getManager();

                // tells Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($user);

                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();





            }

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_FAILURE, $event);

            if (null !== $response = $event->getResponse()) {
                return $response;
            }
        }

        return $this->render('@FOSUser/Registration/register.html.twig', array(
            'form' => $form->createView(),
        ));

        // 2) handle the submit (will only happen on POST)

*/
    }

    private function bcrypt($hash)
    {
    }

    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }


}