	function check(){
				console.log("working");
			}
			function postmsg(){
			if(from1.msg.value == '') alert('Post field compulsory!!!!');
			else{
				var post = from1.msg.value;
				var xmlhttp = new XMLHttpRequest();

				xmlhttp.onreadystatechange() = function(){
					if(xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById("post").innerHTML = xmlhttp.responseText;

					}
				}
				xmlhttp.open('GET', 'post.php?post='+post+'&uname='+$_SESSION['username'], true);
				xmlhttp.send();
			}
		}