<?php

namespace App\Providers;

use App\View\Components\Hints\Feedback\HintFeedbackErrorComponent;
use App\View\Components\Hints\Feedback\HintFeedbackHelperComponent;
use App\View\Components\Modals\ModalDeleteComponent;
use App\View\Components\Modals\ModalUpdateComponent;
use App\View\Components\Layout\Label\LayoutLabelFormComponent;
use App\View\Components\Layout\Card\Header\LayoutCardHeaderTitleCrudComponent;
use App\View\Components\Layout\Button\LayoutButtonVoltarComponent;
use App\View\Components\Layout\Input\LayoutInputCodigoComponent;
use App\View\Components\Layout\Input\LayoutInputFormComponent;
use App\View\Components\Layout\Table\LayoutTableListComponent;
use App\View\Components\Validation\Feedback\ValidationFeedbackSmallComponent;



use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Config;

use Illuminate\Support\Facades\Blade;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::component('hint-feedback-error',             HintFeedbackErrorComponent::class);
        Blade::component('hint-feedback-helper',            HintFeedbackHelperComponent::class);
        Blade::component('modal-delete',                    ModalDeleteComponent::class);
        Blade::component('modal-update',                    ModalUpdateComponent::class);
        Blade::component('layout-label-form',               LayoutLabelFormComponent::class);
        Blade::component('layout-card-header-title-crud',   LayoutCardHeaderTitleCrudComponent::class);
        Blade::component('layout-button-voltar',            LayoutButtonVoltarComponent::class);
        Blade::component('layout-input-codigo',             LayoutInputCodigoComponent::class);
        Blade::component('layout-input-form',               LayoutInputFormComponent::class);
        Blade::component('layout-table-list',               LayoutTableListComponent::class);
        Blade::component('validation-feedback-small',       ValidationFeedbackSmallComponent::class);
    }
}
