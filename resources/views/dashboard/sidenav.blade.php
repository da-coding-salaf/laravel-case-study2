<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="#">
          <span class="align-middle"><?php echo $website_info[0]->site_title?></span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-item 
					<?php
						if(basename($_SERVER["SCRIPT_FILENAME"])=='index.php'){
						echo 'active';
					}
						?>
					">
						<a class="sidebar-link" href="index">
              <i class="align-middle" style="color:#012970" data-feather="sliders"></i> <span class="align-middle">Sell-Airtime</span>
            </a>
					</li>

					<li class="sidebar-item <?php
						if(basename($_SERVER["SCRIPT_FILENAME"])=='user-transactions.php'){
						echo 'active';
					}
						?>">

						<a class="sidebar-link" href="user-transactions">
             <i class="bi bi-folder2" style=""></i> <span class="align-middle" >Transactions</span>
            </a>
					</li>


						<!-- <li class="sidebar-item <?php
						if(basename($_SERVER["SCRIPT_FILENAME"])=='fund-wallet.php'){
						echo 'active';
					}
						?>">

						<a class="sidebar-link" href="fund-wallet">
              <i class="bi bi-wallet2" ></i> <span class="align-middle">Fund Wallet</span>
            </a>
					</li> -->

				<!-- 	<div style="">
						<li class="sidebar-item <?php
						if(basename($_SERVER["SCRIPT_FILENAME"])=='fund-wallet.php'){
						echo 'active';
					}
						?>">

						<a class="sidebar-link" href="fund-wallet">
              <i class="bi bi-credit-card-2-back"></i> <span class="align-middle">Atm Funding</span>
            </a>
					</li>


					<li class="sidebar-item <?php
						if(basename($_SERVER["SCRIPT_FILENAME"])=='manual-funding.php'){
						echo 'active';
					}
						?>">

						<a class="sidebar-link" href="manual-funding">
              <i class="bi bi-cash"></i><span class="align-middle">Manual Funding</span>
            </a>
					</li>

					</div> -->


					<!-- <li class="sidebar-item <?php
						if(basename($_SERVER["SCRIPT_FILENAME"])=='api-doc.php'){
						echo 'active';
					}
						?>">

						<a class="sidebar-link" href="api-doc">
              <i class="bi bi-code-slash"></i> <span class="align-middle">Api Docs</span>
            </a>
					</li> -->


					<li class="sidebar-item <?php
						if(basename($_SERVER["SCRIPT_FILENAME"])=='user-profile.php'){
						echo 'active';
					}
						?>">

						<a class="sidebar-link" href="user-profile">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>

					<li class="sidebar-item <?php
						if(basename($_SERVER["SCRIPT_FILENAME"])=='support.php'){
						echo 'active';
					}
						?>">

						<a class="sidebar-link" href="support">
              <i class="align-middle" data-feather="info"></i> <span class="align-middle">Support</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('log-out')}}">
              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign Out</span>
            </a>
					</li>

					

					

					<!-- <li class="sidebar-header">
						Tools & Components
					</li> -->

					

				

				</ul>

				
			</div>
		</nav>