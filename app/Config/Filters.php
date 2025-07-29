<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'auth'          => \App\Filters\Auth::class, // ✅ Filter auth untuk login
        'role'          => \App\Filters\Role::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
    ];

    public array $required = [
        'before' => [
            'forcehttps',
            'pagecache',
        ],
        'after' => [
            'pagecache',
            'performance',
            'toolbar',
        ],
    ];

    public array $globals = [
        'before' => [
            // contoh jika mau aktifkan csrf global:
            // 'csrf',
        ],
        'after' => [
            // 'secureheaders',
        ],
    ];

    public array $methods = [];

    public array $filters = [
        // ✅ Terapkan filter auth ke URI tertentu
        'auth' => [
            'before' => [
                'dashboard',
                'dashboard/*',
                'admin',
                'admin/*',
                'user',
                'user/*',
                // tambahkan jika ada halaman lain yang perlu login
            ]
        ],
    ];
}
