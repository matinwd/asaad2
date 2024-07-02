<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $pageConfigs = ['pageHeader' => false];
        $setting = Setting::all();
        return view('content.entity.setting',compact('pageConfigs'));
    }

    public function update(Request $request)
    {
        try {
            foreach ($request->get('set') as $index => $item) {
                if($index == 'contact_info'){
                    foreach ($item as $r => $row) {
                        $item[$r]['value'] = json_decode($row['value'],true);
                    }
                }
                if(Str::contains($index,['url','logo','favicon','pic','google_map','social_facebook','social_twitter','social_insta','social_linkdin'])){
                    foreach ($item as $i => $value) {
                        safeUrls($item[$i]['value']);
                    }
                }
                Setting::updateOrCreate([
                    'key' => $index
                ],$item);
                cache()->forget('app-setting');
            }
            alert()
                ->success("عملیات بروزرسانی انجام شد.");
            return back();
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("اطلاعات مورد نظر بروزرسانی نشد.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }
}
