<?php
declare(strict_types=1);

namespace Adapter\Spot\Application\DataSource;


use Core\Spot\Application\DataSource\EquipmentDataSource;
use Core\Spot\Application\ReadModel\EquipmentReadModel;
use Doctrine\DBAL\Connection;

class DbalEquipmentDataSource implements EquipmentDataSource
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
     * @param string $spotId
     * @return EquipmentReadModel[]
     */
    public function getAllForSpot(string $spotId): array
    {
        $query = $this->connection->prepare("
            SELECT e.*
            FROM equipments AS e
            WHERE e.spot_id = :spotId
        ");
        $query->bindValue(':spotId', $spotId);
        $query->execute();
        $equipments = [];
        foreach ($query->fetchAll() as $equipmentRawData) {
            $equipments[] = $this->createReadModel($equipmentRawData);
        }

        return $equipments;
    }

    private function createReadModel(array $equipmentRawData): EquipmentReadModel
    {
        return new EquipmentReadModel(
            $equipmentRawData['id'],
            $equipmentRawData['spot_id'],
            $equipmentRawData['type']
        );
    }
}