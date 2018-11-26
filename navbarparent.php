<?php

	require("connection.php");
    session_start();
    $passing_id = $_SESSION['passing_id'];
	$passing_nama = $_SESSION['first_name'];
	//$passing_pilihan_kategori = $_SESSION['passing_pilihan_kategori'];

	function displayNavbar(){
		?><nav class="navbar border-bottom navbar-dark bg-white navbar-fixed-top" id="navbar_user">
		<div class="col-md-1 col-sm-2 col-xs-8">
			<a style="margin:0; text-decoration: none;"href="dashboard.php">
				<font size="6"><span class="text-primary">N</span><span class="text-danger">o</span><span class="text-warning">t</span><span class="text-success">y</span></font>
			</a>
		</div>

		<!-- <div class="col-md-1 col-sm-2 col-xs-4">
			<a href="" class="glyphicon glyphicon-arrow-left white"></a>
		</div> -->

		<div class="col-md-6 col-sm-10 col-xs-16">
			<form action="/action_page.php">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="search" value="">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>

		<span class="col-md-2">
			<a href="#" class="white">Hi <?php global $passing_nama; echo $passing_nama?></a>
		</span>
		<span class="col-md-1">
			<a href="profiledit.php" class="white"><span class="glyphicon glyphicon-user white"></span></a>
		</span>
		
		<span style="text-align: end;" class="col-md-2" id="logout_icon">
			<a href="#" class="white"><span class="glyphicon glyphicon-log-out white"></span> Logout</a>
		</span>
	</nav>	
	<?php 
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function displaySideNavbar($kategori_pilihan){
		?>
		<div class="sidenav border-right bg-white col-md-4" >
			<p class="text-dark tengah turun">Note Categories</p>

			<?php
			include("connection.php");
			global $passing_id;
			// $queryAmbilListNote = $koneksi->prepare("select category_name from mscategory where id_user = ?");
			// $list_category = $queryAmbilListNote->execute([$passing_id]);
			$list_category = $koneksi->query("select category_name, id_category from mscategory where id_user = $passing_id");
			//global $kategory_pilihan;
			while($tampung = $list_category->fetch()){
				$a = $tampung['category_name'];
				$b = $tampung['id_category'];
				
				if($b == $kategori_pilihan){
					echo "<a href='dashboard.php?ctg=$b' class='text-dark' style='color:crimson;'>".$a.'</a>';
				} else {
					echo "<a href='dashboard.php?ctg=$b' class='text-dark'>".$a.'</a>';
				}
				
			}
			?>

			<!-- <a href="#about" class="text-dark">Default</a> -->
			<!-- <a href="#services" class="text-dark">Kampus</a>
			<a href="#clients" class="text-dark">Kerja</a>
			<a href="#contact" class="text-dark">Others</a> -->
			<div>
				<button type="button" class="btn btn-lg btn-primary addnew" style="margin: 10px; width: 100px;">Edit</button>
				<button type="button" class="btn btn-lg btn-primary addnew" style="margin: 10px;width:100px;">New</button>
			</div>
			
		</div>
		<?php
	}

?>
