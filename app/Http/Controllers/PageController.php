<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    // Simulasi login
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|min:3|max:30',
            'password' => 'required|string|min:4',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min'      => 'Username minimal 3 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 4 karakter.',
        ]);

        return redirect()->route('dashboard', ['username' => $data['username']]);
    }

    public function dashboard(Request $request)
    {
        if (! $username = $request->query('username')) {
            return $this->backToLogin();
        }

        $episodes = collect($this->episodes());

        return view('dashboard', [
            'username'       => $username,
            'totalViews'     => $episodes->sum('views'),
            'totalLikes'     => $episodes->sum('likes'),
            'totalDownloads' => $episodes->sum('downloads'),
            'topEpisodes'    => $episodes->sortByDesc('views')->take(3)->values()->all(),
        ]);
    }

    public function pengelolaan(Request $request)
    {
        if (! $username = $request->query('username')) {
            return $this->backToLogin();
        }

        return view('pengelolaan', [
            'username' => $username,
            'episodes' => $this->episodes(),
        ]);
    }

    public function profile(Request $request)
    {
        if (! $username = $request->query('username')) {
            return $this->backToLogin();
        }

        return view('profile', [
            'username' => $username,
            'details'  => [
                'Peran'          => 'Pengelola Konten',
                'Seri'           => 'Chainsaw Man (Season 1)',
                'Jumlah episode' => count($this->episodes()),
                'Status akun'    => 'Aktif',
            ],
        ]);
    }

    private function backToLogin()
    {
        return redirect()->route('login')
            ->withErrors(['username' => 'Silakan login terlebih dahulu.']);
    }

    // Data dummy pengganti database.
    private function episodes(): array
    {
        return [
            ['number' => 1,  'title' => 'Dog & Chainsaw',       'duration' => '24 mnt', 'views' => 1250000, 'likes' => 98000,  'downloads' => 41000],
            ['number' => 2,  'title' => 'Arrival in Tokyo',     'duration' => '24 mnt', 'views' => 1100000, 'likes' => 87000,  'downloads' => 36000],
            ['number' => 3,  'title' => "Meowy's Whereabouts",  'duration' => '24 mnt', 'views' => 980000,  'likes' => 79000,  'downloads' => 31000],
            ['number' => 4,  'title' => 'Rescue',               'duration' => '24 mnt', 'views' => 940000,  'likes' => 75000,  'downloads' => 29500],
            ['number' => 5,  'title' => 'Gun Devil',            'duration' => '24 mnt', 'views' => 1020000, 'likes' => 83000,  'downloads' => 33000],
            ['number' => 6,  'title' => 'Kill Denji',           'duration' => '24 mnt', 'views' => 1180000, 'likes' => 95000,  'downloads' => 38500],
            ['number' => 7,  'title' => 'The Taste of a Kiss',  'duration' => '24 mnt', 'views' => 1320000, 'likes' => 110000, 'downloads' => 45000],
            ['number' => 8,  'title' => 'Gunfire',              'duration' => '24 mnt', 'views' => 1060000, 'likes' => 86000,  'downloads' => 34000],
            ['number' => 9,  'title' => 'From Kyoto',           'duration' => '24 mnt', 'views' => 990000,  'likes' => 80000,  'downloads' => 31500],
            ['number' => 10, 'title' => 'Bruised & Battered',   'duration' => '24 mnt', 'views' => 1040000, 'likes' => 84000,  'downloads' => 33500],
            ['number' => 11, 'title' => 'Mission Start',                  'duration' => '24 mnt', 'views' => 1150000, 'likes' => 92000,  'downloads' => 37000],
            ['number' => 12, 'title' => 'Katana vs. Chainsaw',  'duration' => '24 mnt', 'views' => 1480000, 'likes' => 125000, 'downloads' => 52000],
        ];
    }
}
