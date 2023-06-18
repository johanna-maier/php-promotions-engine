<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController
{
  #[Route('/products/{id}/lowest-price', name:'lowest-price', methods:'POST')]
  // We use the ID info and the request info from the route and pass it into our function.
  public function lowestPrice(Request $request, int $id): Response
  {
    // We check if other teams set a "force_fail" key (named by us) in the request header.
    if ($request->headers->has('force_fail')) {
      // If it's present we return a custom error message.
      return new JsonResponse(
        ['error' => 'Promotions engine failure message'],
        // The team then can set the value of the key, e.g. to the status code.
        // and then set it in the headers.
        $request->headers->get('force_fail')
      );
    }
    return new JsonResponse([
      'quantity' => 5,
      'request_location' => 'UK',
      'voucher_code' => '0U812',
      'request_date' => '2022-04-04',
      'product_id' => $id,
      'price' => 100,
      'discounted_price' => 50,
      'promotion_id' => 3,
      'promotion_name' => 'Black friday half price sale'

    ], 200);
  }

  // #[Route('/products/{id}/promotions', name: 'promotions', methods:'GET')]
  // public function promotions()
  // {
  // }
}
