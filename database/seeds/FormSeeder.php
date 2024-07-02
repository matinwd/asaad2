<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\FormAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        FormAnswer::truncate();
        Form::truncate();

        if (config('app.is_demo') || config('app.is_first')) {
            $form = Form::create([
                'name' => 'تست',
                'slug' => 'test',
                'content' => [
                    [
                        'fieldType' => 'FileUploader',
                        'isUnique' => false,
                        'name' => 'file_1',
                        'label' => 'فایل یک',
                        'isRequired' => false,
                    ],
                    [
                        'fieldType' => 'FileUploader',
                        'isUnique' => false,
                        'name' => 'file_2',
                        'label' => 'فایل دو',
                        'isRequired' => false,
                    ],
                    [
                        'fieldType' => 'TextInput',
                        'isUnique' => false,
                        'name' => 'name',
                        'isPlaceholderVisible' => true,
                        'placeholder' => 'نام خود را وارد کنید',
                        'label' => 'نام',
                        'isRequired' => false,
                    ],
                    [
                        'fieldType' => 'LongTextInput',
                        'isUnique' => false,
                        'name' => 'address',
                        'isPlaceholderVisible' => true,
                        'placeholder' => 'نشانی محل سکونت خود را وارد کنید',
                        'label' => 'آدرس',
                        'isRequired' => false,
                    ],
                    [
                        'fieldType' => 'RadioButton',
                        'isUnique' => false,
                        'name' => 'gender',
                        'label' => 'جنسیت',
                        'isRequired' => false,
                        'options' =>
                            [
                                [
                                    'optionLabel' => 1,
                                    'optionValue' => 'مرد',
                                ],
                                [
                                    'optionLabel' => 2,
                                    'optionValue' => 'زن',
                                ],
                            ],
                    ],
                    [
                        'fieldType' => 'SelectList',
                        'isUnique' => false,
                        'name' => 'province',
                        'label' => 'استان',
                        'isRequired' => false,
                        'options' =>
                            [
                                [
                                    'optionLabel' => 1,
                                    'optionValue' => 'تهران',
                                ],
                                [
                                    'optionLabel' => 2,
                                    'optionValue' => 'اصفهان',
                                ],
                                [
                                    'optionLabel' => 3,
                                    'optionValue' => 'شیراز',
                                ],
                            ],
                    ],
                    [
                        'fieldType' => 'Checkbox',
                        'isUnique' => false,
                        'name' => 'cities',
                        'label' => 'شهر هایی منتخب را علامت بزنید',
                        'isRequired' => false,
                        'options' =>
                            [
                                [
                                    'optionLabel' => 1,
                                    'optionValue' => 'تهران',
                                ],
                                [
                                    'optionLabel' => 2,
                                    'optionValue' => 'قم',
                                ],
                                [
                                    'optionLabel' => 3,
                                    'optionValue' => 'اصفهان',
                                ],
                                [
                                    'optionLabel' => 4,
                                    'optionValue' => 'اهواز',
                                ],
                            ],
                    ],
                    [
                        'fieldType' => 'Button',
                        'isUnique' => true,
                        'name' => 'Button__1629576661508',
                        'buttonText' => 'ارسال',
                    ],
                ]
            ]);
        }

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
