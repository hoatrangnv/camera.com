
<div class="sidebar-nav">
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="visible-xs navbar-brand">Danh mục sản phẩm</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Menu Item 1</a></li>
                <li><a href="#">Menu Item 2</a></li>
                <li><a href="#">Menu Item 3</a></li>
                <li><a href="#">Menu Item 4</a></li>
                <!--<li><a href="#">Reviews <span class="badge">1,118</span></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<?php
$this->registerCss('
/* make sidebar nav vertical */ 
@media (min-width: 768px) {
  .sidebar-nav .navbar .navbar-collapse {
    padding: 0;
    max-height: none;
  }
  .sidebar-nav .navbar ul {
    float: none;
    display: block;
  }
  .sidebar-nav .navbar li {
    float: none;
    display: block;
  }
  .sidebar-nav .navbar li a {
    padding-top: 6px;
    padding-bottom: 6px;
  }
}
');
