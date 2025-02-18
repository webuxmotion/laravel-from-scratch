<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/images/favicon.ico" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $meta = globalData()->get('meta');
    @endphp

    <title>{{ $meta && $meta->title ? $meta->title : 'SHOP' }}</title>

    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
    <script src="/js/jquery-1.11.0.min.js"></script>
    <!--Custom-Theme-files-->
    <!--theme-style-->
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="{{ $meta && $meta->description ? $meta->description : 'Shop description' }}" />
    <meta name="keywords" content="{{ $meta && $meta->keywords ? $meta->keywords : 'Shop keywords' }}" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--start-menu-->

    <link href="/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="/js/memenu.js"></script>
    <script>
        $(document).ready(function() {
            $(".memenu").memenu();
        });
    </script>
    <!--dropdown-->
    <script src="/js/jquery.easydropdown.js"></script>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    @else
    @endif

</head>

<body>

    @include('partials._top-header')
    @include('partials._header')

    {{ $slot }}

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close js-close-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <a href="/checkout" class="btn btn-primary js-checkout-button" data-dismiss="modal">Checkout</a>
                    <button type="button" class="btn btn-default js-close-modal" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    @include('partials._footer')

</body>

</html>
