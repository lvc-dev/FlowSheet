<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use stdClass;

enum Files : string {
    case Setting = "settings.json";

    public function getSetting() : Files
    {
        return Files::Setting;
    }
}

class AppController extends Controller
{
    public string $settingFileJson = "settings.json";

    public function home() : View {
//        User::create([
//            'name' => 'Vincent',
//            'email' => 'lefebvre-v@laposte.net',
//            'password' => Hash::make('vincent76')
//        ]);
        return view('home');
    }

    public function readJson(string $file) : stdClass
    {
        $fileJson = storage_path() . "\\" . $file;
        $data = file_get_contents($fileJson);
        return json_decode($data);
    }

    public function writeJson(string $file, string $section, string $value) : void
    {
        $fileJson = storage_path() . "\\" . $file;
        $obj = $this->readJson($file);
        $obj->$section = $value;
        $json = json_encode($obj, JSON_FORCE_OBJECT);
        file_put_contents($fileJson, $json, LOCK_EX);
    }
}
