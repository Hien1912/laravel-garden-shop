<?php

use App\Category;
use App\Tag;
use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@ad.min';
        $user->password = bcrypt('12345678');
        $user->save();

        $bonsai = new Category(['name'=>"Cây cảnh"]);
        $bonsai->save();
        $pot = new Category(['name'=> 'Chậu cảnh']);
        $pot->save();
        $accessories = new Category(['name'=> 'Phụ kiện']);
        $accessories->save();

        $bonsai->tags()->create(['name' => 'Cây cảnh để bàn']);
        $bonsai->tags()->create(['name' => 'Cây thủy sinh']);
        $bonsai->tags()->create(['name' => 'Sen đá, xương rồng']);
        $bonsai->tags()->create(['name' => 'Cây chậu treo']);

        $pot->tags()->create(['name' => 'Chậu đất nung']);
        $pot->tags()->create(['name' => 'Chậu xi măng']);
        $pot->tags()->create(['name' => 'Chậu composite']);
        $pot->tags()->create(['name' => 'Chậu men sứ']);
        $pot->tags()->create(['name' => 'Chậu nhựa ABS']);

        $accessories->tags()->create(['name' => 'Đất trồng, phân bón']);
        $accessories->tags()->create(['name' => 'Dụng cụ làm vườn']);
        $accessories->tags()->create(['name' => 'Dung dịch thủy sinh']);
        $accessories->tags()->create(['name' => 'Vật trang trí']);

        factory(App\Product::class, 100)->create()->each(function($product){
            $product->tags()->attach(Tag::find(random_int(1,13)));
        });
    }
}
