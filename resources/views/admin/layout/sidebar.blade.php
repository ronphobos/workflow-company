<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title">Workflow <span>WMC</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('images/pas_image.svg.png') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenue,</span>
                <h2>@auth {{ auth()->user()->nom_utilisateur }} @endauth @guest Personne @endguest</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ route('admin.dashbord') }}"><i class="fa fa-home"></i> Accueil</a></li>

                   <li><a><i class="fa fa-sitemap"></i> Projets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('projets.index') }}">projets</a>
                        <li><a>Tâches<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            @foreach ($projets as $projet)
                                <li><a href="{{ route('projets.update', $projet->id) }}">{{ $projet->nom }}</a></li>
                            @endforeach
                          </ul>
                        </li>
                        <li><a href="{{ route('empechement.index') }}">Voir les empêchements</a>
                    </ul>
                  </li>

                   <li><a><i class="fa fa-edit"></i> Equipes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('equipes.create') }}">voir les équpes</a></li>
                    </ul>
                  </li>
                  {{-- <li><a><i class="fa fa-edit"></i> Ressources Humaines <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">congés</a></li>
                      <li><a href="#">historiques des connexions</a></li>
                      <li><a href="#">Justification absences</a></li>
                      <li><a href="#">Departements</a></li>
                    </ul>
                  </li> --}}
                   <li><a><i class="fa fa-edit"></i> Evénements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('evenements.index') }}">Calendrier</a></li>
                      <li><a href="{{ route('message.create') }}">Envoyé messages</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings" href="{{ route('user.setting') }}">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="verrouiller la session" href="{{ route('user.lock') }}">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('user.logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
               <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
