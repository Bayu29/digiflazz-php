<?php
return  [
    /**
     * Api Inntegration Environment
     * Available: "develompent", "production"
     */
    'environment' => env('DIGIFLAZZ_API_ENVIRONMENT', 'development'),

    /**
     * Digiflazz Username
     */
    'username' => env('DIGIFLAZZ_USERNAME', 'username'),

    /**
     * Development Key
     */
    'development_key' => env('DIGIFLAZZ_DEVELOPMENT_KEY', 'digiflazz_development_key'),

    /**
     * Production Key
     */
    'production_key' => env('DIGIFLAZZ_PRODUCTION_KEY', 'digiflazz_production_key')

    /**
     * Secret Key
     */
    'secret_key' => env('DIGIFLAZZ_SECRET_KEY', 'digiflazz_secret_key'),
    
    /**
     * Development ID
     */
    'webhook_id' => env('DIGIFLAZZ_WEBHOOK_ID', 'digiflazz_webhook_id')

]
?>