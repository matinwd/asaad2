<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingTranslation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SettingSeeder extends Seeder
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
        SettingTranslation::truncate();
        Setting::truncate();

        // footer
        Setting::create([
            'key' => 'footer_about_compacy',
            'label' => 'درباره شرکت',
            'de' => [
                'value' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است '
            ],
            'en' => [
                'value' => 'Ductcen is a middle east shop and will provide all of your needs'
            ],
        ]);
        Setting::create([
            'key' => 'footer_about_compacy_url',
            'label' => 'لینک جزئیات بیشتر',
            'de' => [
                'value' => '/about-us'
            ],
            'en' => [
                'value' => '/about-us'
            ],
        ]);
        Setting::create([
            'key' => 'footer_office_address',
            'label' => 'نشانی دفتر مرکزی',
            'de' => [
                'value' => 'تهران / میدان هفت تیر- خیابان قائم مقام فراهانی – بالاتر از بیمارستان تهران کلینیک'
            ],
            'en' => [
                'value' => 'En تهران / میدان هفت تیر- خیابان قائم مقام فراهانی – بالاتر از بیمارستان تهران کلینیک En'
            ],
        ]);
        Setting::create([
            'key' => 'footer_phone',
            'label' => 'تلفن',
            'de' => [
                'value' => '021-8854-0094'
            ],
            'en' => [
                'value' => '021-8854-0094'
            ],
        ]);
        Setting::create([
            'key' => 'footer_email',
            'label' => 'پست الکترونیک',
            'de' => [
                'value' => 'mail@example.com'
            ],
            'en' => [
                'value' => 'mail@example.com',
            ],
        ]);
        Setting::create([
            'key' => 'footer_copyright',
            'label' => 'کپی رایت',
            'de' => [
                'value' => '© کلیه حقوق مادی و معنوی این وب سایت متعلق به هلدینگ توسعه معادن روی ایران می باشد'
            ],
            'en' => [
                'value' => '© کلیه حقوق مادی و معنوی این وب سایت متعلق به هلدینگ توسعه معادن روی ایران می باشدEN-EN'
            ],
        ]);


        // blog
        Setting::create([
            'key' => 'tags',
            'label' => 'برچسب های بخش اخبار',
            'de' => [
                'value' => 'برچسب_یک,برچسب_دو,برچسب_سه,برچسب_چهار,برچسب_پنج'
            ],
            'en' => [
                'value' => 'tag_a,tag_b,tag_e,tag_d,tag_e'
            ],
        ]);
        Setting::create([
            'key' => 'social_enable',
            'label' => 'وضعیت نمایش شبکه های مجازی',
            'de' => [
                'value' => 1
            ],
            'en' => [
                'value' => 1
            ],
        ]);
        Setting::create([
            'key' => 'social_facebook',
            'label' => 'لینک فیسبوک',
            'de' => [
                'value' => 'https://facebook.com/izmdc'
            ],
            'en' => [
                'value' => 'https://facebook.com/izmdc'
            ],
        ]);
        Setting::create([
            'key' => 'social_telegram',
            'label' => 'لینک تلگرام',
            'de' => [
                'value' => 'https://facebook.com/izmdc'
            ],
            'en' => [
                'value' => 'https://facebook.com/izmdc'
            ],
        ]);
        Setting::create([
            'key' => 'home_page_url',
            'label' => 'لینک فیلم معرفی صفحه خانه',
            'de' => [
                'value' => 'https://facebook.com/izmdc'
            ],
            'en' => [
                'value' => 'https://facebook.com/izmdc'
            ],
        ]);
        Setting::create([
            'key' => 'social_twitter',
            'label' => 'لینک توئییتر',
            'de' => [
                'value' => 'https://twitter.com/izmdc'
            ],
            'en' => [
                'value' => 'https://twitter.com/izmdc'
            ],
        ]);
        Setting::create([
            'key' => 'social_insta',
            'label' => 'لینک اینستاگرام',
            'de' => [
                'value' => 'https://instagram.com/izmdc'
            ],
            'en' => [
                'value' => 'https://instagram.com/izmdc'
            ],
        ]);
        Setting::create([
            'key' => 'social_linkdin',
            'label' => 'لینک لینکدین',
            'de' => [
                'value' => 'https://linkdin.com/izmdc'
            ],
            'en' => [
                'value' => 'https://linkdin.com/izmdc'
            ],
        ]);

        // picture
        Setting::create([
            'key' => 'page_header_pic',
            'label' => 'سربرگ صفحات',
            'de' => [
                'value' => "https://via.placeholder.com/1600x300"
            ],
            'en' => [
                'value' => "https://via.placeholder.com/1600x300"
            ],
        ]);
        Setting::create([
            'key' => 'logo_light',
            'label' => 'لوگو لایت',
            'de' => [
                'value' => "https://via.placeholder.com/400x120"
            ],
            'en' => [
                'value' => "https://via.placeholder.com/400x120"
            ],
        ]);
        Setting::create([
            'key' => 'logo_dark',
            'label' => 'لوگو دارک',
            'de' => [
                'value' => "https://via.placeholder.com/400x120"
            ],
            'en' => [
                'value' => "https://via.placeholder.com/400x120"
            ],
        ]);
        Setting::create([
            'key' => 'logo',
            'label' => 'لوگو مربع',
            'de' => [
                'value' => "https://via.placeholder.com/100x100"
            ],
            'en' => [
                'value' => "https://via.placeholder.com/100x100"
            ],
        ]);
        Setting::create([
            'key' => 'favicon',
            'label' => 'آیکون Fav',
            'de' => [
                'value' => "https://via.placeholder.com/30x30"
            ],
            'en' => [
                'value' => "https://via.placeholder.com/30x30"
            ],
        ]);

        // contact
        Setting::create([
            'key' => 'google_map',
            'label' => 'گوگل مپ',
            'de' => [
                'value' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12801.127715503037!2d48.5041391!3d36.6677219!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa50f03997c251de8!2z2YfZhNiv24zZhtqvINiq2YjYs9i52Ycg2YXYudin2K_ZhiDYsdmI24wg2KfbjNix2KfZhg!5e0!3m2!1sfa!2s!4v1607751712879!5m2!1sfa!2s'
            ],
            'en' => [
                'value' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12801.127715503037!2d48.5041391!3d36.6677219!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa50f03997c251de8!2z2YfZhNiv24zZhtqvINiq2YjYs9i52Ycg2YXYudin2K_ZhiDYsdmI24wg2KfbjNix2KfZhg!5e0!3m2!1sfa!2s!4v1607751712879!5m2!1sfa!2s'
            ],
        ]);
        // contact
        Setting::create([
            'key' => 'intro_movie',
            'label' => 'ویدیو معرفی',
            'de' => [
                'value' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12801.127715503037!2d48.5041391!3d36.6677219!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa50f03997c251de8!2z2YfZhNiv24zZhtqvINiq2YjYs9i52Ycg2YXYudin2K_ZhiDYsdmI24wg2KfbjNix2KfZhg!5e0!3m2!1sfa!2s!4v1607751712879!5m2!1sfa!2s'
            ],
            'en' => [
                'value' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12801.127715503037!2d48.5041391!3d36.6677219!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa50f03997c251de8!2z2YfZhNiv24zZhtqvINiq2YjYs9i52Ycg2YXYudin2K_ZhiDYsdmI24wg2KfbjNix2KfZhg!5e0!3m2!1sfa!2s!4v1607751712879!5m2!1sfa!2s'
            ],
        ]);
        Setting::create([
            'key' => 'intro_text',
            'label' => 'متن اینترو',
            'de' => [
                'value' => 'Welkom bij de Ductcen'
            ],
            'en' => [
                'value' => 'Welcome to the Ductcen'
            ],
        ]);
        Setting::create([
            'key' => 'intro_subtext',
            'label' => 'زیرمتن اینترو',
            'de' => [
                'value' => 'Hé, dit is ductcen.. je kunt alles vinden en kopen.. َِJe kunt hier alles vinden wat je wilt. We zijn hier om u te helpen het beste voor u te vinden'
            ],
            'en' => [
                'value' => 'Hey this is ductcen.. you can find every thing and buy.. َِYou can find anything you want here. We are here to help you find the best thing for you'
            ],
        ]);

        Setting::create([
            'key' => 'intro_button',
            'label' => 'دکمه اینترو',
            'de' => [
                'value' => 'Hoe handelen met...'
            ],
            'en' => [
                'value' => 'How trading with...'
            ],
        ]);
        Setting::create([
            'key' => 'intro_button_url',
            'label' => 'لینک دکمه اینترو',
            'value' => url('/')
        ]);

        Setting::create([
            'key' => 'contact_info',
            'label' => 'اطلاعات تماس با ما',
            'de' => [
                'value' => [
                    [
                        'icon' => 'flaticon-paper-plane',
                        'title' => 'آدرس دفتر تهران',
                        'type' => 'text',
                        'value' => 'میدان هفت تیر- خیابان قائم مقام فراهانی – بالاتر از بیمارستان تهران کلینیک – کوچه هشتم – شماره 13',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'تلفن امور سهام',
                        'type' => 'tel',
                        'value' => '021-88540094&021-88730772&021-88730774&021-88502326',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'فاکس دبیرخانه و امور سهام تهران',
                        'type' => 'tel',
                        'value' => '021-88540093',
                    ],
                    [
                        'icon' => 'flaticon-paper-plane',
                        'title' => 'آدرس دفتر زنجان',
                        'type' => 'text',
                        'value' => 'خیابان دکتر شریعتی ، نبش خیابان ششم شرقی اعتمادیه، پلاک 1',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'تلفن امور سهام زنجان',
                        'type' => 'tel',
                        'value' => '024-33421449&021-33421448',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'فاکس امور سهام زنجان',
                        'type' => 'text',
                        'value' => '021-33423000-3',
                    ],
                    [
                        'icon' => 'flaticon-message',
                        'title' => 'پست الکترونیک',
                        'type' => 'email',
                        'value' => 'info@izmdc.com',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'روابط عمومی و امور فرهنگی',
                        'type' => 'text',
                        'value' => '024-33423000-3 داخلی 110',
                    ],
                    [
                        'icon' => 'flaticon-message',
                        'title' => 'پست الکترونیک روابط عمومی',
                        'type' => 'email',
                        'value' => 'pr@izmdc.com',
                    ],
                    [
                        'icon' => 'flaticon-message',
                        'title' => 'پیامک',
                        'type' => 'text',
                        'value' => '3000485599',
                    ],
                ]
            ],
            'en' => [
                'value' => [
                    [
                        'icon' => 'flaticon-paper-plane',
                        'title' => 'آدرس دفتر تهران En',
                        'type' => 'text',
                        'value' => 'میدان هفت تیر- خیابان قائم مقام فراهانی – بالاتر از بیمارستان تهران کلینیک – کوچه هشتم – شماره 13',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'تلفن امور سهام En',
                        'type' => 'tel',
                        'value' => '021-88540094&021-88730772&021-88730774&021-88502326',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'فاکس دبیرخانه و امور سهام تهران En',
                        'type' => 'tel',
                        'value' => '021-88540093',
                    ],
                    [
                        'icon' => 'flaticon-paper-plane',
                        'title' => 'آدرس دفتر زنجان En',
                        'type' => 'text',
                        'value' => 'خیابان دکتر شریعتی ، نبش خیابان ششم شرقی اعتمادیه، پلاک 1',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'تلفن امور سهام زنجان En',
                        'type' => 'tel',
                        'value' => '024-33421449&021-33421448',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'فاکس امور سهام زنجان En',
                        'value' => '021-33423000-3',
                    ],
                    [
                        'icon' => 'flaticon-message',
                        'title' => 'پست الکترونیک En',
                        'type' => 'email',
                        'value' => 'info@izmdc.com',
                    ],
                    [
                        'icon' => 'flaticon-phone-call',
                        'title' => 'روابط عمومی و امور فرهنگی En',
                        'value' => '024-33423000-3 داخلی 110',
                    ],
                    [
                        'icon' => 'flaticon-message',
                        'title' => 'پست الکترونیک روابط عمومی En',
                        'type' => 'email',
                        'value' => 'pr@izmdc.com',
                    ],
                    [
                        'icon' => 'flaticon-message',
                        'title' => 'پیامک En',
                        'value' => '3000485599',
                    ],
                ]
            ],
        ]);

        Schema::enableForeignKeyConstraints();
        Model::reguard();
    }
}
