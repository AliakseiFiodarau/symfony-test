<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PriceModifier;
use App\Form\PriceType;

class PriceController extends AbstractController
{
    /**
     * Rendering page with price form.
     * Also rendering page displaying modified price.
     *
     * @param Request $request
     * @param PriceModifier $priceModifier
     * @return Response
     */
    #[Route(
        '/price',
        name: 'app_price',
        methods: ['GET', 'POST']
    )]
    public function index(Request $request, PriceModifier $priceModifier): Response
    {
        $form = $this->createForm(PriceType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $price = $form->getData()->getPrice();
            $taxNumber = $form->getData()->getTaxNumber();
            $newPrice = $priceModifier->modifyPrice($price, $taxNumber);

            return $this->render('price/update.html.twig', [
                'price' => $newPrice
            ]);
        }

        return $this->render('price/index.html.twig', [
            'form' => $form
        ]);
    }
}
