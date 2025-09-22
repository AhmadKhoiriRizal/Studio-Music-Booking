<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment;
use App\Models\Studio;
use Illuminate\Support\Str;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample equipment data untuk testing stock management
        $equipmentData = [
            [
                'name' => 'Camera Sony A7III',
                'description' => 'Professional mirrorless camera untuk video dan foto',
                'category' => 'Camera',
                'quantity' => 5,
                'allocated_quantity' => 0
            ],
            [
                'name' => 'Tripod Manfrotto',
                'description' => 'Professional tripod untuk stabilisasi camera',
                'category' => 'Support',
                'quantity' => 8,
                'allocated_quantity' => 0
            ],
            [
                'name' => 'LED Panel Light',
                'description' => 'Panel lighting untuk studio photography',
                'category' => 'Lighting',
                'quantity' => 12,
                'allocated_quantity' => 0
            ],
            [
                'name' => 'Wireless Microphone',
                'description' => 'Wireless mic system untuk recording audio',
                'category' => 'Audio',
                'quantity' => 6,
                'allocated_quantity' => 0
            ],
            [
                'name' => 'Softbox 60x90cm',
                'description' => 'Softbox modifier untuk soft lighting',
                'category' => 'Lighting',
                'quantity' => 10,
                'allocated_quantity' => 0
            ],
            [
                'name' => 'Backdrop Stand',
                'description' => 'Adjustable backdrop stand system',
                'category' => 'Support',
                'quantity' => 4,
                'allocated_quantity' => 0
            ],
            [
                'name' => 'Canon EF 50mm f/1.8',
                'description' => 'Prime lens untuk portrait photography',
                'category' => 'Lens',
                'quantity' => 3,
                'allocated_quantity' => 0
            ],
            [
                'name' => 'Green Screen Backdrop',
                'description' => 'Chroma key green screen untuk video production',
                'category' => 'Backdrop',
                'quantity' => 2,
                'allocated_quantity' => 0
            ]
        ];

        // Create equipment
        foreach ($equipmentData as $data) {
            Equipment::create([
                'id' => $this->generateUniqueId(),
                'name' => $data['name'],
                'description' => $data['description'],
                'category' => $data['category'],
                'quantity' => $data['quantity'],
                'allocated_quantity' => $data['allocated_quantity'],
                'foto' => null
            ]);
        }

        // Create sample studios jika belum ada
        $studioData = [
            [
                'name' => 'Studio A - Small',
                'type' => 'small',
                'description' => 'Studio kecil untuk portrait photography',
                'price_per_hour' => 100000,
                'status' => 'available'
            ],
            [
                'name' => 'Studio B - Medium',
                'type' => 'medium',
                'description' => 'Studio medium untuk commercial photography',
                'price_per_hour' => 200000,
                'status' => 'available'
            ],
            [
                'name' => 'Studio C - Large',
                'type' => 'large',
                'description' => 'Studio besar untuk video production',
                'price_per_hour' => 350000,
                'status' => 'available'
            ]
        ];

        foreach ($studioData as $data) {
            if (!Studio::where('name', $data['name'])->exists()) {
                Studio::create([
                    'id' => $this->generateUniqueId(),
                    'name' => $data['name'],
                    'type' => $data['type'],
                    'description' => $data['description'],
                    'foto' => null,
                    'price_per_hour' => $data['price_per_hour'],
                    'min_booking_hours' => 1,
                    'max_booking_hours' => 8,
                    'status' => $data['status']
                ]);
            }
        }

        // Sample allocation untuk testing stock management
        $this->allocateEquipmentToStudios();
    }

    /**
     * Allocate some equipment to studios untuk testing
     */
    private function allocateEquipmentToStudios()
    {
        $studios = Studio::all();
        $equipments = Equipment::all();

        if ($studios->count() > 0 && $equipments->count() > 0) {
            // Studio A mendapat basic equipment
            $studioA = $studios->where('type', 'small')->first();
            if ($studioA) {
                $camera = $equipments->where('name', 'Camera Sony A7III')->first();
                $tripod = $equipments->where('name', 'Tripod Manfrotto')->first();
                $light = $equipments->where('name', 'LED Panel Light')->first();

                if ($camera && $camera->hasAvailableStock(1)) {
                    $studioA->equipment()->attach($camera->id, ['quantity' => 1]);
                    $camera->allocateStock(1);
                }
                if ($tripod && $tripod->hasAvailableStock(2)) {
                    $studioA->equipment()->attach($tripod->id, ['quantity' => 2]);
                    $tripod->allocateStock(2);
                }
                if ($light && $light->hasAvailableStock(3)) {
                    $studioA->equipment()->attach($light->id, ['quantity' => 3]);
                    $light->allocateStock(3);
                }
            }

            // Studio B mendapat more advanced equipment
            $studioB = $studios->where('type', 'medium')->first();
            if ($studioB) {
                $camera = $equipments->where('name', 'Camera Sony A7III')->first();
                $mic = $equipments->where('name', 'Wireless Microphone')->first();
                $softbox = $equipments->where('name', 'Softbox 60x90cm')->first();
                $backdrop = $equipments->where('name', 'Backdrop Stand')->first();

                if ($camera && $camera->hasAvailableStock(2)) {
                    $studioB->equipment()->attach($camera->id, ['quantity' => 2]);
                    $camera->allocateStock(2);
                }
                if ($mic && $mic->hasAvailableStock(2)) {
                    $studioB->equipment()->attach($mic->id, ['quantity' => 2]);
                    $mic->allocateStock(2);
                }
                if ($softbox && $softbox->hasAvailableStock(4)) {
                    $studioB->equipment()->attach($softbox->id, ['quantity' => 4]);
                    $softbox->allocateStock(4);
                }
                if ($backdrop && $backdrop->hasAvailableStock(1)) {
                    $studioB->equipment()->attach($backdrop->id, ['quantity' => 1]);
                    $backdrop->allocateStock(1);
                }
            }
        }

        $this->command->info('Sample equipment allocated to studios for testing');
    }

    /**
     * Generate unique ID
     */
    private function generateUniqueId($length = 10)
    {
        do {
            $id = strtoupper(Str::random($length));
        } while (Equipment::where('id', $id)->exists() || Studio::where('id', $id)->exists());

        return $id;
    }
}
