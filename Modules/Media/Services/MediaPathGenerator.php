<?php

/**
 * Custom path generator for media library instead of: Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator
 * 
 * Use this Generator in /config/media-library.php (path_generator) 
 * If you want to use custom directory stucture and store images in subfolders (example: page, post, product) 
 * /public/media/post/{post_id}/{media_id}/image.jpg
 * 
 * This way reduces amount of folders inside media storage folder, makes structure more readable and clear. 
 * In case you have a lot of different media of pages, posts, products etc... this generator can help to organize media in structured tree
 * 
 * Example: The structure for post (post id 10) is going to be:
 * /public/media/post/10/87/image87.jpg
 * /public/media/post/10/87/conversions/thumb87_1.jpg
 * /public/media/post/10/87/conversions/thumb87_2.jpg
 * /public/media/post/10/87/conversions/thumb87_3.jpg
 * /public/media/post/10/87/responsive-images/img87_1.jpg
 * /public/media/post/10/87/responsive-images/img87_2.jpg
 * 
 * /public/media/post/10/88/image88.jpg
 * /public/media/post/10/89/image89.jpg
 * 
 * As you see, images are segregated
 */

namespace Modules\Media\Services;

use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaPathGenerator extends DefaultPathGenerator
{
    /*
     * Get the path for the given media, relative to the root storage path.
     */
    public function getPath(Media $media): string
    {
        return $this->getBasePath($media).'/';
    }

    /*
     * Get the path for conversions of the given media, relative to the root storage path.
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getBasePath($media) . '/conversions/';
    }

    /*
     * Get the path for responsive images of the given media, relative to the root storage path.
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getBasePath($media) . '/responsive-images/';
    }

    /*
     * Get a unique base path for the given media.
     */
    protected function getBasePath(Media $media): string
    {
        $modelType = explode("\\", $media->model_type);
        $modelType = strtolower(end($modelType));

        return $modelType.'/'. $media->model->id.'/'.$media->getKey();
    }
}
