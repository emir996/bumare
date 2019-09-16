<?php
	require_once '../../config/config.php';

	include '../inc/header.php';
 	include '../inc/nav.php';
?>

<div class="table-wrapper">
	<h2 class="table-heading text-center text-dark">Data table with text of bumare</h2>
	<div class="jumbotron bg-white">
		<div class="table-responsive-sm">
			
			<table id="table_text" class="table table-hover table-striped table-bordered btn-table">
				<thead>
					<input type="text" name="search_input" id="search_input" onkeyup="search_text()" placeholder="Search" class="form-control" />
					<tr class="text-center text-white">
						<th>Num</th>
						<th>Key</th>
						<th>
							<select id="sel_lang" onchange="changeView(this)">
								<option value="1">All</option>
								<option>English</option>
								<option>German</option>
								<option>Bosnian</option>
							</select>
						</th>
						<th>Text</th>
						<th>Edit</th>
						<th>Delete</th>
								    
					</tr>
				</thead>
				<tbody>
					<!-- data table loaded here -->
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include '../inc/modals.php'; ?>








