<?php

namespace App\Helpers;

use Hidehalo\Nanoid\Client;

class Helper
{
    /**
     * Generate NanoID dengan custom alphabet (huruf + angka)
     */
    public static function generateNanoId($size = 10)
    {
        $client = new Client();

        // Custom alphabet: huruf besar, huruf kecil, dan angka
        $alphabet = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        return $client->formattedId($alphabet, $size);
    }

    /**
     * Generate unique user ID dengan NanoID
     */
    public static function generateUniqueUserId($model, $size = 10)
    {
        $maxAttempts = 10; // Batasan percobaan untuk menghindari infinite loop
        $attempts = 0;

        do {
            $id = self::generateNanoId($size);
            $attempts++;

            // Safety check untuk menghindari infinite loop
            if ($attempts > $maxAttempts) {
                throw new \Exception('Gagal generate ID unik setelah ' . $maxAttempts . ' percobaan');
            }

        } while ($model::where('id', $id)->exists());

        return $id;
    }

    /**
     * Generate NanoID untuk multiple records (lebih efisien)
     */
    public static function generateBatchNanoIds($model, $count = 1, $size = 10)
    {
        $ids = [];
        $existingIds = $model::pluck('id')->toArray();

        for ($i = 0; $i < $count; $i++) {
            $attempts = 0;
            do {
                $newId = self::generateNanoId($size);
                $attempts++;

                if ($attempts > 20) {
                    throw new \Exception('Gagal generate ID unik');
                }

            } while (in_array($newId, $ids) || in_array($newId, $existingIds));

            $ids[] = $newId;
        }

        return $ids;
    }
}
