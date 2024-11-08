<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ThemeController extends Controller
{
    //
    public function readCookie(Request $request)
    {
        $Theme = $request->cookie('Theme');
        $frontEnd = [
            "HTML" => "html",
            "CSS" => "css",
            "WordPress" => "wordpress",
            "Cpanel" => "cpanel",
            "JavaScript" => "js",
            "Sass" => "sass",
            "Bootstrap" => "bootstrap",
            "Tailwind CSS" => "tailwindcss",
            "Three.js" => "threejs",
            "SVG" => "svg",
            "Vite" => "vite",
            "React" => "react",
        ];
        $backEnd = [
            "PHP" => "php",
            "Laravel" => "laravel",
            "MySQL" => "mysql",
            "PostgreSQL" => "postgresql",
            "C#" => "csharp",
            "Node.js" => "nodejs",
        ];

        $ide = [
            "Atom" => "atom",
            "Codepen" => "codepen",
            "Github" => "github",
            "Neovim" => "neovim",
            "Visual Studio Code" => "vscode",
        ];
        return view('index',['frontEnd' => $frontEnd, 'backEnd' => $backEnd, 'ide' => $ide], compact('Theme'));
    }

    public function updateTheme(Request $request)
    {
        $Theme = $request->cookie('Theme');
        $newTheme = ($Theme === 'dark') ? 'light' : 'dark';
        // if ($Theme && in_array($Theme, ['light', 'dark'])) {
        $_1YearInMinutes = 60 * 24 * 365;
        $Cookie = Cookie::make('Theme', $newTheme, $_1YearInMinutes);
        // }
        return back()->withCookie($Cookie);
    }

}
