<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'id'           => 1,
            'name'              => 'Hoa sinh nhật',
            'description' => 'Hiếm có món quà nào lại có thể phù hợp với nhiều đối tượng như những bó hoa sinh nhật. Bởi lẽ, hầu hết tất cả mọi người đều yêu thích hoa tươi. Đây cũng là giải pháp cứu cánh thường xuyên được áp dụng đối với trường hợp bạn không thể nghĩ ra món quà nào khác trong thời gian ngắn.'
        ]);

        DB::table('category')->insert([
            'id'           => 2,
            'name'              => 'Hoa khai trương',
            'description' => 'Hoa khai trương được sử dụng nhiều trong các dịp chúc mừng thành lập công ty, mở cửa hàng, quán xá, doanh nghiệp, nhà máy, tân gia, triển lãm, khánh thành, khởi công, động thổ, lễ cất nóc… Trong những dịp này, người ta thường lựa chọn những bó hoa, lẵng hoa, giỏ hoa tươi để gửi lời chúc tốt đẹp đến người nhận.'

        ]);

        DB::table('category')->insert([
            'id'           => 3,
            'name'              => 'Hoa chúc mừng',
            'description' => 'Hoa chúc mừng thường sẽ là sự kết hợp của nhiều loại hoa khác nhau. Mỗi loại hoa đều có một ý nghĩa riêng nhưng khi được nằm chung trong một tổng thể sẽ tạo nên một bó hoa tuyệt đẹp và mang đến niềm vui cho người nhận.'

        ]);

        DB::table('category')->insert([
            'id'           => 4,
            'name'              => 'Hoa chia buồn',
            'description' => 'Hoa tươi chia buồn mang ý nghĩa thể hiện được sự thương xót với những người đã khuất, bên cạnh đó người ta còn dùng hoa để chia sẻ nỗi buồn, và sự đau khổ vì mất mát người thân với những người còn sống và tiếp thêm động lực với họ để họ sống tiếp. '

        ]);

        DB::table('category')->insert([
            'id'           => 5,
            'name'              => 'Hoa chúc sức khoẻ',
            'description' => 'Gửi một bó hoa chúc mừng để chúc ai đó mau khỏe và chúc sức khỏe tốt là món quà tuyệt vời nhất mà bạn có thể dành tặng cho người thân trong gia đình, bạn bè hoặc đồng nghiệp bị ốm phải nằm nhà hoặc nhập viện. Những bó hoa là một món quà chu đáo mang lại cho họ niềm vui, niềm vui và giúp họ hồi phục nhanh hơn.'

        ]);
        DB::table('category')->insert([
            'id'           => 6,
            'name'              => 'Hoa tình yêu',
            'description' => 'Không chỉ góp phần làm đẹp cho cuộc sống, mỗi loài hoa còn mang trong nó những ý nghĩa sâu sắc giúp con người gửi đi những thông điệp trong tình yêu và cuộc sống.'

        ]);
        DB::table('category')->insert([
            'id'           => 7,
            'name'              => 'Hoa cảm ơn',
            'description' => 'Không gì tuyệt vời hơn khi bạn nói “cảm ơn” bằng bó hoa tươi thắm để thể hiện lòng biết ơn sâu sắc của bạn đến những người yêu thương. Hãy làm một ai đó cười hạnh phúc với những bình hoa trang trí hiện đại, hoa hồng cổ điển hoặc một điện hoa cảm ơn bất ngờ '

        ]);
        DB::table('category')->insert([
            'id'           => 8,
            'name'              => 'Hoa mừng tốt nghiệp',
            'description' => 'Khi chọn hoa chúc mừng nói chung và hoa tốt nghiệp nói riêng, chắc chắn chúng ta nên lựa chọn những bó hoa, giỏ hoa có màu sắc tươi sáng, vui vẻ, những gam màu làm cho cuộc sống chúng ta trở nên tích cực, tươi vui như màu vàng, màu cam, màu xanh, ngoài ra, màu đỏ còn là màu mang lại may mắn .'

        ]);
    }
}
