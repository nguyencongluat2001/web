<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = [
            'id' => (string)\Str::uuid(),
            'name' => 'Danh mục câu hỏi thường gặp',
            'code_cate' => 'DM_FAQ',
            'decision' => '',
            'order' => \DB::table('cates')->count() + 1,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        \DB::table('cates')->insert($item);
        $params = [
            [
                'id' => (string)\Str::uuid(),
                'cate' => 'DM_FAQ',
                'name_category' => 'Về chúng tôi',
                'code_category' => 'VE_CHUNG_TOI',
                'decision' => '',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => (string)\Str::uuid(),
                'cate' => 'DM_FAQ',
                'name_category' => 'Bác sỹ',
                'code_category' => 'BAC_SY',
                'decision' => '',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        foreach($params as $param){
            $param['order'] = \DB::table('categorys')->count() + 1;
            \DB::table('categorys')->insert($param);
        }
    }
}
