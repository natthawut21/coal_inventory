  var XMLHttpRequestObject = false;
  var is_IE = false;
  if(window.XMLHttpRequest) {
		XMLHttpRequestObject = new XMLHttpRequest();
		if(XMLHttpRequestObject.overrideMimeType)
	    {
			 XMLHttpRequestObject.overrideMimeType('text/html');
		}
		is_IE= false;
	//	alert("Non IE");
  } else if(window.ActiveXObject){
        XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
		is_IE =true;
	//	alert("IE Browser");
  
  }else{
		alert("Your browser not support AJAX");
  }

  function getData(data,divID)
  {
			
			var XMLHttpRequestObject = false;
			var is_IE = false;
			if(window.XMLHttpRequest){
					XMLHttpRequestObject = new XMLHttpRequest();
					if(XMLHttpRequestObject.overrideMimeType)
					{
						XMLHttpRequestObject.overrideMimeType('text/html');
					}
					is_IE= false;
					//	alert("Non IE");
			} else if(window.ActiveXObject){
				XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
				is_IE =true;
				//	alert("IE Browser");
	
			}else{
				alert("Your browser not support AJAX");
			}

			var resData="";
			if(XMLHttpRequestObject)
			{	
					var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("GET",data,true);
		
		            
					XMLHttpRequestObject.onreadystatechange = function()
					{
						//alert(">> "+data);
							if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
							{
								
								resData = XMLHttpRequestObject.responseText;
							    //alert(">> "+resData);
								obj.innerHTML= resData;
								
								
				
							}
					}
				XMLHttpRequestObject.send(null);	
			}
			
			
  }
  function getData_Sync(data,divID)
  {
			
			var XMLHttpRequestObject = false;
			var is_IE = false;
			if(window.XMLHttpRequest){
					XMLHttpRequestObject = new XMLHttpRequest();
					if(XMLHttpRequestObject.overrideMimeType)
					{
						XMLHttpRequestObject.overrideMimeType('text/html');
					}
					is_IE= false;
					//	alert("Non IE");
			} else if(window.ActiveXObject){
				XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
				is_IE =true;
				//	alert("IE Browser");
	
			}else{
				alert("Your browser not support AJAX");
			}

			var resData="";
			if(XMLHttpRequestObject)
			{	
					var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("GET",data,false);
		
		            
					XMLHttpRequestObject.onreadystatechange = function()
					{
						//alert(">> "+data);
							if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
							{
								
								resData = XMLHttpRequestObject.responseText;
							    //alert(">> "+resData);
								obj.innerHTML= resData;
								
								
				
							}
					}
				XMLHttpRequestObject.send(null);	
			}
			
			
  }
  function getData_tv_table(data,divID)
  {
			
			var XMLHttpRequestObject = false;
			var is_IE = false;
			if(window.XMLHttpRequest){
					XMLHttpRequestObject = new XMLHttpRequest();
					if(XMLHttpRequestObject.overrideMimeType)
					{
						XMLHttpRequestObject.overrideMimeType('text/html');
					}
					is_IE= false;
					//	alert("Non IE");
			} else if(window.ActiveXObject){
				XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
				is_IE =true;
				//	alert("IE Browser");
	
			}else{
				alert("Your browser not support AJAX");
			}

			var resData="";
			if(XMLHttpRequestObject)
			{	
					var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("GET",data,true);
		
		            
					XMLHttpRequestObject.onreadystatechange = function()
					{
						//alert(">> "+data);
							if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
							{
								
								resData = XMLHttpRequestObject.responseText;
							    //alert(">> "+resData);
								obj.innerHTML= resData;
								
								datatable_1('#table_01').dataTable( {
								"scrollY":        "850px",
								"scrollCollapse": true,
								"paging":         false,
								"bFilter":false
								} );
								
								//startClock();
							
				
							}
					}
				XMLHttpRequestObject.send(null);	
			}
			
			
  }
 function getDataText(data,divID)
  {
			
			var XMLHttpRequestObject = false;
			var is_IE = false;
			if(window.XMLHttpRequest){
					XMLHttpRequestObject = new XMLHttpRequest();
					if(XMLHttpRequestObject.overrideMimeType)
					{
						XMLHttpRequestObject.overrideMimeType('text/html');
					}
					is_IE= false;
					//	alert("Non IE");
			} else if(window.ActiveXObject){
				XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
				is_IE =true;
				//	alert("IE Browser");
	
			}else{
				alert("Your browser not support AJAX");
			}

			var resData="";
			if(XMLHttpRequestObject)
			{	
					var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("GET",data,true);
		
		            
					XMLHttpRequestObject.onreadystatechange = function()
					{
						//alert(">> "+data);
							if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
							{
								
								resData = XMLHttpRequestObject.responseText;
							   // alert(divID+">> "+resData);
								obj.value= resData;
				
							}
					}
				XMLHttpRequestObject.send(null);	
			}
			
			
  }
  function getDataXML(data,xmlFunction)
   {
			
			var XMLHttpRequestObject = false;
			var is_IE = false;
			if(window.XMLHttpRequest){
					XMLHttpRequestObject = new XMLHttpRequest();
					if(XMLHttpRequestObject.overrideMimeType)
					{
						XMLHttpRequestObject.overrideMimeType('text/html');
					}
					is_IE= false;
					//	alert("Non IE");
			} else if(window.ActiveXObject){
				XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
				is_IE =true;
				//	alert("IE Browser");
	
			}else{
				alert("Your browser not support AJAX");
			}

	  
		if(XMLHttpRequestObject)
			{	
			
					//var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("GET",data);
					
					//alert("get XML From :"+data);
					
					XMLHttpRequestObject.onreadystatechange = function()
					{
					if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
					{
							//alert("2.XML:"+XMLHttpRequestObject.readyState);
							xmlData = XMLHttpRequestObject.responseText;
							//alert("1.XML:"+xmlData);
							xmlFunction(xmlData);
							//alert("XML:"+xmlData);
					}
					}
					
				
				XMLHttpRequestObject.send(null);	
			}
			
			
  }
  function getDataXML_Sync(data,xmlFunction)
   {
			var XMLHttpRequestObject = false;
			var is_IE = false;
			if(window.XMLHttpRequest){
					XMLHttpRequestObject = new XMLHttpRequest();
					if(XMLHttpRequestObject.overrideMimeType)
					{
						XMLHttpRequestObject.overrideMimeType('text/html');
					}
					is_IE= false;
					//	alert("Non IE");
			} else if(window.ActiveXObject){
				XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
				is_IE =true;
				//	alert("IE Browser");
	
			}else{
				alert("Your browser not support AJAX");
			}

	  
		if(XMLHttpRequestObject)
			{	
			
					//var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("GET",data,false);
					
					//alert("get XML From :"+data);
					
					XMLHttpRequestObject.onreadystatechange = function()
					{
					if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
					{
							//alert("2.XML:"+XMLHttpRequestObject.readyState);
							xmlData = XMLHttpRequestObject.responseText;
							//alert("1.XML:"+xmlData);
							xmlFunction(xmlData);
							//alert("XML:"+xmlData);
					}
					}
					
				
				XMLHttpRequestObject.send(null);	
			}
			
			
  }
  function getData_1(data,xFunction)
   {
			
			var XMLHttpRequestObject = false;
			var is_IE = false;
			if(window.XMLHttpRequest){
					XMLHttpRequestObject = new XMLHttpRequest();
					if(XMLHttpRequestObject.overrideMimeType)
					{
						XMLHttpRequestObject.overrideMimeType('text/html');
					}
					is_IE= false;
					//	alert("Non IE");
			} else if(window.ActiveXObject){
				XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
				is_IE =true;
				//	alert("IE Browser");
	
			}else{
				alert("Your browser not support AJAX");
			}

	  
		if(XMLHttpRequestObject)
			{	
			
					//var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("GET",data);
					
					//alert("get XML From :"+data);
					
					XMLHttpRequestObject.onreadystatechange = function()
					{
					if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
					{
							//alert("2.XML:"+XMLHttpRequestObject.readyState);
							xmlData = XMLHttpRequestObject.responseText;
							//alert("1.XML:"+xmlData);
							xFunction(xmlData);
							//alert("XML:"+xmlData);
					}
					}
					
				
				XMLHttpRequestObject.send(null);	
			}
			
			
  }
  
	
  
 function getDataOption(data,divID)
  {
			
			var XMLHttpRequestObject = false;
			var is_IE = false;
			if(window.XMLHttpRequest){
					XMLHttpRequestObject = new XMLHttpRequest();
					if(XMLHttpRequestObject.overrideMimeType)
					{
						XMLHttpRequestObject.overrideMimeType('text/html');
					}
					is_IE= false;
					//	alert("Non IE");
			} else if(window.ActiveXObject){
				XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
				is_IE =true;
				//	alert("IE Browser");
	
			}else{
				alert("Your browser not support AJAX");
			}

			var resData="";
			if(XMLHttpRequestObject)
			{	
					var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("GET",data,true);
		
		            
					XMLHttpRequestObject.onreadystatechange = function()
					{
						//alert(">> "+data);
							if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
							{
								
								resData = XMLHttpRequestObject.responseText;
							    //alert(divID+",Option >> "+resData);
								obj.selectedIndex= resData;
				
							}
					}
				XMLHttpRequestObject.send(null);	
			}
			
			
  }
		
function postData(url,data,divID)
{
			var resData="";
			if(XMLHttpRequestObject)
			{	
					var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("POST",url,true);
					XMLHttpRequestObject.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
					XMLHttpRequestObject.onreadystatechange = function()
					{
						if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
						{
							resData = XMLHttpRequestObject.responseText;
						    //alert(divID+",Option >> "+resData);
							obj.selectedIndex= resData;
						}
					}
					XMLHttpRequestObject.send(data);
			}
}

function postDataXML(url,data,xmlFunction)
   {
			
			var XMLHttpRequestObject = false;
			var is_IE = false;
			if(window.XMLHttpRequest){
					XMLHttpRequestObject = new XMLHttpRequest();
					if(XMLHttpRequestObject.overrideMimeType)
					{
						XMLHttpRequestObject.overrideMimeType('text/html');
					}
					is_IE= false;
					//	alert("Non IE");
			} else if(window.ActiveXObject){
				XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
				is_IE =true;
				//	alert("IE Browser");
	
			}else{
				alert("Your browser not support AJAX");
			}

	  
		if(XMLHttpRequestObject)
			{	
			
					//var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("POST",url);
					XMLHttpRequestObject.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
					//alert("get XML From :"+data);
					
					XMLHttpRequestObject.onreadystatechange = function()
					{
						if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
						{
							//alert("2.XML:"+XMLHttpRequestObject.readyState);
							xmlData = XMLHttpRequestObject.responseText;
							//alert("1.XML:"+xmlData);
							xmlFunction(xmlData);
							//alert("XML:"+xmlData);
						}
					}
					XMLHttpRequestObject.send(data);	
			}
  }

function getDataR1(data,divID)
  {
			
			var resData="";
			if(XMLHttpRequestObject)
			{	
					var obj = document.getElementById(divID);
					XMLHttpRequestObject.open("GET",data,true);
		
		            
					XMLHttpRequestObject.onreadystatechange = function()
					{
						//alert(">> "+data);
							if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status == 200)
							{
								
								resData = XMLHttpRequestObject.responseText;
							    //alert(">> "+resData);
								obj.innerHTML= resData;
				
							}
					}
				XMLHttpRequestObject.send(null);	
			}
  }	
	
function getServerTime()
	{
			getData("serverTime.php","ServerTime");
			
			 setTimeout('getServerTime()',1000);
			 //alert("Refresh");

	}
	
function checkUploadFile(fileName)
	{
			getData('checkUploadFile.php?FileName='+fileName,'Note4');
			setTimeout( 'checkUploadFile("'+fileName+'")',3000);
			 //alert("Refresh");

	}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");

}

function jsSetReportDate(start_date,end_date)
{
	if(document.getElementById("operation_date")!=null)	{	document.getElementById("operation_date").value= start_date;}
	if(document.getElementById("operation_date_end")!=null)	{	document.getElementById("operation_date_end").value= end_date;}
	
	var start_date_txt_obj = document.getElementById("rep_start_date");
	if(start_date_txt_obj==null) 	
		var start_date_txt_obj = document.getElementById("date_start_search");
		
	if(start_date_txt_obj!=null) 	
		start_date_txt_obj.value= 	start_date;
	
	
	var end_date_txt_obj = document.getElementById("rep_end_date");
	if(end_date_txt_obj==null) 	
		var end_date_txt_obj = document.getElementById("date_end_search");
	if(end_date_txt_obj!=null) 	
		end_date_txt_obj.value= end_date;
		
	
		
		
	

}

