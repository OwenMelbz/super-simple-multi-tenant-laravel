<?php

namespace App;

use Landlord;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $guarded = [];
    protected $casts = ['domains' => 'array'];

    public static function byDomain($domain) {

        $domain = strtolower($domain);

        return self::all()->reject(function ($t) use ($domain) {
            return !in_array($domain, $t->domains);
        })->first();
    }

    public static function active() {
        $tenantId = Landlord::getTenants()->first();
        return self::findOrFail($tenantId);
    }
}
