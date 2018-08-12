<!-- Scripts -->



{{-- Sidebar Navigation --}}
<script type="text/javascript">
	$("#menu").click(function(e){
		e.preventDefault();
		$('.sidebar').toggle('slide', { direction: 'left' }, 500);
		$('.content').animate({
			'margin-left' : $('.content').css('margin-left') == '0px' ? '220px' : '0px'
		}, 500);
	});
</script>

{{--/////////////////////////// User Script  ///////////////////////////--}}
<script type="text/javascript">
	$(document).ready(function() {
		

		// Open Ban Model Box
		$(document).on('click', '.bandata', function(e) {
			var id=$(this).attr("data-id");
			$("#bans").attr("data-id",id);
		});
		// Ban Data
		$(document).on('click', '#bans', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			$.ajax({
				type: 'get',
				url: '/matchup/user/banuser',
				data: {
					'id': id
				},
				success: function(data) {
					$('.status' + id).html('Banned')	
					$( ".ban"+id).replaceWith("<a href='' title='Unban' data-toggle='modal' data-target='#unbanmodal' data-id='"+ id +"' class='btn btn-outline-danger unban"+ id +" unbandata'>Unban</a>");				
					$('#banmodal').modal('hide')
				}
			});
		});

		// Open Unban Model Box
		$(document).on('click', '.unbandata', function(e) {
			var id=$(this).attr("data-id");
			$("#unbans").attr("data-id",id);
		});

		// Ban Data
		$(document).on('click', '#unbans', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			$.ajax({
				type: 'get',
				url: '/matchup/user/unbanuser',
				data: {
					'id': id
				},
				success: function(data) {
					$('.status' + id).html('Active')	
					$( ".unban"+id).replaceWith("<a href='' title='ban' data-toggle='modal' data-target='#banmodal' data-id='"+ id +"' class='btn btn-outline-danger ban"+ id +" bandata'>Ban</a>");				
					$('#unbanmodal').modal('hide')
				}
			});
		});


		// User Search
		$(document).on('input', '.usersearch', function(event) {
			event.preventDefault();
			
			var value = $(this).val();

			$.ajax({
				url : "/matchup/user/search",
				type: "GET",
				data: {'value':value},
				dataType: "JSON",
				success: function (data) {
					$("#user").empty();
					var j = 1;
					if (data.data.length == '') {
						$('#user').append("<tr><td colspan='5'><strong style='color: #4c4c4c;font-size: 18px;'>No Data Available</strong></td></tr>")
					}
					else{
						for (i = 0; i < data.data.length; i++) { 
							var id = data.data[i].user_id
							var name = data.data[i].name
							var email = data.data[i].email
							var level = data.data[i].user_level
							var status = data.data[i].status

							if (status == '0') {
								$('#user').append("<tr class='user"+ id +"' ><td>"+ j +"</td><td class='name"+ id +"'>"+ name +"</td><td class='email"+ id +"'>"+ email +"</td><td class='level"+ id +"'>"+ level +"</td><td class='status"+ id +"'>  Banned </td><td><a href='/matchup/user/view/"+ id +"' data-id='"+ id +"' class='btn btn-outline-info editdata'>View</a><a href='' title='Unban' data-toggle='modal' data-target='#unbanmodal' data-id='"+ id +"' class='btn btn-outline-danger unban"+ id +"unbandata' style='margin-left:4px;'>Unban</a></td></tr>")
							}
							else{
								$('#user').append("<tr class='user"+ id +"' ><td>"+ j +"</td><td class='name"+ id +"'>"+ name +"</td><td class='email"+ id +"'>"+ email +"</td><td class='level"+ id +"'>"+ level +"</td><td class='status"+ id +"'>  Active </td><td><a href='/matchup/user/view/"+ id +"' data-id='"+ id +"' class='btn btn-outline-info editdata'>View</a><a href='' title='Ban' data-toggle='modal' data-target='#banmodal' data-id='"+ id +"' class='btn btn-outline-danger ban"+ id +" bandata' style='margin-left:4px;'>Ban</a></td></tr>")
							}
							j++
						}
					}
				},
				error: function (textStatus, errorThrown) {
				}
			}); 

		});


	});
</script>






{{--/////////////////////////// Guest Message Script  ///////////////////////////--}}

<script type="text/javascript">
	$(document).ready(function() {
		// Open Unban Model Box
		$(document).on('click', '.guestmessagedelete', function(e) {
			var id=$(this).attr("data-id");
			$("#deleteguestmessage").attr("data-id",id);
		});

		// Delete Data
		$(document).on('click', '#deleteguestmessage', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			$.ajax({
				type: 'get',
				url: '/matchup/guestmessage/delete',
				data: {
					'id': id
				},
				success: function(data) {
					$( ".guestmessage"+id).remove()				
					$('#guestmessagedeletemodal').modal('hide')
				}
			});
		});

		// Guest Message Search
		$(document).on('input', '.guestmessagesearch', function(event) {
			event.preventDefault();
			
			var value = $(this).val();

			$.ajax({
				url : "/matchup/guestmessage/search",
				type: "GET",
				data: {'value':value},
				dataType: "JSON",
				success: function (data) {
					$("#guestmessage").empty();
					var j = 1;
					if (data.data.length == '') {
						$('#guestmessage').append("<tr><td colspan='5'><strong style='color: #4c4c4c;font-size: 18px;'>No Data Available</strong></td></tr>")
					}
					else{
						for (i = 0; i < data.data.length; i++) { 
							var id = data.data[i].id
							var title = data.data[i].title
							var relation = data.data[i].relation
							var date = data.data[i].created_at

							$('#guestmessage').append("<tr class='guestmessage"+ id +"' ><td>"+ j +"</td><td class='guestmessage"+ id +"'>"+ title +"</td><td class='guestmessage"+ id +"'>"+ relation +"</td><td class='guestmessage"+ id +"'>  "+ date +" </td> <td><a href='/matchup/guestmessage/view/"+ id +"' data-id='"+ id +"' class='btn btn-outline-info' style='margin-right:3px;'>View</a><a href='/matchup/guestmessage/edit/"+ id +"' title='edit' class='btn btn-outline-success' style='margin-right:3px;'>Edit</a><a href='' title='delete' data-toggle='modal' data-target='#guestmessagedeletemodal' data-id='"+ id +"'' class='btn btn-outline-danger guestmessagedelete'>Delete</a></td> </tr>")
							
							j++
						}
					}
				},
				error: function (textStatus, errorThrown) {
				}
			}); 

		});


	});
</script>










{{--/////////////////////////// Success Story Script  ///////////////////////////--}}

<script type="text/javascript">
	$(document).ready(function() {
		// Open Delete Model Box
		$(document).on('click', '.successstorydelete', function(e) {
			var id=$(this).attr("data-id");
			$("#deletesuccessstory").attr("data-id",id);
		});

		// Delete Data
		$(document).on('click', '#deletesuccessstory', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			$.ajax({
				type: 'get',
				url: '/matchup/success-story/delete',
				data: {
					'id': id
				},
				success: function(data) {
					$( ".successstory"+id).remove()				
					$('#successstorydeletemodal').modal('hide')
				}
			});
		});

		// Success Story Search
		$(document).on('input', '.successstorysearch', function(event) {
			event.preventDefault();
			
			var value = $(this).val();

			$.ajax({
				url : "/matchup/success-story/search",
				type: "GET",
				data: {'value':value},
				dataType: "JSON",
				success: function (data) {
					$("#successstory").empty();
					var j = 1;
					if (data.data.length == '') {
						$('#successstory').append("<tr><td colspan='5'><strong style='color: #4c4c4c;font-size: 18px;'>No Data Available</strong></td></tr>")
					}
					else{
						for (i = 0; i < data.data.length; i++) { 
							var id = data.data[i].id
							var title = data.data[i].title
							var date = data.data[i].created_at

							$('#successstory').append("<tr class='successstory"+ id +"' ><td>"+ j +"</td><td class='successstory"+ id +"'>"+ title +"</td><td class='successstory"+ id +"'>  "+ date +" </td> <td><a href='/matchup/success-story/view/"+ id +"' data-id='"+ id +"' class='btn btn-outline-info' style='margin-right:3px;'>View</a><a href='/matchup/success-story/edit/"+ id +"' title='edit' class='btn btn-outline-success' style='margin-right:3px;'>Edit</a><a href='' title='delete' data-toggle='modal' data-target='#successstorydeletemodal' data-id='"+ id +"'' class='btn btn-outline-danger successstorydelete'>Delete</a></td> </tr>")
							
							j++
						}
					}
				},
				error: function (textStatus, errorThrown) {
				}
			}); 

		});


	});
</script>











{{--/////////////////////////// Admin Script  ///////////////////////////--}}
<script type="text/javascript">
	$(document).ready(function() {
		// Open Delete Model Box
		$(document).on('click', '.admindelete', function(e) {
			var id=$(this).attr("data-id");
			$("#deleteadmin").attr("data-id",id);
		});

		// Delete Data
		$(document).on('click', '#deleteadmin', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			$.ajax({
				type: 'get',
				url: '/matchup/admin/delete',
				data: {
					'id': id
				},
				success: function(data) {
					$( ".admin"+id).remove()				
					$('#admindeletemodal').modal('hide')
				}
			});
		});

		// Success Story Search
		$(document).on('input', '.adminsearch', function(event) {
			event.preventDefault();
			
			var value = $(this).val();

			$.ajax({
				url : "/matchup/admin/search",
				type: "GET",
				data: {'value':value},
				dataType: "JSON",
				success: function (data) {
					$("#admin").empty();
					var j = 1;
					if (data.data.length == '') {
						$('#admin').append("<tr><td colspan='5'><strong style='color: #4c4c4c;font-size: 18px;'>No Data Available</strong></td></tr>")
					}
					else{
						for (i = 0; i < data.data.length; i++) { 
							var id = data.data[i].id
							var name = data.data[i].name
							var email = data.data[i].email
							var role = data.data[i].role
							
							$('#admin').append("<tr class='admin"+ id +"' ><td>"+ j +"</td><td class='admin"+ id +"'>"+ name +"</td><td class='admin"+ id +"'>  "+ role +" </td> <td class='admin"+ id +"'>"+ email +"</td> <td><a href='/matchup/admin/view/"+ id +"' data-id='"+ id +"' class='btn btn-outline-info' style='margin-right:3px;'>View</a><a href='' title='delete' data-toggle='modal' data-target='#admindeletemodal' data-id='"+ id +"'' class='btn btn-outline-danger admindelete'>Delete</a></td> </tr>")
							
							j++
						}
					}
				},
				error: function (textStatus, errorThrown) {
				}
			}); 

		});


	});
</script>




{{--/////////////////////////// Membership Script  ///////////////////////////--}}
<script type="text/javascript">
	$(document).ready(function() {
		// Open Membership Approved Box
		$(document).on('click', '.membershipapproved', function(e) {
			var id=$(this).attr("data-id");
			$("#approved").attr("data-id",id);
		});

		// Approved Membership
		$(document).on('click', '#approved', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			window.location="/matchup/membership/approved/"+id;
		});


		// Open Membership Reject Model Box
		$(document).on('click', '.membershipreject', function(e) {
			var id=$(this).attr("data-id");
			$("#reject").attr("data-id",id);
		});

		// Reject Membership
		$(document).on('click', '#reject', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			window.location="/matchup/membership/reject/"+id;
		});


		// Membership Search
		$(document).on('input', '.membershipsearch', function(event) {
			event.preventDefault();
			
			var value = $(this).val();

			$.ajax({
				url : "/matchup/membership/search",
				type: "GET",
				data: {'value':value},
				dataType: "JSON",
				success: function (data) {
					$("#membership").empty();
					var j = 1;
					if (data.data.length == '') {
						$('#membership').append("<tr><td colspan='8'><strong style='color: #4c4c4c;font-size: 18px;'>No Data Available</strong></td></tr>")
					}
					else{
						for (i = 0; i < data.data.length; i++) { 
							var id = data.data[i].mem_id
							var profile_id = data.data[i].profile_id
							var level = data.data[i].level
							var payment_option = data.data[i].payment_option
							var created_at = data.data[i].created_at
							var transaction_id = data.data[i].transaction_id
							var status = data.data[i].status
							
							$('#membership').append("<tr class='membership' ><td>"+ j +"</td><td class=''>"+ profile_id +"</td><td class=''>  "+ level +" </td> <td class=''>"+ payment_option +"</td> <td class=''>  "+ transaction_id +" </td> <td class=''>  "+ created_at +" </td> <td class=''>  "+ status +" </td> <td>  <a href='' style='margin-right:3px;' data-toggle='modal' data-target='#membershipapproved' class='btn btn-outline-success membershipapproved' data-id='"+ id +"'>Approved</a><a href='' title='reject' data-toggle='modal' data-target='#membershipreject' data-id='"+ id +"'' class='btn btn-outline-danger membershipreject'>Reject</a>  </td> </tr>")
							
							j++
						}
					}
				},
				error: function (textStatus, errorThrown) {
				}
			}); 

		});


	});
</script>










{{--/////////////////////////// Subscriber Script  ///////////////////////////--}}

<script type="text/javascript">
	$(document).ready(function() {
		// Open Unban Model Box
		$(document).on('click', '.subscriberdelete', function(e) {
			var id=$(this).attr("data-id");
			$("#deletesubscriber").attr("data-id",id);
		});

		// Delete Data
		$(document).on('click', '#deletesubscriber', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			$.ajax({
				type: 'get',
				url: '/matchup/subscriber/delete',
				data: {
					'id': id
				},
				success: function(data) {
					$( ".subscriber"+id).remove()				
					$('#subscriberdeletemodal').modal('hide')
				}
			});
		});

		// Guest Message Search
		$(document).on('input', '.subscribersearch', function(event) {
			event.preventDefault();
			
			var value = $(this).val();

			$.ajax({
				url : "/matchup/subscriber/search",
				type: "GET",
				data: {'value':value},
				dataType: "JSON",
				success: function (data) {
					$("#subscriber").empty();
					var j = 1;
					if (data.data.length == '') {
						$('#subscriber').append("<tr><td colspan='5'><strong style='color: #4c4c4c;font-size: 18px;'>No Data Available</strong></td></tr>")
					}
					else{
						for (i = 0; i < data.data.length; i++) { 
							var id = data.data[i].id
							var email = data.data[i].email
							var date = data.data[i].created_at

							$('#subscriber').append("<tr class='subscriber"+ id +"' ><td>"+ j +"</td><td class='subscriber"+ id +"'>"+ email +"</td><td class='subscriber"+ id +"'>  "+ date +" </td> <td><a href='' title='delete' data-toggle='modal' data-target='#subscriberdeletemodal' data-id='"+ id +"'' class='btn btn-outline-danger subscriberdelete'>Delete</a></td> </tr>")
							
							j++
						}
					}
				},
				error: function (textStatus, errorThrown) {
				}
			}); 

		});


	});
</script>
























{{--/////////////////////////// Membership Level  ///////////////////////////--}}
<script type="text/javascript">
	$(document).ready(function() {
		
		// Open Edit Model Box
		$(document).on('click', '.editmembershiplevel', function(e) {
			var id=$(this).attr("data-id");
			
			var level = $('.level'+id).html()
			var price = $('.price'+id).html()
			var expiration = $('.expiration'+id).html()

			$('#ml_id').val(id)
			$('#level').val(level)
			$('#price').val(price)
			$('#expiration').val(expiration)

		});

		// Open Delete Model Box
		$(document).on('click', '.deletemembershiplevel', function(e) {
			var id=$(this).attr("data-id");
			$("#deletemembershiplevel").attr("data-id",id);
		});

		// Delete Data
		$(document).on('click', '#deletemembershiplevel', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			$.ajax({
				type: 'get',
				url: '/matchup/membershiplevel/setting/delete',
				data: {
					'id': id
				},
				success: function(data) {
					$( ".membershiplevel"+id).remove()				
					$('#membershipleveldelete').modal('hide')
				}
			});
		});

		// Success Membership Level
		$(document).on('input', '.membershiplevelsearch', function(event) {
			event.preventDefault();
			
			var value = $(this).val();

			$.ajax({
				url : "/matchup/membershiplevel/setting/search",
				type: "GET",
				data: {'value':value},
				dataType: "JSON",
				success: function (data) {
					$("#membershiplevel").empty();
					var j = 1;
					if (data.data.length == '') {
						$('#membershiplevel').append("<tr><td colspan='5'><strong style='color: #4c4c4c;font-size: 18px;'>No Data Available</strong></td></tr>")
					}
					else{
						for (i = 0; i < data.data.length; i++) { 
							var id = data.data[i].id
							var level = data.data[i].level
							var price = data.data[i].price
							var expiration = data.data[i].time
							
							$('#membershiplevel').append("<tr class='membershiplevel"+ id +"' ><td>"+ j +"</td><td class='level"+ id +"'>"+ level +"</td><td class='price"+ id +"'>  "+ price +" </td> <td class='expiration"+ id +"'>"+ expiration +" Days</td> <td><a href='' title='approved' data-toggle='modal' data-target='#membershipleveledit' data-id='"+ id +"' class='btn btn-outline-info editmembershiplevel' style='margin-right:3px;'>Edit</a><a href='' title='delete' data-toggle='modal' data-target='#membershipleveldelete' data-id='"+ id +"'' class='btn btn-outline-danger deletemembershiplevel'>Delete</a></td> </tr>")
							
							j++
						}
					}
				},
				error: function (textStatus, errorThrown) {
				}
			}); 

		});


	});
</script>






















{{--/////////////////////////// Guest Message Script  ///////////////////////////--}}

<script type="text/javascript">
	$(document).ready(function() {
		// Open Unban Model Box
		$(document).on('click', '.meetingdelete', function(e) {
			var id=$(this).attr("data-id");
			$("#deletemeeting").attr("data-id",id);
		});

		// Delete Data
		$(document).on('click', '#deletemeeting', function(e) {
			e.stopPropagation(); 
			var id=$(this).attr("data-id");
			$.ajax({
				type: 'get',
				url: '/matchup/meeting/delete',
				data: {
					'id': id
				},
				success: function(data) {
					$( ".meeting"+id).remove()				
					$('#meetingdeletemodal').modal('hide')
				}
			});
		});

		// Guest Message Search
		$(document).on('input', '.meetingsearch', function(event) {
			event.preventDefault();
			
			var value = $(this).val();

			$.ajax({
				url : "/matchup/meeting/search",
				type: "GET",
				data: {'value':value},
				dataType: "JSON",
				success: function (data) {
					$("#meeting").empty();
					var j = 1;
					if (data.data.length == '') {
						$('#meeting').append("<tr><td colspan='7'><strong style='color: #4c4c4c;font-size: 18px;'>No Data Available</strong></td></tr>")
					}
					else{
						for (i = 0; i < data.data.length; i++) { 
							var id = data.data[i].id
							var profile_id = data.data[i].profile_id
							var name = data.data[i].name
							var phone = data.data[i].phone
							var date = data.data[i].date

							$('#meeting').append("<tr class='meeting"+ id +"' ><td>"+ j +"</td><td class='meeting"+ id +"'>"+ profile_id +"</td><td class='meeting"+ id +"'>"+ name +"</td><td class='meeting"+ id +"'>  "+ phone +" </td> <td class='meeting"+ id +"'>  "+ date +" </td> <td><a href='/matchup/meeting/view/"+ id +"' data-id='"+ id +"' class='btn btn-outline-info' style='margin-right:3px;'>View</a> <a href='' title='delete' data-toggle='modal' data-target='#meetingdeletemodal' data-id='"+ id +"'' class='btn btn-outline-danger meetingdelete'>Delete</a></td> </tr>")
							
							j++
						}
					}
				},
				error: function (textStatus, errorThrown) {
				}
			}); 

		});


	});
</script>