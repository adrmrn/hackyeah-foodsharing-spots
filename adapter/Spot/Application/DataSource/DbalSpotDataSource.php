<?php
declare(strict_types=1);

namespace Adapter\Spot\Application\DataSource;


use Core\Spot\Application\DataSource\SpotDataSource;
use Core\Spot\Application\ReadModel\EquipmentReadModel;
use Core\Spot\Application\ReadModel\SpotReadModel;
use Doctrine\DBAL\Connection;

class DbalSpotDataSource implements SpotDataSource
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return SpotReadModel[]
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getAll(): array
    {
        $query = $this->connection->executeQuery("
            SELECT s.*
            FROM spots AS s
        ");
        $spotsRawData = $query->fetchAll();

        $query = $this->connection->executeQuery("
            SELECT e.*
            FROM equipments AS e
        ");
        $equipmentsRawData = $query->fetchAll();

        $spots = [];
        foreach ($spotsRawData as $spotRawData) {
            $spotEquipmentsRawData = $this->getSpotsEquipments($spotRawData['id'], $equipmentsRawData);
            $spots[] = $this->createReadModel($spotRawData, $spotEquipmentsRawData);
        }

        return $spots;
    }

    public function exists(string $spotId): bool
    {
        $query = $this->connection->prepare("
            SELECT s.*
            FROM spots AS s
            WHERE s.id = :spotId
        ");
        $query->bindValue(':spotId', $spotId);
        $query->execute();
        return false !== $query->fetch();
    }

    private function createReadModel(array $spotRawData, array $spotEquipmentsRawData): SpotReadModel
    {
        $spotEquipments = array_map(function (array $equipmentRawData) {
            return new EquipmentReadModel(
                $equipmentRawData['id'],
                $equipmentRawData['spot_id'],
                $equipmentRawData['type']
            );
        }, $spotEquipmentsRawData);

        return new SpotReadModel(
            $spotRawData['id'],
            $spotRawData['name'],
            $spotRawData['description'],
            (bool)$spotRawData['is_open_round_the_clock'],
            $spotRawData['localization_street'],
            $spotRawData['localization_city'],
            $spotRawData['localization_postal_code'],
            $spotRawData['localization_latitude'],
            $spotRawData['localization_longitude'],
            array_values($spotEquipments)
        );
    }

    private function getSpotsEquipments(string $spotId, array $allEquipments): array
    {
        return array_filter($allEquipments, function (array $equipmentRawData) use ($spotId) {
            return $equipmentRawData['spot_id'] === $spotId;
        });
    }
}