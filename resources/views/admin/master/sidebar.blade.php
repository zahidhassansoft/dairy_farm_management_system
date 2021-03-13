
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        @foreach($menus as $menu)
        @if($menu->tblMenu->parent_id==0)
        <li class="{{count($menu->tblMenu->childs) ? 'treeview' : null}}">
          <a href="/{{$menu->tblMenu->route}}">
            <i class="fa {{$menu->tblMenu->menu_icon}}"></i> 
            <span>{{$menu->tblMenu->name}}</span>
            @if($menu->where("parent_menu", $menu->menu_id)->count()>1)
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            @endif
          </a>
          @if($menu->where("parent_menu", $menu->menu_id)->count()>1)
          <ul class="treeview-menu">
            @foreach($menus->where("parent_menu", $menu->menu_id) as $child)
          @if($child->menu_id!=$child->parent_menu)
            <li><a href="/{{$child->tblMenu->route}}"><i class="fa {{$child->tblMenu->menu_icon}}"></i>{{$child->tblMenu->name}}</a></li>
          @endif
            @endforeach
          </ul>
          @endif
        </li>
        @endif
        @endforeach
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>