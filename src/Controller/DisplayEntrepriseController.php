<?php

namespace App\Controller;

use App\Repository\EntrepriseRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DisplayEntrepriseController extends AbstractController
{
    // #[Route('/display/entreprise', name: 'app_display_entreprise')]
    //why commment ? -> because to execute this you need to pass by another controller using forward() , check DisplayOffreController
    public function index(array $article, EntrepriseRepository $EntrepriseRepository,String $view): Response
    { 
        // $article["entreprise"]=[];
        $article["entreprise"]=$EntrepriseRepository->find(1);

        // dd($article);
        return $this->render($view, [
            'article' => $article,
        ]);
    }
}
