<?php
include'init.php';
?>
<!-------------------------------------------------- START  PHP CODE ------------------------------------------>
		<?php
			
			$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
				if($do == 'Manage')	{   
		?>		
<!----------------------------------------------- START CREATE TABLE -------------------------------------->
			<div class					=		"container">
				<div class  			=		"row justify-content-center">
					<div class			=		"col-lg-10 bg-light rounded my-2 py-2">
						<table class	=		"table 
												table-borderd 
												table-striped 
												table-hover 
												">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Age</th>
									<th>Company</th>
									<th>Balance</th>
									<th>Currency</th>
									<th>Email</th>
									<th>Phone</th>
								</tr>
							<thead>
							<tbody>
<!----------------------------------------------- FINISH CREATE TABLE -------------------------------------->
		<?php	


		
//----------------------------------------------- START VIEW DATA ------------------------------------------->			
								
								$stmt 		=		 $con->prepare("SELECT * FROM tbl_users  ");
								$stmt->execute();
								$rows 		=		 $stmt->fetchAll();
								
								
								foreach($rows as $row){
									echo "<tr>";
										echo "<td>".$row['id']. "</td>";
										echo "<td>".$row['name']. "</td>";
										echo "<td>".$row['age']. "</td>";
										echo "<td>".$row['company']. "</td>";
										echo "<td>".$row['balance']. "</td>";
										echo "<td>".$row['currency']. "</td>";
										echo "<td>".$row['email']. "</td>";
										echo "<td>".$row['phone']. "</td>";
									echo "</tr>";	
								}
		?>
							</tbody>
							</table>
									<a href="index.php?do=Add" class="manage btn btn-primary"><i class="fa fa-plus" ></i>Add New User</a>	
					</div>
				</div>
			</div>
<!------------------------------------------------- FINISH VIEW DATA ------------------------------------------>	

		<?php
			}elseif ($do == 'Add')
		{?>

<!------------------------------------------------- START ADD USERS ------------------------------------------->
			<h1 class = "text-center">ADD USERS</h1>
				<div class="container">
				<form 
					  class		=	"form-horizontal" 
					  action	=	"?do=Insert" 
					  method	=	"POST">
					  
					<!-- START INPUT NAME -->
					<div class="form-group">
						<label class="col-sm-2 control-label">NAME</label>
							<div class="col-sm-10 col-md-5">
								<input
										type			=		"text"
										name 			=		"name" 
										class			=		"form-control"
										required		=		"required"
										placeholder		=		"Write Your Name"
										onkeyup			=		"letterOnly(this)">
							</div>
					</div>
					<!-- FINISH INPUT NAME -->
					
					<!-- START INPUT AGE -->
					<div class="form-group">
						<label class="col-sm-2 control-label">AGE</label>
							<div class="col-sm-10 col-md-5">
								<input 
										type			=		"number"
										name			=		"age" 
										class			=		"form-control" 
										required		=		"required"
										placeholder		=		"Write Your Age">
							</div>
					</div>
					<!-- FINISH INPUT AGE -->
					
					<!-- START INPUT COMPANY -->
					<div class="form-group">
						<label class="col-sm-2 control-label">COMPANY</label>
							<div class="col-sm-10 col-md-5">
								<input 
										type			=		"text" 
										name			=		"company" 
										class			=		"form-control" 
										required		=		"required" 
										placeholder		=		"Please Write Company Name" 
										onkeyup			=		"letterOnly(this)" >
							</div>
					</div>
					<!-- FINISH INPUT COMPANY -->
					
					<!-- START INPUT BALANCE -->
					<div class="form-group">
						<label class="col-sm-2 control-label">BALANCE</label>
							<div class="col-sm-10 col-md-5">
								<input 
										type			=		"number" 
										name			=		"balance" 
										class			=		"form-control"
										required		=		"required" 
										placeholder		=		"Please Write Balance">
					<!-- SELECT INPUT -->
								<select
										name   			=		"currency">
								<option
										value			=		"PLN">Zóty
								</option>
								<option	
										value  			=		"USD">Dullar
								</option>
								<option
										value			= 		"BHD">BHD
								</option>					
								</select>
							</div>
					</div>
					<!-- FINISH INPUT BALANCE -->
					
					<!-- START INPUT PHONE -->
					<div class="form-group">
						<label class="col-sm-2 control-label">PHONE</label>
							<div class="col-sm-10 col-md-5">
								<input 
										type			=		"number"
										name			=		"phone"
										class			=		"form-control"
										required		=		"required" 
										placeholder		=		"Please Write Your Phone Number">
							</div>
					</div>
					<!-- FINISH INPUT PHONE -->
					
					<!-- START INPUT EMAIL -->
					<div class="form-group">
						<label class="col-sm-2 control-label">EMAIL</label>
							<div class="col-sm-10 col-md-5">
								<input 
										type			=		"email" 
										name			=		"email" 
										class			=		"form-control"
										required		=		"required"
										placeholder 	=		"Please Write Your Email">
							</div>
					</div>
					<!-- FINISH INPUT EMAIL -->
					
					<!-- START BUTTON USER -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" value="Add User"  class="add btn btn-primary">
						<div>
						</div>
					</div>
					<!-- FINISH BUTTON USER -->
					
					
					</form>
				</div>

<!------------------------------------------------- FINISH ADD USERS ------------------------------------------->




		<!------------------------------------------------- START INSERT USERS ----------------------------------------->
		<?php 
			}elseif($do == 'Insert')
					{
			// WRITE HERE TO INSERT
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						echo "<h1 class='text-center'>Insert User</h1>";
						echo "<div class = 'container'>";

								
						// GET VARIABLE FROM THE FORM
						
						$name			 = 		$_POST['name'];
						$age			 = 		$_POST['age'];
						$company 		 = 		$_POST['company'];
						$balance 		 = 		$_POST['balance'];
						$currency 		 = 		$_POST['currency'];
						$phone   		 =      $_POST['phone'];
						$email 	 		 = 		$_POST['email'];
						
						// VALIDATE USER
						$formError  	 = 	    array();
						
						if (strlen($name)< 3 )
						{
							$formError[]  			 =  		'It is not allowed your name less than 3 letters';
						}
						
						if (($age) > 100)
						{
							$formError[]  			 =  		 'Please Check your Age';
						}
						if (empty($company))
						{
							$formError[]  			 =  		 'Password is empty';
						}
						
						foreach($formError as $error )
						{
							redirectupdate($error);
						}
						// CHECK IF YOU DONT HAVE ERROR CONTINUO
						if (empty($formError))
							{
								 // INSERT   DATABASE TO MYSQL
										$stmt = $con->prepare("INSERT INTO 
																		tbl_users
																			(name,
																			 age,
																			 company,
																			 balance,
																			 currency,
																			 phone,
																			 email)
																	VALUES	
																			(:zname,
																			 :zage,
																			 :zcompany,
																			 :zbalance,
																			 :zcurrency,
																			 :zphone,
																			 :zemail)");
										$stmt->execute(array(
												'zname' 		=>		 $name,
												'zage' 			=> 		 $age,
												'zcompany'		=> 		 $company,
												'zbalance'		=> 		 $balance,
												'zcurrency'		=> 		 $currency,
												'zphone'		=> 		 $phone,
												'zemail'		=> 		 $email
										));
/********************************************* FINISH ************************************************************/
					}
										// ECHO SUCCESS MESSAGE
										$errormsg 				=		  'Insert new name ';
										redirectinsert($errormsg);
			
							}else{
										$errormsg				=		  'Is not avaliable login directly you must to back to the home page ';
							}			redirecthome($errormsg,3);
							}
											echo '</div>';			
//------------------------------------------------- FINISH INSERT USERS ---------------------------------------->
				echo "</div>";	
											
		?>
<!------------------------------------------------- START INCLUDE FOOTER --------------------------------------->
<?php
	include 'Template/footer.php';
?>				
<!------------------------------------------------- FINISH INCLUDE FOOTER --------------------------------------->