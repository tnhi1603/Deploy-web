<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'name' => 'Đồng hồ cơ',
            'description' => 'Đồng hồ được lắp ráp từ các chi tiết thuần cơ khí, năng lượng hoạt động hoàn toàn tồn tại dưới dạng cơ năng.',
        ]);

        Category::create([
            'name' => 'Đồng hồ điện tử',
            'description' => 'Đồng hồ chạy bằng pin'
        ]);

        Category::create([
            'name' => 'Đồng hồ Chronograph',
            'description' => 'Đồng hồ Chronograph có cấu tạo là sự kết hợp của một hệ thống bánh răng và kim với bộ máy đồng hồ. Chức năng bấm giờ hay Chronograph sẽ được kích hoạt thông qua cơ chế cò lẫy. Các mẫu đồng hồ Chronograph thường có 3 núm ở cạnh bên phục vụ cho các chức năng chỉnh giờ, ngày và bấm giờ.',
        ]);
    }
}
