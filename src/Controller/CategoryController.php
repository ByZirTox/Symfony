<?php
// src/Controller/ProgramController.php
namespace App\Controller;


use App\Repository\ProgramRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [

            'categories' => $categories,

        ]);
    }


    #[Route('/show/{id}', name: 'show')]
    public function show(string $id, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response

    {

        $categories = $categoryRepository->findBy(['id' => $id] );
        $programs = $programRepository->findBy(['category' => $id], $orderBy = null, $limit = 3);
        // same as $program = $programRepository->find($id);


        if (!$categories) {

            throw $this->createNotFoundException(

                'No program with id : ' . $id . ' found in program\'s table.'

            );
        }

        return $this->render('category/show.html.twig', [

            'categories' => $categories,
            'id' => $id,
            'programs' => $programs,

        ]);
    }
}
