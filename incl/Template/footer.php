
<!------------------------------------------------- START LINKS ------------------------------------------------>		
<script src		=		"https://code.jquery.com/jquery-3.5.1.slim.min.js">							</script>
<script src		=		"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">		</script>
<script src		=		"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">	</script>		
<script src		=		"https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">			</script>
<script src		=		"https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">		</script>
<script type	=		"text/javascript">
		$(document).ready(function(){
			$('table').DataTable();
			
		});
		
		$('.table').DataTable({
		searching:true,
		ordering: true,
		lengthMenu: [[9,18,27,-1],[9,18,27,"All"]]
	});
		function letterOnly(input){
		var regex = /[^a-z]/gi;
		input.value = input.value.replace(regex,"");
		}
	</script>
<!------------------------------------------------- FINISH LINKS ------------------------------------------------>	
</body>
</html>
