<?php

namespace Gioppy\StatamicGlideRest;

use Gioppy\StatamicGlideRest\Listeners\HandleAssetSaved;
use Statamic\Events\AssetSaved;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{

  protected $routes = [
    'web' => __DIR__ . '/../routes/api.php',
  ];

  public function bootAddon()
  {
    //
  }
}
