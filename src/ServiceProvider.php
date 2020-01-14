<?php
    namespace Genericmilk\Holiday;

    class ServiceProvider extends \Illuminate\Support\ServiceProvider{



        public function boot()
        {
            $this->setupConfig(); // Load config
            $this->loadRoutesFrom(__DIR__.'/routes/web.php'); // Import routes

            $this->commands([
                Build::class
            ]);


            if ($this->app->runningInConsole()) {
                $this->commands([
                    Build::class
                ]);
            }
        }
        public function register()
        {
            // Import controllers
            $this->app->make('Genericmilk\Holiday\Holiday');
            
        }

        protected function setupConfig(){

            $configPath = __DIR__ . '/../config/holiday.php';
            $this->publishes([$configPath => $this->getConfigPath()], 'config');
    
        }

        protected function getConfigPath()
        {
            return config_path('holiday.php');
        }

        protected function publishConfig($configPath)
        {
            $this->publishes([$configPath => config_path('holiday.php')], 'config');
        }


    }