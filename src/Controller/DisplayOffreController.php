<?php

namespace App\Controller;

use App\Repository\OffreStageRepository;
use App\Repository\OffreEmploiRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DisplayOffreController extends AbstractController
{

    #[Route('/offre_stage', name: 'app_all_offre_stage')]
    public function DisplayAllOffreStage(OffreStageRepository $OffreStageRepository): Response
    {
        // cherche data dans DB:
        $article=$OffreStageRepository->findAll();
        if(!$article){
            // dd("chi haja machi hiya hadik!");
            dd($article);
        }
        // dd($article);
        return $this->render('accueil/accueil.html.twig', [
            'articles' => $article,
            'path'=>"app_offre_stage",
        ]);
    }

    #[Route('/offre_emploi', name: 'app_all_offre_emploi')]
    public function DisplayAllOffreEmploi(OffreEmploiRepository $OffreEmploiRepository): Response
    {
        // cherche data dans DB:
        $article=$OffreEmploiRepository->findAll();
        if(!$article){
            // dd("chi haja machi hiya hadik!");
            dd($article);
        }

        return $this->render('accueil/accueil.html.twig', [
            'articles' => $article,
            'path'=>"app_offre_emploi",
        ]);
    }

    #[Route('/offre_stage/{id}', name: 'app_offre_stage')]
    public function DisplayOffreStage(int $id, OffreStageRepository $OffreStageRepository): Response
    {
        $article=[];
        // cherche data dans DB:
        $article["offre"]=$OffreStageRepository->find($id);
        if(!$article){
            // dd("chi haja machi hiya hadik!");
            dd($article);
        }

        return $this->forward('App\Controller\DisplayEntrepriseController::index', [
            'view' => "offre/offre_stage.html.twig",
            'article' => $article,
        ]);
    }

    #[Route('/offre_emploi/{id}', name: 'app_offre_emploi')]
    public function DisplayOffreEmploi(int $id, OffreEmploiRepository $OffreEmploiRepository): Response
    {
        // cherche data dans DB:
        $article=[];
        $article["offre"]=$OffreEmploiRepository->find($id);
        if(!$article){
            // dd("chi haja machi hiya hadik!");
            dd($article);
        }

        return $this->forward('App\Controller\DisplayEntrepriseController::index',[
            'view' => 'offre/offre_emploi.html.twig',
            'article'=> $article,
        ]);
    }



    
}
