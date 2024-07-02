<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Request;

class TemplateController extends Controller
{
    public function index(Template $template)
    {
        abort_unless($template->active, 404);
        if (!$template->hasTranslation(app()->getLocale()))
            return redirect()->route('home_template');
        SEOTools::setTitle($template->title);
        SEOTools::setDescription($template->short_description);
        SEOMeta::setKeywords($template->keywords);

        return view('front.template', compact('template'));
    }

    public function auth(Template $template)
    {
        // todo : init auth
        session()->put($template->slug, uniqid());
        return redirect()->route('template', $template);
    }

    public function optimize()
    {
        try {
            dump(\Artisan::call('cache:clear'));
            dump(\Artisan::call('view:clear'));
            dump(\Artisan::call('optimize'));
            dump(\Artisan::call('storage:link'));
        } catch (\Exception $exception) {
        }
    }

    public function home()
    {
        $template = Template::where('slug', 'home')->firstOrFail();
        abort_unless($template->active, 404);
        if (!$template->hasTranslation(app()->getLocale()))
            app()->setLocale(config('app.locale'));
        \SEO::setTitle($template->title);
        return view('front.template', compact('template'));
    }
}
