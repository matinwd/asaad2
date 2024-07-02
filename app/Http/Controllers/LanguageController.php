<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Request;

class LanguageController extends Controller
{
    public function swap(Request $request, $lang)
    {
        // Store the URL on which the user was
        $previous_url = url()->previous();

        // Transform it into a correct request instance
        $previous_request = app('request')->create($previous_url);

        // Get Query Parameters if applicable
        $query = $previous_request->query();

        // Store the segments of the last request as an array
        $segments = $previous_request->segments();

        // Check if the first segment matches a language code
        if (in_array($lang, config('translatable.locales'))) {

            // Replace the first segment by the new language code
            $segments[0] = $lang;

            // Redirect to the required URL
            if (count($query)) {
                return redirect()->to(implode('/', $segments) . '?' . http_build_query($query));
            }

            return redirect()->to(implode('/', $segments));
        }

        return redirect()->back();
    }

}
