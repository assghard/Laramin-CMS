<div class="image-box mb-2" data-image-id="{{ $image->id }}">
    <div class="delete-image-btn" onclick="deleteImage(this, event)" data-route="{{ route('dashboard.media.delete', $image->id) }}"><span class="oi oi-circle-x"></span></div>
    <a href="{{ $image->getFullUrl() }}" data-lightbox="roadtrip">
        <img src="{{ $image->getFullUrl('thumb') }}" class="img-fluid" />
    </a>
    <input type="text" name="image[{{ $image->id }}]file_name" class="form-control" data-name="file_name" value="{{ $image->getFilenameWithoutExtension() }}" placeholder="Filename (without extension)" onkeypress="return event.keyCode != 13;" />
    <input type="text" name="image[{{ $image->id }}]title" class="form-control" data-name="title" value="{{ $image->getCustomProperty('title') }}" placeholder="Image title" onkeypress="return event.keyCode != 13;" />
    <input type="text" name="image[{{ $image->id }}]alt" class="form-control" data-name="alt" value="{{ $image->getCustomProperty('alt') }}"placeholder="Image alt" onkeypress="return event.keyCode != 13;" />
    <div type="text" class="btn btn-secondary btn-block" onclick="saveImageData(this, event)" data-route="{{ route('dashboard.media.update-image-box', $image->id) }}">Save</div>
</div>