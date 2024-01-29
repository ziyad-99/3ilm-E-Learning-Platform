<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition()
    {
        $massageEn = $this->faker->paragraph; // Generate English massage
        $massageFr = Lorem::paragraph(); // Generate French massage
        $massageAr = 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.'; // Arabic massage

        return [
            'message' => ['en' => $massageEn, 'ar' => $massageAr, 'fr' => $massageFr],
            'student_id' => User::inRandomOrder()->first()->id,
            'date' => $this->faker->date,
            'status' => $this->faker->randomElement(['Active', 'notActive']),
            'type' => $this->faker->randomElement(['massage_type1', 'massage_type2', 'massage_type3']),
        ];
    }
}
