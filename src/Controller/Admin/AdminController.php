<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller\Admin
 * @Route("/admin/user", name="admin_user")
 */
class UserController extends AbstractController
{
    /**
     * @param EntityManagerInterface $em
     * @Route("/list", name="list")
     * @return Response
     */
    public function list(EntityManagerInterface $em): Response
    {
        // Get all users
        $users = $em->getRepository(User::class)->findAll();

        return $this->render('admin/user/list.html.twig', [
            'users' => $users,
        ]);
    }

    public function add(EntityManagerInterface $em, Request $request): Response
    {
        $user = new User();

        // Create form
        $form = $this->createForm(UserType::class, $user);

        return $this->render('admin/user/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param EntityManagerInterface $em
     * @param Request $request
     * @return Response
     */
    public function edit(EntityManagerInterface $em, Request $request): Response
    {


        return $this->render('admin/user/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function remove(): Response
    {

    }
}
