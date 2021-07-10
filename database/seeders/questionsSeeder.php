<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\question;


class questionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question_records[] = [
            array(
                'category_id' => '1',
                'vocabulary_id' => '1',
                'question' => 'absolute',
                'a' => 'chắc chắn',
                'b' => 'không biết',
                'c' => 'xin chào',
                'd' => 'tạm biệt',
                'answer' => 'a',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'category_id' => '1',
                'vocabulary_id' => '2',
                'question' => 'access',
                'a' => 'liên kết',
                'b' => 'truy cập',
                'c' => 'quan hệ',
                'd' => 'tạm biệt',
                'answer' => 'b',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),
            array(
                'category_id' => '1',
                'vocabulary_id' => '3',
                'question' => 'account',
                'a' => 'tài khoản',
                'b' => 'người dùng',
                'c' => 'quan hệ',
                'd' => 'tạm biệt',
                'answer' => 'a',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '1',
                'vocabulary_id' => '4',
                'question' => 'accumulator',
                'a' => 'tài khoản',
                'b' => 'người dùng',
                'c' => 'pin, ắc quy',
                'd' => 'tạm biệt',
                'answer' => 'c',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '1',
                'vocabulary_id' => '5',
                'question' => 'acronym',
                'a' => 'tài khoản',
                'b' => 'người dùng',
                'c' => 'quan hệ',
                'd' => 'từ viết tắt',
                'answer' => 'd',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '2',
                'vocabulary_id' => '6',
                'question' => 'This book is a call to action.',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => 'Cuốn sách này là một lời kêu gọi hành động.',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '2',
                'vocabulary_id' => '7',
                'question' => "It's still active but it goes to voice mail.",
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => 'Nó vẫn hoạt động nhưng nó chuyển sang hộp thư thoại.',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '2',
                'vocabulary_id' => '9',
                'question' => "You couldn't add wood to the fire?",
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => 'Bạn không thể thêm củi vào lửa?',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '2',
                'vocabulary_id' => '10',
                'question' => 'My email address is in there, too.',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => 'Địa chỉ email của tôi cũng có trong đó.',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '2',
                'vocabulary_id' => '11',
                'question' => 'I gave you advance warning.',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => 'Tôi đã cảnh báo trước cho bạn.',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '3',
                'vocabulary_id' => '12',
                'question' => 'adware',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '3',
                'vocabulary_id' => '15',
                'question' => 'He was lean and agile.',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '3',
                'vocabulary_id' => '16',
                'question' => 'agnostic',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '3',
                'vocabulary_id' => '17',
                'question' => 'alert',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '3',
                'vocabulary_id' => '18',
                'question' => 'algorithm',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '4',
                'vocabulary_id' => '12',
                'question' => 'adware',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '4',
                'vocabulary_id' => '15',
                'question' => 'He was lean and agile.',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '4',
                'vocabulary_id' => '16',
                'question' => 'agnostic',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '4',
                'vocabulary_id' => '17',
                'question' => 'alert',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '4',
                'vocabulary_id' => '18',
                'question' => 'algorithm',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '5',
                'vocabulary_id' => '22',
                'question' => 'analog',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '5',
                'vocabulary_id' => '31',
                'question' => 'We keep a fully stocked free song archive.',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '5',
                'vocabulary_id' => '44',
                'question' => 'To agree the price for the internal audit 13',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '5',
                'vocabulary_id' => '48',
                'question' => 'availability',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

            array(
                'category_id' => '5',
                'vocabulary_id' => '49',
                'question' => 'avatar',
                'a' => '',
                'b' => '',
                'c' => '',
                'd' => '',
                'answer' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ),

        ];
        if (DB::table('questions')->count() == 0) {
            question::insert($question_records[0]);
        } else {
            echo "Table have data";
        }
    }
}