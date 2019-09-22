<?php
declare(strict_types=1);

namespace App\Http\Controllers\Spot;


use App\Http\Controllers\Controller;
use Core\Common\Application\ReadModel;
use Illuminate\Http\JsonResponse;

class EquipmentController extends Controller
{
    /**
     * @var \Core\Spot\Application\Controller\EquipmentController
     */
    private $controller;

    public function __construct(\Core\Spot\Application\Controller\EquipmentController $controller)
    {
        $this->controller = $controller;
    }

    public function getEquipmentsForSpot(string $spotId): JsonResponse
    {
        $spots = $this->controller->getEquipmentsForSpot($spotId);
        return new JsonResponse(
            array_map(function (ReadModel $equipment) {
                return $equipment->toArray();
            }, $spots)
        );
    }
}