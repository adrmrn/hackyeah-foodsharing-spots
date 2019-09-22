<?php

use Illuminate\Database\Seeder;

class SpotsTableSeeder extends Seeder
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $connection;

    public function __construct(\Doctrine\DBAL\Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foodsharingSpotsAsJson = file_get_contents(storage_path('seeds') . '/foodsharing-spots.json');
        $foodsharingSpotsAsArray = \json_decode($foodsharingSpotsAsJson);

        foreach ((array)$foodsharingSpotsAsArray as $spot) {
            $spotUuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            $spot = (array)$spot;
            $localization = (array)$spot['localization'];
            $coordinates = (array)$localization['coordinates'];
            $isOpenRoundTheClock = $spot['isOpenRoundTheClock'] === true ? 'true' : 'false';
            $this->connection->executeQuery("
                INSERT INTO public.spots
                (id, name, description, localization_street, localization_city, localization_postal_code, localization_latitude, localization_longitude, is_open_round_the_clock)
                VALUES
                ('{$spotUuid}', '{$spot['name']}', '{$spot['description']}', '{$localization['street']}', '{$localization['city']}', '{$localization['postalCode']}', {$coordinates['latitude']}, {$coordinates['longitude']}, {$isOpenRoundTheClock});
            ");

            $equipments = (array)$spot['equipments'];
            foreach ($equipments as $equipment) {
                $equipment = (array)$equipment;
                $equipmentUuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
                $this->connection->executeQuery("
                    INSERT INTO public.equipments 
                    (id, spot_id, type) 
                    VALUES 
                    ('{$equipmentUuid}', '{$spotUuid}', '{$equipment['type']}');
                ");
            }
        }
    }
}
