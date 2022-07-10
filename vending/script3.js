function reg(){
    var a = document.getElementById("regusername").value;
    var b = document.getElementById("regpassword").value;
    if (!!a && !!b){
        x1 = new XMLHttpRequest();
        x1.open("GET","register.php?a="+a+"&b="+b,true);
    	x1.send();
        x1.onreadystatechange=function() {
    		if(x1.readyState==4 && x1.status==200) {
    			document.getElementById("checkaja").innerHTML = x1.responseText;
    		}
    	}
        //opening the login page
        window.open("index.html")
    }
    else{
        document.getElementById("checkaja").innerHTML = "failed";
    }
    
}
function regpage(){
    window.open("registerpage.html");
}
function loginpge(){
    window.open("index.html");
}
function adminpge(){
    window.open("admin.html");
}
function login(){
    var username = document.getElementById("logusername");
    var password = document.getElementById("logpassword");
    sessionStorage.setItem("username", username.value);
    sessionStorage.setItem("password", password.value);
    username = username.value;
    password = password.value;
    x1 = new XMLHttpRequest();
    x1.open("GET","login.php?username="+username+"&password="+password,true);
	x1.send();
	x1.onreadystatechange=function() {
		if(x1.readyState==4 && x1.status==200) {
			document.getElementById("checkaja").innerHTML = x1.responseText;
		}
	}
	
	var passlog = "<?php echo $name?>";
}

function loginadmin(){
    var username = document.getElementById("logusername");
    var password = document.getElementById("logpassword");
    username = username.value;
    password = password.value;
    x1 = new XMLHttpRequest();
        x1.open("GET","admin.php?username="+username+"&password="+password,true);
	    x1.send();
	    x1.onreadystatechange=function() {
		if(x1.readyState==4 && x1.status==200) {
			document.getElementById("assetshow").innerHTML = x1.responseText;
		}
	    }
}
function addcash(){
    var accid = document.getElementById("accid").value;
    var amount = document.getElementById("amount").value;
    x1 = new XMLHttpRequest();
        x1.open("GET","addcash.php?accid="+accid+"&amount="+amount,true);
	    x1.send();
	    x1.onreadystatechange=function() {
		if(x1.readyState==4 && x1.status==200) {
			document.getElementById("checkaje").innerHTML = x1.responseText;
		}
}
}

function findasset(){
    var asset_id = document.getElementById("asset_id").value;
    x1 = new XMLHttpRequest();
    x1.open("GET","findasset.php?asset_id="+asset_id,true);
	x1.send();
	x1.onreadystatechange=function() {
		if(x1.readyState==4 && x1.status==200) {
			document.getElementById("assetshow").innerHTML = x1.responseText;
		}
	}
	
	var passlog = "<?php echo $name?>";
}
function checkingidpass(){
    var username = sessionStorage.getItem('username');
    var password = sessionStorage.getItem('password');
    if (username == null || password == null){
        document.getElementById("blockanythingside").style.display="block";
    }
    else{
        x1 = new XMLHttpRequest();
        x1.open("GET","cekbalance.php?username="+username+"&password="+password,true);
	    x1.send();
	    x1.onreadystatechange=function() {
		if(x1.readyState==4 && x1.status==200) {
			document.getElementById("balance").innerHTML = x1.responseText;
			showid();
		}
	}
    }
}
function showid(){
    var username = sessionStorage.getItem('username');
    var password = sessionStorage.getItem('password');
    x1 = new XMLHttpRequest();
        x1.open("GET","cekid.php?username="+username+"&password="+password,true);
	    x1.send();
	    x1.onreadystatechange=function() {
		if(x1.readyState==4 && x1.status==200) {
			document.getElementById("accid").innerHTML = x1.responseText;
		}
	}
}
function greet(){
    document.getElementById("greetings").innerHTML= "Welcome " + sessionStorage.getItem('username');
}
function addPge(){
    window.open("addproduct.html")
}
function addS(){
    document.getElementById("checkaja").innerHTML = "In Progress...";
    let asset = document.getElementById("asset").files[0]; //file input
    let formData = new FormData();
    formData.append("asset", asset);
    var asset_name = document.getElementById("asset_name").value;
    var addpusername = sessionStorage.getItem('username');
    var addppassword = sessionStorage.getItem('password');
    formData.append("asset_name", asset_name);
    formData.append("addpusername", addpusername);
    formData.append("addppassword", addppassword);
    x1 = new XMLHttpRequest();
    x1.open("POST","addS.php",true);
    x1.send(formData);
    x1.onreadystatechange=function() {
    	if(x1.readyState==4 && x1.status==200) {
    		document.getElementById("checkaja").innerHTML = x1.responseText;
    	}
    }
    
}
function buy(){
    var susername = sessionStorage.getItem('username');
    var spassword = sessionStorage.getItem('password');
    var motorid = document.getElementById("motorid").value;
    req1 = new XMLHttpRequest();
    req1.open("GET","buy.php?susername="+susername+"&spassword="+spassword+"&motorid="+motorid,true);
    req1.send();
    req1.onreadystatechange=function() {
    	if(req1.readyState==4 && req1.status==200) {
    		document.getElementById("checkaja").innerHTML = req1.responseText;
    		checkingidpass();
    	}
    }
    
}
function opendoor(){
    req1 = new XMLHttpRequest();
    req1.open("GET","opendoor.php",true);
    req1.send();
    req1.onreadystatechange=function() {
    	if(req1.readyState==4 && req1.status==200) {
    		document.getElementById("checkaje").innerHTML = req1.responseText;
    	}
    }
    
}
function lockdoor(){
    req1 = new XMLHttpRequest();
    req1.open("GET","lockdoor.php",true);
    req1.send();
    req1.onreadystatechange=function() {
    	if(req1.readyState==4 && req1.status==200) {
    		document.getElementById("checkaje").innerHTML = req1.responseText;
    	}
    }
    
}