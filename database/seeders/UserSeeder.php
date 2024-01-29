<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Lorem::class;

        DB::table('users')->delete();
        DB::table('users')->insert(
            [
                'firstName' => 'Mohammed Ziyad',
                'lastName' => 'Hafri',
                'email' => 'falconbird39@gmail.com',
                'email_verified_at' => now(),
                'phone' => '0587549562',
                'password' => Hash::make('123456789'), // password
                'state' => 'el-oued',
                'bio' => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال "lorem ipsum" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. ',
                'gender' => 'male',
                'facebook' => 'facebook.com',
                'instagram' => 'instagram.com',
                'status' => 1,
                'address' => 'rue bell vue',
                'balance' => 10000000,
                'remember_token' => Str::random(10),
            ]
        );
//        User::factory()->count(5)->create();
    }
}
