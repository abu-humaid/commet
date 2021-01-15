<!-- Sidebar -->
      <div class="sidebar" id="sidebar">
          <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="menu-title">
          <span>Main</span>
        </li>
        <li>
          <a href="{{ route('home') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
        </li>

        <li class="submenu">
          <a href="#"><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
          <ul style="display: none;">
            <li><a href="{{ route('post.index')}}">All Posts</a></li>
            <li><a href="{{ route('post-category.index') }}">Category</a></li>
            <li><a href="{{ route('tag.index') }}">Tags</a></li>


          </ul>
        </li>
        <li>
          <a href="#"><i class="fe fe-home"></i> <span>Homepage</span> <span class="menu-arrow"></span></a>
          <ul style="display: none;">
            <li><a href="{{ route('sliders.index') }}">Slider</a></li>
            <li><a href="{{ route('we_are.index') }}">We are</a></li>
            <li><a href="{{ route('vision.index') }}">Vision</a></li>
            <li><a href="{{ route('testimonials.index') }}">Testimonials</a></li>
            <li><a href="#">Expertise</a></li>
            <li><a href="#">Works</a></li>
            <li><a href="{{ route('clients.index') }}">Clients</a></li>

          </ul>
        </li>
        <li>
          <a href="#"><i class="fe fe-vector"></i> <span>Settings</span> <span class="menu-arrow"></span></a>
          <ul style="display: none;">
            <li><a href="{{ route('logo.setting')}}">Logo</a></li>
            <li><a href="{{ route('social.setting')}}">Social</a></li>
            <li><a href="{{ route('copyright.setting')}}">Copyright</a></li>

          </ul>
        </li>


      </ul>
    </div>
          </div>
      </div>
<!-- /Sidebar -->
