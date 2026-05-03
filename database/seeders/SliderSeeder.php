<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'خصومات الصيف',
                'subtitle' => 'خصومات تصل إلى 40%',
                'link' => 'http://127.0.0.1:8000/shop',
                'image' => 'sliders/summer-sale.jpg',
                'is_active' => 1,
            ],
            [
                'title' => 'تخفيضات نهاية العام',
                'subtitle' => 'أفضل الأسعار لفترة محدودة',
                'link' => '/sale',
                'image' => 'sliders/year-end-sale.jpg',
                'is_active' => 1,
            ],
            [
                'title' => 'منتجات جديدة',
                'subtitle' => 'اكتشف أحدث المنتجات',
                'link' => '/products',
                'image' => 'sliders/new-products.jpg',
                'is_active' => 0,
            ],
            [
                'title' => 'مكسرات فاخرة',
                'subtitle' => 'أفضل أنواع المكسرات الطازجة',
                'link' => '/category/nuts',
                'image' => 'sliders/premium-nuts.jpg',
                'is_active' => 1,
            ],
            [
                'title' => 'فواكه مجففة طبيعية',
                'subtitle' => 'طعم رائع وفوائد صحية',
                'link' => '/category/dried-fruits',
                'image' => 'sliders/dried-fruits.jpg',
                'is_active' => 1,
            ],
        ];

        foreach ($sliders as $s) {
            $slider = Slider::updateOrCreate(
                ['title' => $s['title']],
                [
                    'subtitle' => $s['subtitle'],
                    'link' => $s['link'],
                    'is_active' => $s['is_active'],
                ]
            );

            $slider->images()->delete();

            $slider->images()->create([
                'path' => $s['image'],
                'is_main' => true,
            ]);
        }
    }
}
