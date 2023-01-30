<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'CodeLean',
                'email' => 'CodeLean@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 1,
                'description' => null,
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 1,
                'description' => null,
            ],
            [
                'id' => 3,
                'name' => 'Shane Lynch',
                'email' => 'ShaneLynch@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-0.png',
                'level' => 2,
                'description' => 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud amodo'
            ],
            [
                'id' => 4,
                'name' => 'Brandon Kelley',
                'email' => 'BrandonKelley@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-1.png',
                'level' => 2,
                'description' => null,
            ],
            [
                'id' => 5,
                'name' => 'Roy Banks',
                'email' => 'RoyBanks@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-2.png',
                'level' => 2,
                'description' => null,
            ],
        ]);
        DB::table('authors')->insert([
            [
                'name' =>'Nguyễn Nhật Ánh',
                'avatar' => 'nguyen-nhat-anh.png',
                'description'=>'Except sint occaecat cupidatat non proident, sunt culpa qui officia deserunt mollit.'
            ],
            [
                'name' =>'Trang Hạ',
                'avatar' => 'trang-ha.jpg',
                'description'=>'Except sint occaecat cupidatat non proident, sunt culpa qui officia deserunt mollit.'

            ],
            [
                'name' =>'Nguyễn Phong Việt',
                'avatar' => 'phong-viet.jpg',
                'description'=>'Except sint occaecat cupidatat non proident, sunt culpa qui officia deserunt mollit.'
            ],
            [
                'name' =>'Anh Khang',
                'avatar' => 'anh-khang.jpg',
                'description'=>'Except sint occaecat cupidatat non proident, sunt culpa qui officia deserunt mollit.'
            ],
            [
                'name' =>'Nguyễn Ngọc Thạch',
                'avatar' => 'default-avatar.png',
                'description'=>''
            ],
            [
                'name' =>'Hamlet Trương',
                'avatar' => 'default-avatar.png',
                'description'=>''
            ],
            [
                'name' =>'Iris Cao',
                'avatar' => 'default-avatar.png',
                'description'=>''
            ],
            [
                'name'=>'Sơn Paris',
                'avatar' => 'default-avatar.png',
                'description'=>''
            ],
            [
                'name'=>'Dương Thụy',
                'avatar' => 'default-avatar.png',
                'description'=>''
            ],
            [
                'name'=>'Rosie Nguyễn',
                'avatar' => 'default-avatar.png',
                'description'=>''
            ]
        ]);
        DB::table('product_categories')->insert([
            [
                'id'=>1,
                'name'=>'Cookery' //Nấu ăn
            ],
            [
                'id'=>2,
                'name'=>'Annals' //Sách về lịch sử
            ],
            [
                'id'=>3,
                'name'=>'Skill'//Kĩ năng sống
            ],
            [
                'id'=>4,
                'name'=>'Literary'//Văn học
            ],
            [
                'id'=>5,
                'name'=>'Language' //Ngoại ngữ
            ],
            [
                'id'=>6,
                'name'=>'Technology'//Công nghệ
            ],[
                'id'=>7,
                'name'=>'Marketing'
            ],
            [
                'id'=>8,
                'name'=>'Reference' //Sách tham khỏa
            ],
            [
                'id'=>9,
                'name'=>'Comic' //Truyện tranh
            ],
            [
                'id'=>10,
                'name'=>'Health' //Sức khỏe
            ],
            [
                'id'=>11,
                'name'=>'Culture' //Văn hóa tôn giáo
            ],
            [
                'id'=>12,
                'name'=>'Textbook' //Sách giảo khoa
            ],[
                'id'=>13,
                'name'=>'Detective' //Trinh thám
            ],
            [
                'id'=>14,
                'name'=>'Love' //Tình yêu
            ],[
                'id'=>15,
                'name'=>'Jokes'//Truyện cười
            ],
            [
                'id'=>16,
                'name'=>'Philosophy' //Triết học
            ]


        ]);

        DB::table('products')->insert([
            [
                'name'=>'Ngữ Pháp Tiếng Hàn Cơ Bản',
                'author_id'=>1,
                'nxb'=>'NXB Đại Học Sư Phạm',
                'product_category_id'=>5,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>3,
                'discount'=>1,
                'featured'=>1,
            ],
            [
                'name'=>'Từ Điển Lào – Việt',
                'author_id'=>1,
                'nxb'=>'NXB Tổng Hợp TP.HCM',
                'product_category_id'=>5,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>4,
                'discount'=>1,
                'featured'=>1,
            ],
            [
                'name'=>'Tự Học Tiếng Anh Hiệu Quả',
                'author_id'=>1,
                'nxb'=>'NXB Thanh Niên',
                'product_category_id'=>5,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>2.5,
                'discount'=>1,
                'featured'=>1,
            ],
            [
                'name'=>'3000 Từ Vựng Tiếng Anh Thông Dụng Nhất',
                'author_id'=>1,
                'nxb'=>'NXB Thanh Niên',
                'product_category_id'=>5,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>3,
                'discount'=>1,
                'featured'=>1,
            ],
            [
                'name'=>'360 Động Từ Bất Quy Tắc Đầy Đủ',
                'author_id'=>1,
                'nxb'=>'NXB Thời Đại',
                'product_category_id'=>5,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>2,
                'discount'=>1,
                'featured'=>1,
            ],
            [
                'name'=>'Giải Bài Tập Đại Số 10',
                'author_id'=>1,
                'nxb'=>'NXB Đại Học Quốc Gia Hà Nội',
                'product_category_id'=>8,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>4.2,
                'discount'=>1,
                'featured'=>1,
            ],
            [
                'name'=>'Giải Bài Tập Hình Học 10 (Nâng Cao)',
                'author_id'=>1,
                'nxb'=>'NXB Đại Học Quốc Gia Hà Nội',
                'product_category_id'=>8,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>3.9,
                'discount'=>1,
                'featured'=>1,
            ],
            [
                'name'=>'Giải Bài Tập Vật Lý 10 (Cơ Bản)',
                'author_id'=>1,
                'nxb'=>'NXB Đại Học Quốc Gia Hà Nội',
                'product_category_id'=>8,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>3.9,
                'discount'=>1,
                'featured'=>1,
            ],
            [
                'name'=>'Giải Bài Tập Vật Lý 10 (Nâng Cao)',
                'author_id'=>1,
                'nxb'=>'NXB Đại Học Quốc Gia Hà Nội',
                'product_category_id'=>8,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>2.9,
                'discount'=>1,
                'featured'=>1,
            ],
            [
                'name'=>'Những Bài Làm Văn Tiêu Biểu 10',
                'author_id'=>1,
                'nxb'=>'NXB Đại Học Quốc Gia Hà Nội',
                'product_category_id'=>8,
                'description'=>'',
                'content'=>'',
                'type'=>1,//1 là bìa cứng
                'weight'=>27,
                'height'=>45,
                'width'=>20,
                'pages'=>200,
                'pub_year'=>'2021',
                'qty'=>20,
                'price'=>2.5,
                'discount'=>1,
                'featured'=>1,
            ]

        ]);
        DB::table('product_images')->insert([
            [
            'product_id'=>1,
            'path'=>'npthcb_0.png'
            ],
            [
                'product_id'=>1,
                'path'=>'npthcb_1.png'
            ],
            [
                'product_id'=>1,
                'path'=>'npthcb_2.png'
            ],
            [
            'product_id'=>1,
            'path'=>'npthcb_3.png'
            ],
            [
                'product_id'=>1,
                'path'=>'npthcb_4.png'
            ],
            [
                'product_id'=>1,
                'path'=>'npthcb_5.png'
            ],

            [
                'product_id'=>2,
                'path'=>'tdlv_0.png'
            ],
            [
                'product_id'=>2,
                'path'=>'tdlv_1.png'
            ],
            [
                'product_id'=>2,
                'path'=>'tdlv_2.png'
            ],
            [
                'product_id'=>2,
                'path'=>'tdlv_3.png'
            ],
            [
                'product_id'=>2,
                'path'=>'tdlv_4.png'
            ],
            [
                'product_id'=>2,
                'path'=>'tdlv_5.png'
            ],

            [
                'product_id'=>3,
                'path'=>'thtahq_0.png'
            ],
            [
                'product_id'=>3,
                'path'=>'thtahq_1.png'
            ],
            [
                'product_id'=>3,
                'path'=>'thtahq_2.png'
            ],
            [
                'product_id'=>3,
                'path'=>'thtahq_3.png'
            ],
            [
                'product_id'=>3,
                'path'=>'thtahq_4.png'
            ],
            [
                'product_id'=>3,
                'path'=>'thtahq_5.png'
            ],

            [
                'product_id'=>4,
                'path'=>'3000-tu-vung-tieng-anh-thong-dung-nhat_0.png'
            ],
            [
                'product_id'=>4,
                'path'=>'3000-tu-vung-tieng-anh-thong-dung-nhat_1.png'
            ],
            [
                'product_id'=>4,
                'path'=>'3000-tu-vung-tieng-anh-thong-dung-nhat_2.png'
            ],
            [
                'product_id'=>4,
                'path'=>'3000-tu-vung-tieng-anh-thong-dung-nhat_3.png'
            ],
            [
                'product_id'=>4,
                'path'=>'3000-tu-vung-tieng-anh-thong-dung-nhat_4.png'
            ],
            [
                'product_id'=>4,
                'path'=>'3000-tu-vung-tieng-anh-thong-dung-nhat_5.png'
            ],

            [
                'product_id'=>5,
                'path'=>'360-dong-tu-bat-quy-tac-day-du_0.png'
            ],
            [
                'product_id'=>5,
                'path'=>'360-dong-tu-bat-quy-tac-day-du_1.png'
            ],
            [
                'product_id'=>5,
                'path'=>'360-dong-tu-bat-quy-tac-day-du_2.png'
            ],
            [
                'product_id'=>5,
                'path'=>'360-dong-tu-bat-quy-tac-day-du_3.png'
            ],
            [
                'product_id'=>5,
                'path'=>'360-dong-tu-bat-quy-tac-day-du_4.png'
            ],
            [
                'product_id'=>5,
                'path'=>'360-dong-tu-bat-quy-tac-day-du_5.png'
            ],
            [
                'product_id'=>6,
                'path'=>'ds10_0.png'
            ],
            [
                'product_id'=>6,
                'path'=>'ds10_1.png'
            ],
            [
                'product_id'=>6,
                'path'=>'ds10_2.png'
            ],
            [
                'product_id'=>6,
                'path'=>'ds10_3.png'
            ],
            [
                'product_id'=>6,
                'path'=>'ds10_4.png'
            ],
            [
                'product_id'=>6,
                'path'=>'ds10_5.png'
            ]

            ,
            [
                'product_id'=>7,
                'path'=>'gbthh_0.png'
            ],
            [
                'product_id'=>7,
                'path'=>'ds10_1.png'
            ],
            [
                'product_id'=>7,
                'path'=>'ds10_2.png'
            ],
            [
                'product_id'=>7,
                'path'=>'ds10_3.png'
            ],
            [
                'product_id'=>7,
                'path'=>'ds10_4.png'
            ],
            [
                'product_id'=>7,
                'path'=>'ds10_5.png'
            ]

            ,
            [
                'product_id'=>8,
                'path'=>'gbtvl_0.png'
            ],
            [
                'product_id'=>8,
                'path'=>'ds10_1.png'
            ],
            [
                'product_id'=>8,
                'path'=>'ds10_2.png'
            ],
            [
                'product_id'=>8,
                'path'=>'ds10_3.png'
            ],
            [
                'product_id'=>8,
                'path'=>'ds10_4.png'
            ],
            [
                'product_id'=>8,
                'path'=>'ds10_5.png'
            ]

            ,
            [
                'product_id'=>9,
                'path'=>'gbtvl_0.png'
            ],
            [
                'product_id'=>9,
                'path'=>'ds10_1.png'
            ],
            [
                'product_id'=>9,
                'path'=>'ds10_2.png'
            ],
            [
                'product_id'=>9,
                'path'=>'ds10_3.png'
            ],
            [
                'product_id'=>9,
                'path'=>'ds10_4.png'
            ],
            [
                'product_id'=>9,
                'path'=>'ds10_5.png'
            ]

            ,
            [
                'product_id'=>10,
                'path'=>'htng_0.png'
            ],
            [
                'product_id'=>10,
                'path'=>'ds10_1.png'
            ],
            [
                'product_id'=>10,
                'path'=>'ds10_2.png'
            ],
            [
                'product_id'=>10,
                'path'=>'ds10_3.png'
            ],
            [
                'product_id'=>10,
                'path'=>'ds10_4.png'
            ],
            [
                'product_id'=>10,
                'path'=>'ds10_5.png'
            ]


        ]);
    }
}
