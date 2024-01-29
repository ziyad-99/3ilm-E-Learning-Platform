<?php

namespace Database\Factories;

use App\Models\Course\SupportingCourse;
use App\Models\Instructor;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SupportingCourseFactory extends Factory
{
    protected $model = SupportingCourse::class;

    public function definition()
    {
        $titleEn = $this->faker->sentence; // Generate English title
        $titleFr = Lorem::sentence(); // Generate French title
        $titleAr = 'عنوان الدرس باللغة العربية'; // Arabic title

        $descEn = $this->faker->paragraph; // Generate English desc
        $descFr = Lorem::paragraph(); // Generate French desc
        $descAr = 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. '; // Arabic title

        $levelEn = $this->faker->randomElement(['High School', 'Secondary School', 'Primary School']); // Generate English level
        $levelFr = $this->faker->randomElement(['école secondaire', 'école secondaire', 'école primaire']); // Generate French level
        $levelAr = $this->faker->randomElement(['إبتدائي', 'متوسط', 'ثانوي']); // Arabic level

        $branchEn = $this->faker->randomElement([
            'Experimental Science',
            'Mathematics Technician',
            'Mathematics',
            'Management and Economics',
            'Foreign Languages',
            'Literature and Philosophy']); // Generate English title
        $branchFr = $this->faker->randomElement([
            'Sciences Expérimentales',
            'Technicien en Mathématiques',
            'Mathématiques',
            'Gestion et Economie',
            'Langue étrangère',
            'Littérature et Philosophie']); // Generate French title
        $branchAr = $this->faker->randomElement([
            'علوم تجريبية',
            'تقني رياضي',
            'رياضيات',
            'تسيير و إقتصاد',
            'لغات أجنبية',
            'أداب و فلسفة']); // Arabic title

        return [
            'title' => ['en' => $titleEn, 'ar' => $titleAr, 'fr' => $titleFr],
            'description' => ['en' => $descEn, 'ar' => $descAr, 'fr' => $descFr],
            'instructor_id' => 1,
            'status' => $this->faker->randomElement([1, 0]),
            'price' => $this->faker->randomElement([6000, 1500, 800, 3000, 12000, 4000, 5000]),
            'level' => ['en' => $levelEn, 'ar' => $levelAr, 'fr' => $levelFr],
            'numberSessions' => $this->faker->randomElement([4, 7, 12, 20, 15]),
            'branch' => ['en' => $branchEn, 'ar' => $branchAr, 'fr' => $branchFr],
//            'frameTime' => $this->faker->randomElement([7, 154, 300, 30, 12, 4, 120]),
            'frameTime' => $this->faker->time(),
            'year' => '1as',
            'startDate' => $this->faker->date(),
            'slug' => Str::slug($titleEn),
        ];
    }
}
