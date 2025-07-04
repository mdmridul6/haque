<?php

namespace Database\Factories;

use App\Models\WorkProcess;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkProcess>
 */
class WorkProcessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = WorkProcess::class;
    public function definition()
    {
        return [
            'button_title' => 'Button Title',
            'process_title' => 'Engineered and Optimization by conveying. Him plate you allow built grave.',
            'process_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, at.',
            'image' => 'frontend/assets/img/800x800.png',
            'type_1_title' => 'Amazingly Simple Use',
            'type_1_sub_title' => 'Certainty arranging am smallness by conveying',
            'type_2_title' => 'Clear Documentation',
            'type_2_sub_title' => 'Frankness pronounce daughters remainder extensive',
            'type_3_title' => 'Flexible user interface',
            'type_3_sub_title' => 'Outward general passage another as it. Very his are come man walk one next. Delighted prevailed supported',
        ];
    }
}
