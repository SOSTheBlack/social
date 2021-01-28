<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

/**
 * Class LanguageController
 *
 * @package App\Http\Controllers
 */
class LanguageController extends Controller
{
    /**
     * Possibles locales.
     *
     * @var array
     */
    private $availLocale
        = [
            'en' => 'en',
            'fr' => 'fr',
            'de' => 'de',
            'br' => 'br',
        ];

    /**
     * @param string $locale
     *
     * @return RedirectResponse
     */
    public function swap(string $locale): RedirectResponse
    {
        if (array_key_exists($locale, $this->availLocale)) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
