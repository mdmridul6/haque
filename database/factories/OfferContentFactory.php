<?php

namespace Database\Factories;

use App\Models\OfferContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfferContent>
 */
class OfferContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OfferContent::class;
    protected static $services = [
        [
            'order_number' => '1',
            'title' => 'Project creation',
            'sub_title' => 'Downs those still witty an balls so chief so. Moment an little remain no lively',
            'icon' => 'bi bi-bar-chart-line',
        ],
        [
            'order_number' => '2',
            'title' => 'Software Development',
            'sub_title' => 'Downs those still witty an balls so chief so. Moment an little remain no lively',
            'icon' => 'bi bi-code-slash',
        ],
        [
            'order_number' => '3',
            'title' => 'Porject Management',
            'sub_title' => 'Downs those still witty an balls so chief so. Moment an little remain no lively',
            'icon' => 'bi bi-regex',
        ],
        [
            'order_number' => '4',
            'title' => 'Project Implement',
            'sub_title' => 'Downs those still witty an balls so chief so. Moment an little remain no lively',
            'icon' => 'bi bi-speedometer2',
        ],
        [
            'order_number' => '5',
            'title' => 'Software Update',
            'sub_title' => 'Downs those still witty an balls so chief so. Moment an little remain no lively',
            'icon' => 'bi bi-arrow-repeat',
        ],
        [
            'order_number' => '6',
            'title' => '24/7 Support',
            'sub_title' => 'Downs those still witty an balls so chief so. Moment an little remain no lively',
            'icon' => 'bi bi-chat-quote',
        ],
    ];
    public function definition(): array
    {
        static $index = 0;
        $data = self::$services[$index];
        $index++;
        return $data;
    }
}
