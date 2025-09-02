// JavaScript Document
function lof(x)
{
	location.href=x
}

function chkAcc(){
	let acc=$("#acc").val();
	$.get("./api/chkAcc.php",{acc},(res)=>{
		if(parseInt(res)==1 || acc=='admin'){
			alert("帳號已存在")
		}else{
			alert("帳號可使用")
		}
	})
}

function reg(){
	let user={
		acc:$("#acc").val(),
		pw:$("#pw").val(),
		pw2:$("#pw2").val(),
		name:$("#name").val(),
		addr:$("#addr").val(),
		tel:$("#tel").val(),
		email:$("#email").val(),
	}

	if(user.acc=='' || user.pw=='' || user.pw2=='' || user.name=='' || user.addr=='' || user.tel=='' || user.email==''){
		alert("不可空白")
	}else if(user.pw != user.pw2){
		alert("密碼不正確")
	}else{
		$.get("./api/chkAcc.php",{acc:user.acc},(res)=>{
			if(parseInt(res)==1 || user.acc=='admin'){
				alert("帳號已存在")
			}else{
				$.post("./api/reg.php",user,()=>{
					alert("註冊完成，歡迎加入")
					location.href="?do=login"
				})
			}
		})
	}
}

function login(table){
	let acc=$("#acc").val();
	let pw=$("#pw").val();
	let ans=$("#ans").val();

	$.get("./api/chkAns.php",{ans},(chk)=>{
		if(parseInt(chk)==1){
			$.get("./api/chkPw.php",{table,acc,pw},(res)=>{
				if(parseInt(res)==1){
					switch(table){
						case 'user':
							location.href="index.php";
						break;
						case 'admin':
							location.href="back.php";
						break;
					}
				}else{
					alert("帳號或密碼錯誤")
				}
			})
		}else{
			alert("對不起，您輸入的驗證碼有誤，請您重新登入")
		}
	})
}

function getBigs(){
	$.get("./api/get_bigs.php",(bigs)=>{
		$("#big").html(bigs)
	})
}

function getMids(){
	let big=$("#big").val();
	$.get("./api/get_mids.php",{big},(mids)=>{
		$("#mid").html(mids)
	})
}

function buy(id,qt){
	$.post("./api/save_cart.php",{id,qt},()=>{
		location.href="?do=buycart";
	})
}

function getCartCount(){
	$.get("./api/cart_count.php",(count)=>{
		$("#cart-count").text(count);
	})
}
