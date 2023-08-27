<?php
  $page_name='Profile';

  
?>
@include('dashboard.header')
  <div class="wrapper">
    @include ('dashboard.sidenav')

    <div class="main">
    @include('dashboard.top_nav')
			<main class="content">
				 <div class="container-fluid p-0"> 

					<!-- <h1 class="h3 mb-3">Update News</h1> -->

					<div class="row" style="">
						<div class="col-12" style="">
							<div class="card" style="">
								<!-- <div class="card-header">
									<h5 class="card-title mb-0">Update News</h5>
								</div> -->
								<div class="card-body" style="min-height: 100px;overflow-x: auto;">
										<div>
											<div style="display: flex;justify-content: center;align-items: center;">
												<img src="../dacodingsalaf-assets/dashboard-assets/img/photos/avater.png" style="width:80px ">
											</div>
											<div style="font-size: 20px;font-weight:bold;text-align: center;padding: 20px">PROFILES</div> 
										</div>
									<table>
										
										<tr>
											<td>FULLNAME </td> <td><?php echo htmlentities($user_data[0]->firstname)." ".htmlentities($user_data[0]->lastname) ?> </td>
										</tr>

										<tr>
											<td>USERNAME </td> <td><?php echo htmlentities($user_data[0]->username) ?> </td>
										</tr>

										<tr>
											<td>EMAIL </td> <td><?php echo htmlentities($user_data[0]->email) ?> </td>
										</tr>
										<!-- <tr>
											<td>API TOKEN </td> <td><?php echo htmlentities($user_data[0]->user_token) ?></td>
										</tr> -->

										<tr>
											<td>PHONE </td> <td><?php echo htmlentities($user_data[0]->phone) ?></td>
										</tr>
<!-- 
										<tr>
											<td>BANK NAME </td> <td><?php echo htmlentities($user_data[0]->bank_name) ?></td>
										</tr>
										<tr>
											<td>ACCOUNT NUMBER </td> <td><?php echo htmlentities($user_data[0]->bank_account_number) ?></td>
										</tr>

										<tr>
											<td>BVN </td> <td><?php echo htmlentities($user_data[0]->bvn) ?> </td>
										</tr>
 -->
									</table>

									<div style="display:flex;margin-top: 20px;flex-wrap: wrap-reverse;">
										<div style="margin-top: 5px">
										<a href="update-password">
											<button type="button" class="btn btn-primary">Update Password</button>
										</a>
									</div>

									<div style="margin-left: auto" style="margin-top: 5px">
										<a href="update-profile">
											<button type="button" class="btn btn-primary">Edit Profile</button>
										</a>
									</div>

									</div>
									
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://Unifemga.io/" target="_blank"><strong><?php echo $website_info[0]->site_title?></strong></a> &copy;
							</p>
						</div>
						
					</div>
				</div>
			</footer>
		</div>
	</div>

@include('dashboard.footer')

