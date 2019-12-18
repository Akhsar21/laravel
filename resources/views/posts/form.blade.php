<div class="card-body">
    <div class="form-group col-md-12">
        <label class="col-form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
            value="{{ old('title') ?? $post->title }}">
        @error('title')
        <div class="invalid-feedback" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-12">
        <label for="category_id" class="col-form-label">Category</label>
        <select class="form-control" name="category_id">
            <option value="" holder>Choose Category</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="invalid-feedback" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-12">
        <label for="tags" class="col-form-label">Tags</label>
        <select class="form-control col-md-12 select2-multi" multiple="multiple" name="tags[]">
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tag')
        <div class="invalid-feedback" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col-md-12">
        <label class="col-form-label">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" id="textarea" name="content"
            rows="9" placeholder="Please type something here...">{{ old('content') ?? $post->content }}</textarea>
        @error('content')
        <div class="invalid-feedback" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-12 d-flex flex-column">
        <label class="col-form-label">Thumbnail</label>
        <input type="file" name="image" id="image-upload" />
        @error('image')
        <div class="invalid-feedback" role="alert">{{ $message }}</div>
        @enderror
    </div>
</div>
@csrf