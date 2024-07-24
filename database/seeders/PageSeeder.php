<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::query()->create(['name_ar' => 'الرئيسية' , 'name_en' => 'home']);
        Page::query()->create(['name_ar' => 'عن الجمعية' , 'name_en' => 'about_us']);
        Page::query()->create(['name_ar' => 'خدماتنا' , 'name_en' => 'services']);
        Page::query()->create(['name_ar' => 'مبادراتنا' , 'name_en' => 'initiatives']);
        Page::query()->create(['name_ar' => 'انضم معنا' , 'name_en' => 'join_us']);
        Page::query()->create(['name_ar' => 'المركز الاعلامي' , 'name_en' => 'media_center']);
        Page::query()->create(['name_ar' => 'الحوكمة' , 'name_en' => 'governance']);
        ######### عن الجمعية
        Page::query()->create(['name_ar' => 'من نحن' , 'name_en' => 'who_us']);
        Page::query()->create(['name_ar' => 'آعضاء مجلس الادارة' , 'name_en' => 'board_members']);
        Page::query()->create(['name_ar' => 'آعضاء الجمعية العمومية' , 'name_en' => 'members_general_assembly']);
        Page::query()->create(['name_ar' => 'فريق عمل الجمعية' , 'name_en' => 'our_team']);
        Page::query()->create(['name_ar' => 'الهيكل التنظيمي' , 'name_en' => 'organizational_chart']);
        ######### انضم معنا
        Page::query()->create(['name_ar' => 'توظيف' , 'name_en' => 'employment']);
        Page::query()->create(['name_ar' => 'تطوع' , 'name_en' => 'volunteering']);
        Page::query()->create(['name_ar' => 'عضوية' , 'name_en' => 'membership']);
        ######### المركز الاعلامي
        Page::query()->create(['name_ar' => 'الأخبار' , 'name_en' => 'news']);
        Page::query()->create(['name_ar' => 'الفعاليات' , 'name_en' => 'events']);
        Page::query()->create(['name_ar' => 'الصور' , 'name_en' => 'images']);
        ######### الحوكمة
        Page::query()->create(['name_ar' => 'اللوائح والسياسات' , 'name_en' => 'regulations_policies']);
        Page::query()->create(['name_ar' => 'الخطط التشغيلية' , 'name_en' => 'operational_plans']);
        Page::query()->create(['name_ar' => 'تقارير الأنشطة' , 'name_en' => 'activity_reports']);
        Page::query()->create(['name_ar' => 'التقارير المالية' , 'name_en' => 'financial_reports']);
        Page::query()->create(['name_ar' => 'المحاضر العمومية' , 'name_en' => 'public_lecturer']);
        Page::query()->create(['name_ar' => 'الإفصاح والشفافية' , 'name_en' => 'disclosure_transparency']);
        Page::query()->create(['name_ar' => 'أخرى' , 'name_en' => 'others']);
        Page::query()->create(['name_ar' => 'الاستبيانات' , 'name_en' => 'questionnaires']);



        Page::query()->create(['name_ar' => 'تبرع معنا' , 'name_en' => 'donate_with_us']);

    }
}
