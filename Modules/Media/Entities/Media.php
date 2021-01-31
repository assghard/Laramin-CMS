<?php

declare(strict_types=1);

namespace Modules\Media\Entities;

use Spatie\MediaLibrary\MediaCollections\Models\Media as SpatieMedia;

class Media extends SpatieMedia
{
    public function getFilenameWithoutExtension(): string
    {
        return pathinfo($this->file_name, PATHINFO_FILENAME);
    }

}
