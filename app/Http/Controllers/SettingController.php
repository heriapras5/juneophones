<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = [
            'logo' => Setting::getValue('logo'),
            'favicon' => Setting::getValue('favicon'),
            'sosial_media' => json_decode(Setting::getValue('sosial_media', '[]'), true),
            'keunggulan' => json_decode(Setting::getValue('keunggulan', '[]'), true),
            'alamat' => Setting::getValue('alamat'),
            'telepon' => Setting::getValue('telepon'),
            'whatsapp' => Setting::getValue('whatsapp'),
            'email' => Setting::getValue('email'),
            'jam_operasional' => Setting::getValue('jam_operasional'),
            'maps_embed' => Setting::getValue('maps_embed'),
            'maps_link' => Setting::getValue('maps_link'),
        ];
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png,jpg,jpeg|max:1024',
            'sosial_media' => 'nullable|array',
            'sosial_media.*.icon' => 'nullable|string|max:255',
            'sosial_media.*.url' => 'nullable|string|max:500',
            'keunggulan' => 'nullable|array',
            'keunggulan.*.icon' => 'nullable|string|max:255',
            'keunggulan.*.judul' => 'nullable|string|max:255',
            'keunggulan.*.deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|max:255',
            'whatsapp' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'jam_operasional' => 'nullable|max:255',
            'maps_link' => 'nullable|max:500',
        ]);

        if ($request->hasFile('logo')) {
            $old = Setting::getValue('logo');
            if ($old) Storage::disk('public')->delete($old);
            Setting::updateOrCreate(
                ['key' => 'logo'],
                ['value' => $request->file('logo')->store('settings', 'public')]
            );
        } elseif ($request->delete_logo) {
            $old = Setting::getValue('logo');
            if ($old) Storage::disk('public')->delete($old);
            Setting::updateOrCreate(['key' => 'logo'], ['value' => '']);
        }

        if ($request->hasFile('favicon')) {
            $old = Setting::getValue('favicon');
            if ($old) Storage::disk('public')->delete($old);
            Setting::updateOrCreate(
                ['key' => 'favicon'],
                ['value' => $request->file('favicon')->store('settings', 'public')]
            );
        } elseif ($request->delete_favicon) {
            $old = Setting::getValue('favicon');
            if ($old) Storage::disk('public')->delete($old);
            Setting::updateOrCreate(['key' => 'favicon'], ['value' => '']);
        }

        if ($request->has('sosial_media') && is_array($request->sosial_media)) {
            $sanitized = $this->arrayStripTags(array_values(array_filter($request->sosial_media, fn($v) => !empty($v['icon']) || !empty($v['url']))));
            Setting::updateOrCreate(
                ['key' => 'sosial_media'],
                ['value' => json_encode($sanitized)]
            );
        }

        if ($request->has('keunggulan') && is_array($request->keunggulan)) {
            $sanitized = $this->arrayStripTags(array_values(array_filter($request->keunggulan, fn($v) => !empty($v['judul']))));
            Setting::updateOrCreate(
                ['key' => 'keunggulan'],
                ['value' => json_encode($sanitized)]
            );
        }

        if ($request->filled('pageheaders')) {
            $existing = json_decode(Setting::getValue('pageheaders', '{}'), true);
            $updated = array_merge($existing, $request->pageheaders);
            $sanitized = $this->arrayStripTags($updated);
            Setting::updateOrCreate(
                ['key' => 'pageheaders'],
                ['value' => json_encode($sanitized)]
            );
        }

        $kontakFields = ['alamat', 'telepon', 'whatsapp', 'email', 'jam_operasional', 'maps_link'];
        foreach ($kontakFields as $field) {
            if ($request->has($field)) {
                $value = $request->input($field);
                $data[$field] = $value ? strip_tags($value) : null;
            }
        }

        if ($request->filled('maps_link')) {
            $data['maps_embed'] = $this->convertToEmbedUrl($request->input('maps_link'));
        }

        foreach ($kontakFields as $field) {
            if (array_key_exists($field, $data)) {
                Setting::updateOrCreate(
                    ['key' => $field],
                    ['value' => $data[$field]]
                );
            }
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Pengaturan berhasil diperbarui.');
    }

    private function convertToEmbedUrl($url)
    {
        $url = trim($url);

        if (str_contains($url, 'output=embed') || str_contains($url, '/embed?')) {
            return $url;
        }

        $resolved = $this->resolveRedirect($url);

        if (preg_match('/goo\.gl|maps\.app\.goo/', $resolved)) {
            $alamat = Setting::getValue('alamat');
            if ($alamat) {
                return 'https://www.google.com/maps?q=' . urlencode($alamat) . '&output=embed';
            }
            return 'https://www.google.com/maps?q=' . urlencode($url) . '&output=embed';
        }

        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $resolved, $m)) {
            return 'https://www.google.com/maps?q=' . $m[1] . ',' . $m[2] . '&output=embed';
        }

        if (preg_match('#/place/([^/]+)#', $resolved, $m)) {
            $name = urldecode($m[1]);
            return 'https://www.google.com/maps?q=' . urlencode($name) . '&output=embed';
        }

        $alamat = Setting::getValue('alamat');
        if ($alamat) {
            return 'https://www.google.com/maps?q=' . urlencode($alamat) . '&output=embed';
        }

        return 'https://www.google.com/maps?q=' . urlencode($url) . '&output=embed';
    }

    private function resolveRedirect($url)
    {
        if (!preg_match('/goo\.gl|maps\.app\.goo/', $url)) {
            return $url;
        }

        if (function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_RANGE => '0-1000',
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_MAXREDIRS => 5,
                CURLOPT_TIMEOUT => 5,
                CURLOPT_CONNECTTIMEOUT => 3,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            ]);
            $output = @curl_exec($ch);
            $final = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
            curl_close($ch);
            if ($final && $final !== $url) {
                return $final;
            }
        }

        try {
            $ctx = stream_context_create([
                'http' => [
                    'follow_location' => true,
                    'max_redirects' => 5,
                    'timeout' => 5,
                    'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                ],
            ]);
            $finalUrl = $url;
            $headers = @get_headers($url, 1, $ctx);
            if ($headers && isset($headers['Location'])) {
                $loc = $headers['Location'];
                if (is_array($loc)) $loc = end($loc);
                $finalUrl = $loc;
            }
            return $finalUrl;
        } catch (\Exception $e) {}

        return $url;
    }

    private function arrayStripTags($array)
    {
        if (!is_array($array)) return $array;
        $result = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result[$key] = $this->arrayStripTags($value);
            } else {
                $result[$key] = is_string($value) ? strip_tags($value) : $value;
            }
        }
        return $result;
    }
}
