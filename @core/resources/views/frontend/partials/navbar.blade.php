<nav class="navbar navbar-area navbar-expand-lg nav-style-01" style="
background: #073a8b;overflow: hidden;
">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <a href="{{url('/')}}" class="logo">
                    {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#zixer_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="zixer_main_menu">
            <ul class="navbar-nav">
                {!! render_menu_by_id($primary_menu_id) !!}
            </ul>
        </div>
    </div>
</nav>
