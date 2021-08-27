<?php

namespace App\Providers;

use App\Repositories\BaseRespository;
use App\Repositories\CandidateRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ElectionRepository;
use App\Repositories\IBaseRepository;
use App\Repositories\ICandidateRepository;
use App\Repositories\ICategoryRepository;
use App\Repositories\IElectionRepository;
use App\Repositories\IResultRepository;
use App\Repositories\IVoterRepository;
use App\Repositories\ResultRepository;
use App\Repositories\VoterRepository;
use App\Services\CandidateService;
use App\Services\CategoryService;
use App\Services\ElectionService;
use App\Services\ICandidateService;
use App\Services\ICategoryService;
use App\Services\IElectionService;
use App\Services\IResultService;
use App\Services\IVoterService;
use App\Services\ResultService;
use App\Services\VoterService;
use Illuminate\Support\ServiceProvider;

class WebProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBaseRepository::class, BaseRespository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(ICategoryService::class, CategoryService::class);
        $this->app->bind(IVoterRepository::class, VoterRepository::class);
        $this->app->bind(IVoterService::class, VoterService::class);
        $this->app->bind(ICandidateRepository::class, CandidateRepository::class);
        $this->app->bind(ICandidateService::class, CandidateService::class);
        $this->app->bind(IElectionRepository::class, ElectionRepository::class);
        $this->app->bind(IElectionService::class, ElectionService::class);
        $this->app->bind(IResultRepository::class, ResultRepository::class);
        $this->app->bind(IResultService::class, ResultService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
