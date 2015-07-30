<?php

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->_createTermData();
    }

    private function _createTermData()
    {
        $categories = [
            // @formatter:off

            'uncategorized'             => 'Uncategorized',

            // Tin tức - hoạt động
            'hoat-dong'                 => [
                'name'   => 'Hoạt động',
                'subcat' => [
                    'cap-thanh' => 'Hoạt động cấp thành',
                    'cap-co-so' => 'Hoạt động cấp cơ sở',
                    'doan-the'  => 'Hoạt động cấp đoàn thể',
                ]
            ],

            // Phòng ban
            'phong'                     => [
                'name'   => 'Phòng',
                'subcat' => [
                    'nghiep-vu'  => [
                        'name'   => 'Phòng nghiệp vụ',
                        'subcat' => [
                            'khoa-tmnt'  => 'Khoa thẩm mỹ nghệ thuật',
                            'khoa-tdtt'  => 'Khoa thể dục thể thao',
                            'khoa-stkt'  => 'Khoa sáng tạo kỹ thuật',
                            'khoa-ppd'   => 'Khoa phương pháp đội',
                            'tc-su-kien' => 'Tổ chức sự kiện',
                        ],
                    ],
                    'hanh-chinh' => [
                        'name'   => 'Phòng hành chính',
                        'subcat' => [
                            'nhan-su'   => 'Nhân sự nhà thiếu nhi',
                            'thong-bao' => 'Thông báo',
                        ],
                    ],
                    'giao-vu'    => [
                        'name'   => 'Phòng giáo vụ & đào tạo',
                        'subcat' => [
                            'tuyen-dung'        => 'Tuyển dụng',
                            'ban-chuyen-de-247' => 'Ban chuyên đề 24/7',
                            'ghi-danh'          => 'Bộ phận ghi danh',
                            'thu-vien'          => 'Thư viện',
                        ],
                    ],
                ],
            ],

            // Hoạt động thanh thiếu nhi
            'hoat-dong-thanh-thieu-nhi' => [
                'name'   => 'Hoạt động thanh thiếu nhi',
                'subcat' => [
                    'ho-boi-1-6'  => 'Hồ bơi 1/6',
                    'san-bong'    => 'Sân bóng',
                    'san-patin'   => 'Sân patin',
                    'rap-phim-3d' => 'Rạp phim 3D',
                ],
            ],

            // Góc măng non
            'goc-mang-non'              => [
                'name'   => 'Góc măng non',
                'subcat' => [
                    'thu-vien'        => 'Thư viện nhà thiếu nhi',
                    'sieu-thi-ti-hon' => 'Siêu thị tí hon',
                    'goc-tam-ly'      => 'Góc tâm lý',
                ],
            ],

            // @formatter:on
        ];

        $this->_createTerms($categories);
    }

    private function _createTerms($arr, $parentSlug = '', $parent = 0)
    {
        if (is_array($arr)) {
            foreach ($arr as $slugName => $v) {
                $hasSubcat = is_array($v);
                $newName      = $hasSubcat ? $v['name'] : $v;
                $newSlug      = ($parent == 0 ? $slugName : $parentSlug . '/' . $slugName);

                $newTerm = NhaThieuNhi\Term::create([
                    'term_name' => $newName,
                    'term_slug' => $newSlug
                ]);

                $newTerm->taxonomy()
                        ->save(factory(NhaThieuNhi\TermTaxonomy::class)->make([
                            'parent' => $parent
                        ]));

                if ($hasSubcat) {
                    $this->_createTerms($v['subcat'], $newSlug, $newTerm->getAttribute('id'));
                }
            }
        }
    }
}
