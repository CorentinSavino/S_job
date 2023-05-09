<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('inscription', name: 'inscription')]
    public function inscription(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $encoder):Response
    {

        $notification= null; 
        $user=new User();

        $form=$this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isValid() && $form->isSubmitted()){
            $user = $form->getData();
            $search_email = $entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());
            
            if(!$search_email){
                $password = $encoder->hashPassword($user, $user->getPassword());
                $user->setPassword($password);
                $entityManager->persist($user);
                $entityManager->flush();
                $this->addFlash(
                    'success_register',
                    'Vous êtes bien inscrit'
                );
                return $this->redirectToRoute('home');
            }else{
                $notification='L\'email saisi est déjà existant';
            }
        }

    return $this->render('/inscription.html.twig',[
        
        'register_form'=>$form->createView(),
        'current_menu'=>'home',
        'notification'=>$notification

    ]);
    }
}

?>