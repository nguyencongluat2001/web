@extends('client.layouts.index')
@section('body-client')
<!-- Start Banner Hero -->
<section class="w-100">
    <div class="row d-flex align-items-center py-5">
        <div class="col-lg-12 text-start mt-5 px-4">
            @if(isset($blogs) && count($blogs) > 0)
            <div class="row">
                @php
                $basePath = url("file-image-client/blogs") . "/";
                @endphp
                @foreach($blogs as $blog)
                <div class="col-md-3 product-item mb-4">
                    <a href="{{ route('project.reader', ['id' => $blog->id]) }}" class="image-link">
                        <div class="inner-image">
                            <img src="{{ $basePath . ($blog->imageBlog[0]?->name_image ?? '') }}" alt="{{ $blog->detailBlog?->title }}" class="img-fluid mb-3">
                        </div>
                        <div class="inner-content">
                            <h4 class="product-title">{{ $blog->detailBlog?->title }}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <p>Không có dữ liệu nào.</p>
            @endif
        </div>
    </div>
</section>
<!-- End Banner Hero -->
@endsection