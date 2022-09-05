$(document).ready(function(){
	showAllUsers();

	function showAllUsers() {
	   	$.ajax({
		    url:"action.php",
			type:"POST",
			data:{action:"view"},
			success:function (response) {
			    //console.log(response);
			    $("#showUser").html(response);
			    $("table").DataTable({
					language: {
						url: "assets/json/french.json"
					},
					//order:[0,'desc']
				});
			}
		});
	}

	$("#insert").click(function(e){
		if ($("#form-data")[0].checkValidity()){
			e.preventDefault();
		  	$.ajax({
				url:"action.php",
				type:"POST",
				data:$("#form-data").serialize()+"&action=insert",
				success:function(response){
		    		//console.log(response);
		    		swal("Génial!", "Cet utilisateur est bien enregistrée!!!", "success");
		    		$("#form-data")[0].reset();
		    		$("#addModal").modal('hide');
		    		showAllUsers();
		    	}
		    });
		}
	});

	$("body").on("click",".editBtn",function(e) {
		e.preventDefault();
		edit_id = $(this).attr('id');
		$.ajax({
			url:"action.php",
			type:"POST",
			data:{edit_id:edit_id},
			success:function(response){
				data = JSON.parse(response);
				$("#id").val(data.id);
				$("#nom").val(data.nom);
				$("#prenom").val(data.prenom);
				$("#email").val(data.email);
				$("#phone").val(data.phone);
			}
		});
	})

	$("#modifie").click(function(e){
		if ($("#edit-form-data")[0].checkValidity()){
			e.preventDefault();
		  	$.ajax({
				url:"action.php",
				type:"POST",
				data:$("#edit-form-data").serialize()+"&action=modifie",
				success:function(response){
		    		//console.log(response);
		    		swal("Génial!", "Cet utilisateur est bien modifée!!!", "success");
		    		$("#edit-form-data")[0].reset();
		    		$("#editModal").modal('hide');
		    		showAllUsers();
		    	}
		    });
		}
	});

	$("body").on("click",".delBtn", function(e){
		e.preventDefault();

		var tr = $(this).closest('tr');
		del_id = $(this).attr('id');

		swal("Etes-vous sure?", "Voulez-vous le supprimer!",{
			icon : "warning",
			buttons:{
				confirm: {
					text : 'Oui,Supprimer',
					className : 'btn btn-success'
				},
				cancel: {
					visible: true,
					className: 'btn btn-danger'
				}
			}
		}).then((Delete) => {
			if (Delete) {
				$.ajax({
					url: 'action.php',
					method:'post',
					data : {del_id : del_id},
					success:function(response){
						tr.css("background-color","#ff6666");
						swal({
							title: 'Supprimée!',
							text: 'Cet utilisateur est suprimé!',
							type: 'success',
							buttons : {
								confirm: {
									className : 'btn btn-success'
								}
							}
						});
						showAllUsers();
					}
				});
			}
		});
	});

	$("body").on("click",".infoBtn",function(e){
		e.preventDefault();
		info_id = $(this).attr('id');

		$.ajax({
			url:'action.php',
			method:'post',
			data : {info_id : info_id},
			success:function(response){
				data = JSON.parse(response);
				swal({
					title: '<strong>Utilisateur Info: ID('+data.id+')<strong>',
					type :'info',
					html : '<b>Nom : </b>'+data.nom+'<br><br><b>Prénom : </b>'+data.prenom+'<br><br><b>E-mail : </b>'+data.email+'<br><br><b>N° Téléphone : </b>'+data.phone,
					showCloseButton : true,
				});
			}
		});
	});
});