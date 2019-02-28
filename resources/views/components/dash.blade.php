

<div id="dashboard_side_menu">
			<ul id="dashboard_leftmenu">
	            <li class="main-menu selected">



		            <a href="/profile/{{ Auth::user()->id }}/Orders">
		                <p class="icons-holder">
		                <i class="fas fa-box"></i>
		                    Ordini                    
		                </p>
		            </a>
	            </li>
	            <li class="main-menu">
		            <a href="/profile/{{ Auth::user()->id }}/addbook">
		                <p class="icons-holder">
		                <i class="fas fa-map-marked-alt"></i>
		                    Rubrica indirizzi                    
		                </p>
		            </a>
	            </li>
	            <li class="main-menu">

			             <a href="/profile/{{ Auth::user()->id }}/accounts">
			                <p class="icons-holder">
			               <i class="fas fa-user"></i>
			                    Dati dell'account                    
			                </p>
			            </a>
	            </li>
        	</ul>
	</div>