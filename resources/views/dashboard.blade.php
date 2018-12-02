@extends('layout')

@section('title', 'صفحتي')

@section('content')
<!-- <iframe id="inlineFrameExample"
    title="Inline Frame Example"
    style="width:100%; height: 100vh;"
    src="http://www.slametkom.org/">
</iframe> -->
<div class="text-center mt-5">
    @if (!empty($message))
        <div class="alert alert-success m-3 text-center" role="alert">
        {{$message}}
        </div>
    @endif
</div>
@endsection
