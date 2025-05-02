<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Pendaftar;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('frontend.layout', function ($view) {
            if (auth()->check()) {
                // Fetch the latest 5 Pendaftar along with the related HistoryPendaftar and lowongan & customer data
                $notifikasis = Pendaftar::with(['lowongan', 'customer', 'history'])
                    ->latest()
                    ->take(5)
                    ->get();
            } else {
                $notifikasis = collect();
            }
            
            $view->with('notifikasis', $notifikasis);
        });
    }
    
    

    public function register()
    {
        //
    }
}

