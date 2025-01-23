<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $members = $entityManager->getRepository(User::class)->findAll();

        return $this->render('user/index.html.twig', [
            'members' => $members,
        ]);
    }

    /**
     * @Route("/profile", name="app_profile")
     */
    public function profile(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();
        $member = $entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);

        return $this->render('user/profile.html.twig', [
            'member' => $member,
        ]);
    }
}
