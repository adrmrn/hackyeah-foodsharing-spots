<?php
declare(strict_types=1);

namespace App\Http\Controllers\FoodPickup;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FoodPickupController extends Controller
{
    /**
     * @var \Core\FoodPickup\Application\Controller\FoodPickupController
     */
    private $controller;

    public function __construct(\Core\FoodPickup\Application\Controller\FoodPickupController $controller)
    {
        $this->controller = $controller;
    }

    public function createFoodPickup(Request $request): JsonResponse
    {
        $data = $request->only(['name', 'email', 'phone']);
        $foodPickup = $this->controller->create($data);

        return new JsonResponse($foodPickup->toArray());
    }
}