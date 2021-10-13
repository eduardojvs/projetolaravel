 <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Principal</li>

                        <li>
                            <a href="{{route('dashboard.index')}}" class="waves-effect">
                                <i class="mdi mdi-home-variant"></i>
                                <span>Home</span>
                            </a>
                        </li>

                        @if(Auth::user()->level >= 3)
                            <li>
                                <a href="{{route('calendar.index')}}" class="waves-effect">
                                    <i class="mdi mdi-calendar-check"></i>
                                    <span>Calendário</span>
                                </a>
                            </li>
                        @endif


                        @if(Auth::user()->level >= 1)
                            <li class="menu-title">Sistema</li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="mdi mdi-clipboard-outline"></i>
                                    <span>Adm</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/usuario">                         <i class="fas fa-user">        </i> Usuários      </a> </li>
                                    @if(Auth::user()->level >= 3)
                                        <li><a href="/grupo">                           <i class="fas fa-users">       </i> Grupos        </a> </li>
                                        <li><a href="/rotina">                          <i class="fas fa-cogs">        </i> Rotinas       </a> </li>
                                        <li><a href="/acao">                            <i class="fas fa-wrench">      </i> Ações         </a> </li>
                                        <li><a href="{{route('sistemas.index')}}">      <i class="fas fa-sitemap">     </i> Sistemas      </a> </li>
                                        <li><a href="{{route('requisitos.index')}}">    <i class="fas fa-list">        </i> Requisitos    </a> </li>
                                        <li><a href="{{route('soaps.index')}}">         <i class="fas fa-soap">        </i> Soap          </a> </li>

                                        <li><a href="{{route('agendamentos.index')}}">  <i class="fas fa-user-clock">  </i> Processo Automático </a> </li>
                                        <li><a href="{{route('kanban.index')}}">        <i class="far fa-sticky-note"> </i> Kanban        </a> </li>
                                        <li><a href="{{route('gantt.index')}}">         <i class="fas fa-chart-line">  </i> Gantt         </a> </li>
                                        <li><a href="{{route('configs.index')}}">       <i class="fas fa-cog">         </i> Configurações </a> </li>

                                    @endif
                                </ul>
                            </li>

                        @endif

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
