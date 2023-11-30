
function eMsg(params){
	alert("Error: L"+params+"+");
}


$(document).on('submit', '#form-login', function(event) {
	event.preventDefault();
	
	var un = $('#un').val();
	var up = $('#up').val();

	$.ajax({
			url: 'data/login_user.php',
			type: 'post',
			dataType: 'json',
			data: {
				un:un,
				up:up
			},
			success: function (data) {
				console.log(data);
				if(data.logged == true){
					window.location = data.url;
				}else{
					alert(data.msg);
					$('#un').focus();
				}
			},
			error: function(){
				alert('Error: L17+');
			}
		});
});

function showAllItem()
{
	$.ajax({
			url: 'data/all_item.php',
			success: function (data) {
				$('#all-item').html(data);
			},
			error: function(){
				alert('Error: L42+');
			}
		});
}
showAllItem();

$('#add-new-item').click(function(event) {

	$('#modal-item').find('.modal-title').text('Agregar producto');
	$('#modal-item').modal('show');
	$('#submit-item').val('add');
});

$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	
	var iName = $('#item-name').val();
	var iPrice = $('#item-price').val();
	var iType = $('#item-type').val();
	var code = $('#code').val();
	var brand = $('#brand').val();
	var grams = $('#grams').val();
    if($('#submit-item').val() == "add"){
    	
	    $.ajax({
	    		url: 'data/add_item.php',
	    		type: 'post',
	    		dataType: 'json',
	    		data: {
	    			iName:iName,
	    			iPrice:iPrice,
	    			iType:iType,
	    			code:code,
	    			brand:brand,
	    			grams:grams
	    		},
	    		success: function (data) {
	    			console.log(data);
	    			if(data.valid == true){
	    				$('#modal-message').find('#msg-body').text(data.msg);
	    				$('#modal-item').modal('hide');
	    				showAllItem();
	    				$('#modal-message').modal('show');
	    				$('#submit-item').val('null');
	    			}
	    		},
	    		error: function(){
	    			eMsg('70');
	    		}//
	    	});
    }
});


function editModal(item_id){
	//
	$.ajax({
			url: 'data/get_item.php',
			type: 'post',
			dataType: 'json',
			data: {
				item_id:item_id
			},
			success: function (data) {
				$('#submit-item').val(data.event);
				$('#item-name').val(data.name);
				$('#item-price').val(data.price);
				$('#item-id').val(data.id);
				$('#code').val(data.code);
				$('#brand').val(data.brand);
				$('#grams').val(data.grams);
				$('#item-type').val(data.type);
				$('#modal-item').find('.modal-title').text("Editar producto");
				$('#modal-item').modal('show');
			},
			error: function(){
				alert('Error: L56+');
			}
		});
}//

//
$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	
	var submit = $('#submit-item').val();
	var item_id = $('#item-id').val();

	var iName = $('#item-name').val();
	var iPrice = $('#item-price').val();
	var iType = $('#item-type').val();
	var code = $('#code').val();
	var brand = $('#brand').val();
	var grams = $('#grams').val();

	if(submit  == "edit"){
		$.ajax({
				url: 'data/edit_item.php',
				type: 'post',
				dataType: 'json',
				data: {
					item_id:item_id,
					iName:iName,
	    			iPrice:iPrice,
	    			iType:iType,
	    			code:code,
	    			brand:brand,
	    			grams:grams
				},
				success: function (data) {
					//
					if(data.valid == true){
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-item').modal('hide');
						showAllItem();
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg('127');
				}
			});
	}//
});

function showAllStockList(){
	$.ajax({
			url: 'data/all_stocklist.php',
			type: 'post',
			success: function (data) {
				$('#all-stocklist').html(data);
			},
			error: function(){
				eMsg('152');
			}
		});
}//
showAllStockList();

//
//
//
//
//
//
//
//
//
$('#del-stock').click(function(event) {

	var check = 0;
	 $('input[type=checkbox]:checked').each(function(index) {
		check++;        
    });
	 if(check == 0){
	 	alert('Please Select Row!');
	 }else{
	 	$('#confirm-type').val('expired');
		$('#modal-confirmation').modal('show');
	}//
});

$('.del-expired').click(function(event) {
	
	if($('#confirm-type').val() == "expired"){
			var finish = false;
		$('input[type=checkbox]:checked').each(function(index) {
			//
			finish = true;
			var stock_id = $(this).val();
			$.ajax({
					url: 'data/del_expired.php',
					type: 'post',
					dataType: 'json',
					data: {
						stock_id:stock_id
					},
					success: function (data) {
						showAllStockList();
					},
					error: function(){
						eMsg('195');
					}
				});
	    });
		if(finish == true){
			$('#modal-confirmation').modal('hide');
			$('#modal-message').find('#msg-body').text('Eliminado correctamente!')
			$('#modal-message').modal('show');
		}//
		
	}//
});

$('#add-stock').click(function(event) {
	
	$('#modal-stock').find('.modal-title').text('Nuevo stock');
	$('#modal-stock').modal('show');
});

//
var fuck = 0;
$(document).on('submit', '#form-stock', function(event) {
	event.preventDefault();
	
    var item_id = $('#item-id').val();
    var qty = $('#qty').val();
    var xDate = $('#xDate').val();
    var manu = $('#manu').val();
    var purc = $('#purc').val();
    fuck++;
    //
    $.ajax({
    		url: 'data/add_fuck.php',
    		type: 'post',
    		//
    		data: {
    			item_id:item_id,
    			qty:qty,
    			xDate:xDate,
    			manu:manu,
    			purc:purc
    		},
    		success: function (data) {
    			console.log(data);
    			//
    			//
    				$('#modal-stock').modal('hide');
 		   			showAllStockList();
    				$('#modal-message').find('#msg-body').text(data.msg);
    				$('#modal-message').modal('show');
    			//
    		},
    		error: function(){
    			eMsg('233');
    		}
    	});

});

//
function showAllExpired(){
	$.ajax({
			url: 'data/all_expired.php',
			type: 'post',
			//
			success: function (data) {
				$('#all-expired').html(data);
			},
			error: function(){
				eMsg('260');
			}
		});
}//
showAllExpired();

//
function showAllStocks(){
	$.ajax({
			url: 'data/all_stock.php',
			type: 'post',
			success: function (data) {
				$('#all-stock').html(data);
			},
			error: function(){
				eMsg('275');
			}
		});
}//
showAllStocks();

//
$('#stock-report').click(function(event) {

	//
	window.open('data/print.php','name','width=auto,height=auto');
});

function showOrder(){
	$.ajax({
			url: 'data/order.php',
			type: 'post',
			success: function (data) {
				$('#order').html(data);
			},
			error: function(){
				eMsg('297');
			}
		});
}//
showOrder();

//
function toCart(stock_id, qty, item_id){
	$('#stock-id').val(stock_id);
	$('#item-id').val(item_id);
	$('#item-qty').val(qty);
	$('#modal-to-cart').modal('show');
}//

$(document).on('submit', '#form-toCart', function(event) {
	event.preventDefault();
	
	var stock_id = $('#stock-id').val();
	var item_id = $('#item-id').val();
	var qty = $('#item-qty').val();
	var cartQty = $('#cart-qty').val();//
	var newStockQty = qty - cartQty;
	if(newStockQty < 0){
		alert('El artículo no es suficiente!');
	}else{
		//
		$.ajax({
				url: 'data/add_cart.php',
				type: 'post',
				data: {
					stock_id:stock_id,
					item_id:item_id,
					cqty:cartQty,
					nqty:newStockQty
				},
				success: function (data) {
					console.log(data);
					showOrder();
					$('#modal-to-cart').modal('hide');
				},
				error:function(){
					eMsg('331');
				}
			});
	}//
});

//
function delCart(stock_id, qty, cart_id){
	$.ajax({
			url: 'data/del_cart.php',
			type: 'post',
			data: {
				stock_id:stock_id,
				cart_id:cart_id,
				qty:qty
			},
			success: function (data) {
				console.log(data);
				showOrder();
			},
			error: function(){
				eMsg('354');
			}
		});
}//

//
$(document).on('submit', '#form-order', function(event) {
	event.preventDefault();
	
	var custName = $('#customer-name').val();
	var tender = $('#tendered').val();
	var totalOrder = $('#totalOrder').val();
	var change = tender - totalOrder;

	if(change < 0){
		alert('Datos insuficientes!');
	}else{
		//
		$.ajax({
				url: 'data/add_transaction.php',
				type: 'post',
				//
				data: {
					custName:custName,
					tender:tender,
					totalOrder:totalOrder,
					change:change
				},
				success: function (data) {
					console.log(data);
				},
				error: function(){
					eMsg('385');
				}
			});
	}//
	
});//


function confirm_cart(){
	$('#confirm-type').val('confirmCart');
	$('#modal-confirmation').modal('show');
}//

$('#confirm-yes').click(function(event) {
	

	var choice = $('#confirm-type').val();
	if(choice == 'confirmCart'){
		$.ajax({
				url: 'data/confirm_order.php',
				type: 'post',
				dataType: 'json',
				data:{
					click:'yes'
				},
				success: function (data) {
					//
					if(data.valid == true){
						$('#confirm-type').val(' ');
						$('#modal-confirmation').modal('hide');
						showOrder();
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg(445);
				}
			});
	}
});


function showAllSales(){
	var date = $('#dailyDate').val();
	dailySales(date);
}//
showAllSales();

function dailySales(date){
	$.ajax({
			url: 'data/all_sales.php?date='+date,
			type: 'get',
			data: {
				date:date
			},
			success: function (data) {
				$('#all-sales').html(data);
			},
			error:function(){
				eMsg(474);
			}
		});	
}


$(document).on('change', '#dailyDate', function(event) {
	event.preventDefault();
	
	var date = $('#dailyDate').val();
	if(date == '' || date == null){
		$('#printBut').hide();
	}else{
		$('#printBut').show();
	}
	dailySales(date);

});

$('#printBut').click(function(event) {

	var date = $('#dailyDate').val();
	window.open('data/print-sales.php?date='+date,'name','width=600,height=400');	
});



