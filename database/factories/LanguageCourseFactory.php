<?php

namespace Database\Factories;

use App\Models\Course\LanguageCourse;
use App\Models\Instructor;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LanguageCourseFactory extends Factory
{
    protected $model = LanguageCourse::class;

    public function definition()
    {
        $titleEn = $this->faker->sentence; // Generate English title
        $titleFr = Lorem::sentence(); // Generate French title
        $titleAr = 'عنوان الدرس باللغة العربية'; // Arabic title

        $descEn = $this->faker->paragraph; // Generate English desc
        $descFr = Lorem::paragraph(); // Generate French desc
        $descAr = 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. '; // Arabic title

        $levelEn = $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']); // Generate English level
        $levelFr = $this->faker->randomElement(['débutant', 'intermédiaire', 'avancé']); // Generate French level
        $levelAr = $this->faker->randomElement(['مبتدئ', 'متوسط', 'محترف']); // Arabic level

        return [
            'title' => ['en' => $titleEn, 'ar' => $titleAr, 'fr' => $titleFr],
            'description' => ['en' => $descEn, 'ar' => $descAr, 'fr' => $descFr],
            'instructor_id' => Instructor::first()->id,
            'status' => $this->faker->randomElement([0, 1]),
            'price' => $this->faker->randomElement([6000, 1500, 800, 3000, 12000, 4000, 5000]),
            'level' => ['en' => $levelEn, 'ar' => $levelAr, 'fr' => $levelFr],
            'numberSessions' => $this->faker->randomElement([4, 7, 12, 20, 15]),
            'startDate' => $this->faker->date(),
            'frameTime' => $this->faker->time(),
            'slug' => Str::slug($titleEn),
        ];
    }
}
