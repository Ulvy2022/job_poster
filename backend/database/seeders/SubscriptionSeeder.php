<?php

namespace Database\Seeders;

use App\Models\Subscribsion;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        $allPlane =
            [
                [
                    "price" => 0,
                    "features" => [
                        "f1" => "Post 1 job for 15 days",
                        "f2" => "Post 3 jobs for 15 days",
                        "f3" => "Post 10 jobs for 15 days",
                        "f4" => "Unlimited post for 30 days"
                    ],
                    "plane_type" => "Trailer",
                    "description" => "Best option for urgent hiring employees",
                ],
                [
                    "price" => 50,
                    "features" => [
                        "f1" => "Post 1 job for 15 days",
                        "f2" => "Post 3 jobs for 15 days",
                        "f3" => "Post 10 jobs for 15 days",
                        "f4" => "Unlimited post for 30 days"
                    ],
                    "plane_type" => "Silver",
                    "description" => "Best option for urgent hiring employees",
                ],
                [
                    "price" => 100,
                    "features" => [
                        "f1" => "Post 1 job for 15 days",
                        "f2" => "Post 3 jobs for 15 days",
                        "f3" => "Post 10 jobs for 15 days",
                        "f4" => "Unlimited post for 30 days"
                    ],
                    "plane_type" => "Gold",
                    "description" => "Best option for urgent hiring employees",
                ],
                [
                    "price" => 200,
                    "features" => [
                        "f1" => "Post 1 job for 15 days",
                        "f2" => "Post 3 jobs for 15 days",
                        "f3" => "Post 10 jobs for 15 days",
                        "f4" => "Unlimited post for 30 days"
                    ],
                    "plane_type" => "Diamond",
                    "description" => "Best option for urgent hiring employees",
                ]
            ];

        foreach ($allPlane as $i => $i_value) {
                $state = new Subscribsion();
                $state->price = $i_value['price'];
                $state->plane_type = $i_value['plane_type'];
                $state->description = $i_value['description'];
                $state->features = $i_value['features'];
                $state->save();
        }

    }
}
