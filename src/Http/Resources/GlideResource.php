<?php

namespace Gioppy\StatamicGlideRest\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GlideResource extends JsonResource
{

  private $thumbnails;

  public function __construct($resource, array $thumbnails)
  {
    $this->thumbnails = $thumbnails;
    parent::__construct($resource);
  }

  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'data' => [
        ...$this->resource->toAugmentedCollection(),
        'thumbnails' => $this->thumbnails,
      ],
    ];
  }
}
