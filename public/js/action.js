(function(A) {

	if (!Array.prototype.forEach)
		A.forEach = A.forEach || function(action, that) {
			for (var i = 0, l = this.length; i < l; i++)
				if (i in this)
					action.call(that, this[i], i, this);
			};

		})(Array.prototype);


function getMarkers(){
	var routeUrl="/refresh";//TODO verify siteUrl
	//get markers from db
	//alert(arrayltlg);
   var sendAjax = $.ajax({
	    type: "POST",
	    url: routeUrl,
	    data: ({arrayltlg : arrayltlg}),
	    success: function (data){
	    	//var obj = jQuery.parseJSON(data);
			  clearMarkers();
			   markersData = data;
			  //alert(data);
			   setMarkers();
		   }
	   });

	 
	   
}
function savePlace(){
	var placeName = $('#place').val();
	var comment   = $('#comment').val();
	//TODO get latLong with geocoding on placeName

	var link=siteUrl+"/user/savePlace/";
	link+=Math.random(); 
	//TODO define maxFileSize 
	if(document.getElementById("img").files[0].size <= maxFileSize)
	{
	    $.ajaxFileUpload({
	       url:link,
	       secureuri:false,
	       fileElementId:'img',
	       dataType: 'json',
	       data:{
				'placeName': placeName,
				'comment': comment,
				'latLong': latLong
	       },
	       success  : function (data, status)
	       {  
	    	   switch(status)
	    	   {
	    	   	case 200:
	    	   		//TODO define display result 
	    	   		break;
	    	   	case 300:
	    	   		break;
	    	   	case 500:
					break;
	    	   	default:
	    	   		break;
	    	   }
	       }
	    });
	}else{
		//simple ajax without imgUpload
		 $.ajax({
			    type: "POST",
			    url: link,
			    data: {
			    	'placeName': placeName,
					'comment': comment
			    },
			       success  : function (data, status)
			       {  
			    	   switch(status)
			    	   {
			    	   	case 200:
			    	   		//TODO define display result 
			    	   		break;
			    	   	case 300:
			    	   		break;
			    	   	case 500:
							break;
			    	   	default:
			    	   		break;
			    	   }
			       }
			   });
	}
	var compte = 0;
	function add(a,b){
		
		if(a == 1){
			compte = a+b;
		}
		else if(a>b){
			compte = a-b;
		}else{
			compte = a*b;
		}
	}
add(1,2);
}
function updatePlace()
{
	
}