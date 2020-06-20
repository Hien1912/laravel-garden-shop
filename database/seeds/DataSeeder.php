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
        User::insert([
            ['name' => "Admin", "email" => "admin@ad.min", "password" => bcrypt(12345678)],
            ['name' => "Admin1", "email" => "mmdev1912@gmail.com", "password" => bcrypt("Mk1234321")],
        ]);

        Category::insert([
            ['id' => 'bonsai', "name" => "Cây cảnh"],
            ['id' => 'pots', "name" => "Chậu cảnh"],
            ['id' => 'accessories', "name" => "Phụ kiện"]
        ]);

        Tag::insert([
            ['id' => "cay-canh-de-ban", 'name' => 'Cây cảnh để bàn', 'category_id' => "bonsai"],
            ['id' => 'cay-thuy-sinh', 'name' => 'Cây thủy sinh', 'category_id' => "bonsai"],
            ['id' => 'sen-da-xuong-rong', 'name' => 'Sen đá, xương rồng', 'category_id' => "bonsai"],
            ['id' => 'cay-chau-treo', 'name' => 'Cây chậu treo', 'category_id' => "bonsai"],
            ['id' => 'chau-dat-nung', 'name' => 'Chậu đất nung', 'category_id' => 'pots'],
            ['id' => 'chau-xi-mang', 'name' => 'Chậu xi măng', 'category_id' => 'pots'],
            ['id' => 'chau-composite', 'name' => 'Chậu composite', 'category_id' => 'pots'],
            ['id' => 'chau-men-su', 'name' => 'Chậu men sứ', 'category_id' => 'pots'],
            ['id' => 'chau-nhua-ABS', 'name' => 'Chậu nhựa ABS', 'category_id' => 'pots'],
            ['id' => 'dat-trong-phan-bon', 'name' => 'Đất trồng, phân bón', 'category_id' => "accessories"],
            ['id' => 'dung-cu-lam-vuon', 'name' => 'Dụng cụ làm vườn', 'category_id' => "accessories"],
            ['id' => 'dung-dich-thuy-sinh', 'name' => 'Dung dịch thủy sinh', 'category_id' => "accessories"],
            ['id' => 'vat-trang-tri', 'name' => 'Vật trang trí', 'category_id' => "accessories"]
        ]);

        $tag = Tag::all(['id']);
        factory(App\Product::class, 100)->create()->each(function ($product) use ($tag) {
            $tag = $tag[random_int(0, 12)];
            $product->tags()->attach($tag);
        });
    }
}
