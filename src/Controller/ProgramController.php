<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Entity\Season;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findAll();

        return $this->render('program/index.html.twig', [

            'programs' => $programs,

        ]);
    }


    #[Route('/show/{id<^[0-9]+$>}', name: 'show')]
    public function show(int $id, ProgramRepository $programRepository, SeasonRepository $seasonRepository): Response

    {

        $program = $programRepository->findOneBy(['id' => $id]);
        $season = $seasonRepository->findBy(['program' => $id], $orderBy = null, $limit = 5);
        // same as $program = $programRepository->find($id);


        if (!$program) {

            throw $this->createNotFoundException(

                'No program with id : ' . $id . ' found in program\'s table.'

            );
        }

        return $this->render('program/show.html.twig', [

            'program' => $program,
            'id' => $id,
            'season' => $season,

        ]);
    }
}
