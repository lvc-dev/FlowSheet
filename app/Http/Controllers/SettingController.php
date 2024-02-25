<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingFilterRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use stdClass;
use Str;

class SettingController extends Controller
{
    public function index() : View {
        return view('setting.index', [
            'settings' => Setting::all(),
        ]);
    }

    public function create() : View {
        $setting = new Setting();
        return view('setting.create', [
            'setting' => $setting
        ]);
    }

    public function store(SettingFilterRequest $request) : RedirectResponse | View {
        $setting = Setting::create($request->validated());
        return redirect()->route('setting.index', [
            'setting' => $setting->id
        ])->with('success', 'Le paramètre a été sauvegarder');
    }

    public function edit(Setting $setting) : View {
        return view('setting.edit', [
            'setting' => $setting
        ]);
    }

    public function update(Setting $setting, SettingFilterRequest $request) : RedirectResponse | View {
        $setting->update($request->validated());
        return redirect()->route('setting.index', [
            'setting' => $setting->id
        ])->with('success', 'Le paramètre a bien été modifier');
    }

    public function export() : View {
        $settings = Setting::all();
        $file = Files::Setting->value;
        foreach ($settings as $setting) {
            $this->writeSettingJson($file, $setting->section, $setting->value);
        }
        return view('setting.index', [
            'settings' => $settings,
        ]);
    }

    public function readJson(string $file) : stdClass
    {
        $fileJson = storage_path() . "\\" . $file;
        $data = file_get_contents($fileJson);
        return json_decode($data);
    }

    public function writeSettingJson(string $file, string $section, string $value) : void
    {
        $obj = $this->readJson($file);
        $fileJson = storage_path() . "\\" . $file;
        $obj->$section = $value;
        $json = json_encode($obj, JSON_FORCE_OBJECT);
        file_put_contents($fileJson, $json, LOCK_EX);
    }
}
