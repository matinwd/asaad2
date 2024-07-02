<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function submit(Form $form, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'g-recaptcha-response' => 'required|recaptchav3:fb,0.5'
            ], [
                'g-recaptcha-response.required' => 'شما ربات شناسایی شدید.',
                'g-recaptcha-response.recaptchav3' => 'لطفا مرورگر خود را رفرش کنید',
            ]);
            if ($validator->fails()) {
                alert()
                    ->error("اطلاعات ارسالی نامعتبر!!!");
                return back()->withErrors($validator->errors())->withInput();
            }

            $data = $this->setFiles($form, $request);
            $this->sortPC($data);
            $entity = $form->answers()->create([
                'ip' => $request->getClientIp(),
                'user_agent' => $request->userAgent(),
                'data' => $data,
            ]);

            alert()
                ->success("اطلاعات شما ثبت شد.");
            return back();
        } catch (\Exception $exception) {
            report($exception);
            alert()
                ->error("خطا در ثبت اطلاعات.لطفا مجددا تلاش کنید.");
            return back()->withInput();
        }
    }

    public function setFiles(Form $form, Request $request)
    {
        $names = array_filter(collect($form->content)->pluck('name')->toArray());
        $files = $this->handleUploadFiles($form, $request);
        $data = $request->only($names);
        foreach ($data ?? [] as $index => $item) {
            if (isset($files[$index]))
                $data[$index] = $files[$index];
        }
        return array_merge($data, $this->initPC($form, $request));
    }

    public function handleUploadFiles(Form $form, Request $request)
    {
        $data = collect($form->content)->where('fieldType', 'FileUploader')->toArray();
        $files = [];
        foreach ($data ?? [] as $index => $item) {
            if (!$request->hasFile($item['name']))
                continue;
            $input = $request->file($item['name']);
            $fileName = $input->getClientOriginalExtension();
            $fileName = uniqid('file-') . "." . $fileName;
            $input->storeAs("files/shares/form_builder_data/form-{$form->id}", $fileName, 'lfm');
            $files[$item['name']] = $fileName;
        }
        return $files;
    }

    public function initPC(Form $form, Request $request)
    {
        $data = collect($form->content)->where('fieldType', 'ProvinceCity')->toArray();
        $items = [];
        foreach ($data ?? [] as $index => $item) {
            $items[$item['name']] = $request->get($item['name']);
            if (!$item['has_city'] ?? false)
                continue;
            $inputName = 'city__' . $item['name'];
            $items[$inputName] = $request->get($inputName);
        }
        return $items;
    }

    public function sortPC(&$data)
    {
        $newData = [];
        foreach ($data ?? [] as $index => $item) {
            $newData[$index] = $item;
            if (Str::startsWith($index, 'Province')) {
                $newData['city__' . $index] = $data['city__' . $index];
                unset($data['city__' . $index]);
            }
        }
        $data = $newData;
    }

    public function getCities()
    {
        $provinceId = \request('province_id');
        abort_if(!is_numeric($provinceId) || $provinceId <= 0, 404);
        $cities = cache()->rememberForever('cities-list', function () {
            return json_decode(file_get_contents(database_path('cities.json')), true);
        });
        return collect($cities)->where('ostan', $provinceId)->toArray();
    }
}
