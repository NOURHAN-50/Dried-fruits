<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

     Slider::updateOrCreate([
            'title' => 'خصومات الصيف',
            'subtitle' => 'خصومات تصل إلى 40%',
            'link' => 'http://127.0.0.1:8000/shop',
            'is_active' => 1
        ]);

        Slider::updateOrCreate([
            'title' => 'تخفيضات نهاية العام',
            'subtitle' => 'أفضل الأسعار لفترة محدودة',
            'link' => '/sale',
            'is_active' => 1
        ]);

        Slider::updateOrCreate([
            'title' => 'منتجات جديدة',
            'subtitle' => 'اكتشف أحدث المنتجات',
            'link' => '/products',
            'is_active' => 0
        ]);//
    }
}
