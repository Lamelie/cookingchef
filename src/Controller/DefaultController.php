<?php

namespace App\Controller;

use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $em = $this->getDoctrine();

        /** @var Recipe[] $recipes */
        $recipes = $em->getRepository(Recipe::class)->findAll();

        return $this->render("default/index.html.twig", [
            "recipes" => $recipes
        ]);
    }
}
