<?php

namespace App\Controller;

use App\Repository\OffreStageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OffreStageController extends AbstractController
{
    #[Route('/offre_stage/{id}', name: 'app_offre_stage')]
    public function offreStagePage(int $id, OffreStageRepository $OffreStageRepository): Response
    {
        // cherche data dans DB:
        $article=$OffreStageRepository->find($id);
        if(!$article){
            // dd("chi haja machi hiya hadik!");
            dd($article);
        }

        return $this->render('offre_stage/index.html.twig', [
            'article' => $article,
        ]);
    }



    
}
