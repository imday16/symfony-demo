<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/home')]
class AdminHomeController extends AbstractController
{
    #[Route('/', name: 'app_admin_home_index', methods: ['GET'])]
    public function index(HomeRepository $homeRepository): Response
    {
        return $this->render('admin_home/index.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_home_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Instanciation d'une entité correspondant au formulaire que l'on veut mettre en oeuvre 
        $home = new Home();
        // Création du formulaire en tant qu'objet et mise en relation de l'objet de formulaire 
        // avec l'instance de l'entité
        $form = $this->createForm(HomeType::class, $home);
        // On hydrate (remplir) le formulaire avec des données se trouvant dans la requête 
        $form->handleRequest($request);
        // On vérifie si le formulaire est envoyé et s'il est valide (correctement rempli notamment sur le token sécurisé)
        if ($form->isSubmitted() && $form->isValid()) {
            // On demande à l'entité manager d'enregister puis d'injecter les données dans la BDD 
            $entityManager->persist($home);
            $entityManager->flush();
            // On redirige vers la liste 
            return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
        }
        // Si le formulaire n'est pas envoyé alors on l'affiche 
        return $this->render('admin_home/new.html.twig', [
            'home' => $home,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_home_show', methods: ['GET'])]
    public function show(Home $home): Response
    {
        return $this->render('admin_home/show.html.twig', [
            'home' => $home,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_home_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Home $home, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_home/edit.html.twig', [
            'home' => $home,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_home_delete', methods: ['POST'])]
    public function delete(Request $request, Home $home, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$home->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($home);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
    }
}
