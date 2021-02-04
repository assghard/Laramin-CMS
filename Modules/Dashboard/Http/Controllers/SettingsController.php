<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Dashboard\Entities\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $entities = Setting::paginate(100);
        $techBreakConfig = technical_break_config();
        $ipAddress = (array_key_exists('REMOTE_ADDR', $_SERVER)) ? $_SERVER['REMOTE_ADDR'] : NULL;

        return view('dashboard::settings.index', compact('entities', 'techBreakConfig', 'ipAddress'));
    }

    public function create()
    {
        return view('dashboard::settings.create');
    }

    public function store(Request $request)
    {
        $data = array_map('trim', $request->all());
        Setting::create($data);

        return redirect()->route('dashboard.settings.index')->withSuccess('Entity has been created');
    }
    public function edit($id)
    {
        $entity = Setting::findOrFail($id);

        return view('dashboard::settings.edit', compact('entity'));
    }

    public function update($id, Request $request)
    {
        $order = Setting::findOrFail($id);
        $order->update($request->all());

        if (isset($request->button) && $request->button == 'index') {
            return redirect()->route('dashboard.settings.index')->withSuccess('Entity has been updated');
        }

        return redirect()->back()->withSuccess('Entity has been updated');
    }

    public function destroy($id)
    {
        Setting::findOrFail($id)->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Entity has been deleted'
        ]);
    }

    public function technicalBreak($action)
    {
        if ($action == 'turn-on') {
            technical_break_enable();

            return redirect()->back()->withWarning('Technical break has been enabled');
        } elseif ('turn-off') {
            technical_break_disable();

            return redirect()->back()->withSuccess('Technical break has been disabled');
        } else {
            return redirect()->back()->withError('ERROR');
        }
    }

    public function ipAddressesUpdate(Request $request)
    {
        $newIpArray = array_unique(array_map('trim', explode("\r\n", $request->config_ip_addresses)));

        try {
            $filename = base_path('technical-break.txt');
            $config = unserialize(file_get_contents($filename));
            $config['accessable_ip_addresses'] = $newIpArray;
            file_put_contents($filename, serialize($config));

            return redirect()->back()->withSuccess('IP list has been updated');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Save to file ERROR');
        }
    }
}
