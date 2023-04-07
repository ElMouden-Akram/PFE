<?php

namespace App\Controller;

use App\Entity\OffreStage;
use App\Repository\OffreStageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(OffreStageRepository $OffreStageRepository): Response
    {
        $articles = $OffreStageRepository->findAll();
        foreach($articles as $article){
            //this loop to add name to every article :
            $name=$article->getAjouterPar()->getFirstName();
            // 🔥🔥🔥🔥 bug here or something !
            // $article=$article->getAjouterPar()->setFirstName("bug");
        }
        // dd($articles);
        // dd($articles[0]->getAjouterPar());
        return $this->render('accueil/accueil.html.twig', [
            'articles' => $articles,
        ]);
    }
}
