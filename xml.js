function increment()
{
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange();
	xmlhttp.onreadystatchange = function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status=200)
		{
			document.getElementById('like').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET','like.php?username=ravindar',true);
	xmlhttp.send();
}

