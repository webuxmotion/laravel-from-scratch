<!--start-logo-->
<div class="logo">
    <a href="/">
        <h1>Baluar</h1>
    </a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">

                <x-menu tpl="components.menu" />

                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="/search" method="get" autocomplete="off">
                        <input type="text" class="typeahead" name="s">
                        <input type="submit" value="">
                    </form>
                    {{-- <input type="text" value="Search" onfocus="this.value = '';"
                        onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value=""> --}}
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->
