# Statamic Glide Rest

> Statamic Glide Rest is a Statamic addon that expose glide thumbnails on a Rest API endpoint.

## How to Install

``` bash
composer require gioppy/statamic-glide-rest
```

## How to Use

The plugin takes only glide presets at the moment, not inline definition of a thumbnail. Before use it, create some presets on regular config file (`config/statamic/assets.php`);

After that, call the endpoint `/glide/{container}/{path}?presets=preset1,preset2,...` passing the **container name**, the **path** (or name) of the image and a list of a **presets**.

The response is a normal asset response but with thumbnails node:
```json
{
    "alt": "",
    "id": "demo::01.jpg",
    "title": "01.jpg",
    "path": "01.jpg",
    "filename": "01",
    "basename": "01.jpg",
    "extension": "jpg",
    "is_asset": true,
    "is_audio": false,
    "is_previewable": false,
    "is_image": true,
    "is_svg": false,
    "is_video": false,
    "blueprint": {
        "title": "Demo",
        "handle": "demo"
    },
    "edit_url": "http://localhost/cp/assets/browse/demo/01.jpg/edit",
    "container": {
        "id": "demo",
        "title": "Demo",
        "handle": "demo",
        "disk": "public",
        "blueprint": {
            "title": "Demo",
            "handle": "demo"
        },
        "search_index": null,
        "api_url": null
    },
    "folder": "/",
    "url": "http://localhost/storage/01.jpg",
    "permalink": "http://localhost/storage/01.jpg",
    "api_url": "http://localhost/api/assets/demo/01.jpg",
    "size": "71.35 KB",
    "size_bytes": 73062,
    "size_kilobytes": 71.35,
    "size_megabytes": 0.07,
    "size_gigabytes": 0,
    "size_b": 73062,
    "size_kb": 71.35,
    "size_mb": 0.07,
    "size_gb": 0,
    "last_modified": "2023-12-03T09:23:00.000000Z",
    "last_modified_timestamp": 1701595380,
    "last_modified_instance": "2023-12-03T09:23:00.000000Z",
    "focus": "50-50-1",
    "has_focus": false,
    "focus_css": "50% 50%",
    "height": 800,
    "width": 1200,
    "orientation": "landscape",
    "ratio": 1.5,
    "mime_type": "image/jpeg",
    "duration": null,
    "duration_seconds": null,
    "duration_minutes": null,
    "duration_sec": null,
    "duration_min": null,
    "playtime": "31:09",
    "thumbnails": {
        "small": "http://localhost/containers/demo/01.jpg/b7213a45700ddc51ab273d1b889dfb67.jpg",
        "medium": "http://localhost/containers/demo/01.jpg/648c933c5121599e77e74976196aedb2.jpg"
    }
}
```
### A side note

At the moment is not possible to register Rest endpoint on a Statamic addon, so this module must be called **without** `/api` prefix. 

## TODO

- [x] Basic integration
- [ ] Handle errors
- [ ] Inline thumb definition
- [ ] Test