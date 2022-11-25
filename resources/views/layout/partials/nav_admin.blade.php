<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="{{ Request::is('admin/index_admin') ? 'active' : '' }}"> 
								<a href="index_admin"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							
							
							<li  class="{{ Request::is('admin/equipmentsA') ? 'active' : '' }}"> 
								<a href="equipmentsA"><i class="fe fe-user-plus"></i> <span>Equipments</span></a>
							</li>

							<li  class="{{ Request::is('admin/contractsA') ? 'active' : '' }}"> 
								<a href="contractsA"><i class="fe fe-user-plus"></i> <span>Contracts</span></a>
							</li>

							<li  class="{{ Request::is('admin/agenciesA') ? 'active' : '' }}"> 
								<a href="agenciesA"><i class="fe fe-user"></i> <span>Agencies</span></a>
							</li>


			

							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->