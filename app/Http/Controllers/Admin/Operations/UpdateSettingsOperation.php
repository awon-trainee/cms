<?php

namespace App\Http\Controllers\Admin\Operations;

use Alert;
use App\Http\Requests\UpdateSettingsRequest;
use App\Settings\OrganizationalStructureSettings;
use Illuminate\Http\Request;

trait UpdateSettingsOperation
{

    protected function setupEditSettingsOperation()

    {
        return view('admin.settings.edit', [
            'title' => 'تعديل '.$this->title,
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                $this->title => route($this->route.'.index'),
                'تعديل' => false,
            ],
            'route' => $this->route,
            'page' => 'resources/views/admin/settings/edit.blade.php',
            'controller' => $this::class,
            'settings' => $this->settings,
        ]);
    }

    protected function setupSettingsRequest()
    {
        UpdateSettingsRequest::$settingsClass = $this->settings;
    }

    public function update(UpdateSettingsRequest $request)
    {
        foreach ($this->settings::rules() as $name => $rules) {
            $splitRules = is_array($rules) ? $rules : explode('|', $rules);
            if (in_array('image', $splitRules)){
                if (!$request->hasFile($name)) continue;
                $hashName = $request->file($name)->hashName();

                throw_if(!defined($this->settings::class.'::IMAGE_PATH'),
                    'IMAGE_PATH is not defined in '.$this->settings::class.' class'
                );

                throw_if(!defined($this->settings::class.'::IMAGE_VIEW_PATH'),
                    'IMAGE_VIEW_PATH is not defined in '.$this->settings::class.' class'
                );

                $request->file($name)->storeAs(
                    $this->settings::IMAGE_PATH,
                    $hashName,
                    'digitalocean'
                );

                $this->settings->$name = $hashName;
                continue;
            }
            $this->settings->$name = (string)$request->input($name);
        }

        $this->settings->save();

        Alert::add('success', 'تم تعديل '.$this->title.' بنجاح')->flash();

        return redirect()->route($this->route.'.index');
    }
}
