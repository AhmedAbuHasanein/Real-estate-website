<?php

namespace Database\Seeders;

use App\Models\Realestate_type;
use Illuminate\Database\Seeder;

class RealestateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['شقة سكنية', 'فلة', 'مستودع', 'منزل مع حديقة', 'منزل', 'أرض زراعية'];
        $emoji = ['asset/emoji_realestate_type/house.png', 'asset/emoji_realestate_type/villa.jpg', 'asset/emoji_realestate_type/مستودع.jpg', 'asset/emoji_realestate_type/house_with_garden.jpg','asset/emoji_realestate_type/house.jpg', 'asset/emoji_realestate_type/land.jpg'];
        $i = 0;
        foreach ($types as $type ){
             $realestate_type = new Realestate_type();
            $realestate_type->type = $type;
            $realestate_type->emoji = $emoji[$i++];
            $realestate_type->admin_id = 1 ;
            $realestate_type->save();
        }
    }
}
