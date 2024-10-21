<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
   @php
     $PermissionUser = App\Models\PermissionRoleModel::getPermission('User',Auth::user()->role_id);
     $PermissionRole = App\Models\PermissionRoleModel::getPermission('Role',Auth::user()->role_id);
     $PermissionS_formation = App\Models\PermissionRoleModel::getPermission('S_formation',Auth::user()->role_id);
     $PermissionS_examen = App\Models\PermissionRoleModel::getPermission('S_examen',Auth::user()->role_id);
     $PermissionReclamation = App\Models\PermissionRoleModel::getPermission('Reclamation',Auth::user()->role_id);
     $PermissionSetting = App\Models\PermissionRoleModel::getPermission('Setting',Auth::user()->role_id);
   @endphp
    <li class="nav-item">
      <a class="nav-link @if (Request::segment(2)!='dashboard') collapsed @endif " href="{{ url('panel/dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Tableau de bord</span>
      </a>
    </li>
    @if (!empty($PermissionUser))
      <li class="nav-item">
      <a class="nav-link @if (Request::segment(2)!='user') collapsed @endif" href="{{ url('/panel/user') }}">
        <i class="bi bi-person"></i>
        <span>Candidats</span>
      </a>
    </li>
    @endif
    @if (!empty($PermissionRole))
    <li class="nav-item">
      <a class="nav-link @if (Request::segment(2)!='role') collapsed @endif" href="{{ url('/panel/role') }}">
        <i class="bi bi-shield-lock"></i>
        <span>Rôles</span>
      </a>
    </li>
    @endif
    @if (!empty($PermissionS_formation))
    <li class="nav-item">
      <a class="nav-link @if (Request::segment(2)!='s_formation') collapsed @endif" href="{{ url('/panel/s_formation') }}">
        <i class="bi bi-journal-bookmark"></i>
        <span>Séance de Formation</span>
      </a>
    </li>
    @endif
    @if (!empty($PermissionS_examen))
    <li class="nav-item">
      <a class="nav-link @if (Request::segment(2)!="s_examen") collapsed @endif" href="{{ url('/panel/s_examen') }}">
        <i class="bi bi-clipboard-check"></i>
        <span>Séance d'Examen</span>
      </a>
    </li>
    @endif
    @if (!empty($PermissionReclamation))
    <li class="nav-item">
      <a class="nav-link @if (Request::segment(2)!="reclamation") collapsed @endif" href="{{ url('/panel/reclamation') }}">
        <i class="bi bi-chat-dots"></i>
        <span>Réclamation</span>
      </a>
    </li>
    @endif
  </ul>

</aside>
