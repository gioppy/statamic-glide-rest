<?php

namespace Gioppy\StatamicGlideRest\Http\Controllers;

use Gioppy\StatamicGlideRest\Http\Resources\GlideResource;
use Illuminate\Http\Request;
use Statamic\Facades\Asset;

class GlideController
{

  public function index(Request $request, string $container, string $path): GlideResource
  {
    $presets = explode(',', $request->query('presets'));
    $id = "{$container}::{$path}";
    $asset = Asset::findById($id);

    $config = config('statamic.assets.image_manipulation.presets');

    $paths = collect($presets)
      ->filter(fn (string $preset) => array_key_exists($preset, $config))
      ->mapWithKeys(function (string $preset) use ($asset, $config) {
        $image = $asset->manipulate($config[$preset]);
        $size = getimagesize($image);

        return [
          $preset => [
            'width' => $size[0],
            'height' => $size[1],
            'url' => $image,
          ]
        ];
      })
      ->toArray();

    //$asset->manipulate(['w' => 50])
    return new GlideResource($asset, $paths);
  }
}