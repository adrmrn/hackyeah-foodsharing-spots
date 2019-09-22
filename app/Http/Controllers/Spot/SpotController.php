<?php
declare(strict_types=1);

namespace App\Http\Controllers\Spot;


use App\Http\Controllers\Controller;
use Core\Common\Application\ReadModel;
use Illuminate\Http\JsonResponse;

class SpotController extends Controller
{
    /**
     * @var \Core\Spot\Application\Controller\SpotController
     */
    private $controller;

    public function __construct(\Core\Spot\Application\Controller\SpotController $controller)
    {
        $this->controller = $controller;
    }

    public function getSpots(): JsonResponse
    {
        $spots = $this->controller->getSpots();
        return new JsonResponse(
            array_map(function (ReadModel $spot) {
                return $spot->toArray();
            }, $spots)
        );
    }
}