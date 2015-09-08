function fin(responseTxt,responseStat) {
  //alert(responseStat+' - '+responseTxt);
}

// create a new ajaxObject, give it a url it will be calling and
// tell it to call the function "fin" when its got data back from the server.
//var test1 = new ajaxObject('http://someurl.com/server.cgi',fin);
//    test1.update();
               
// create a new ajaxObject, give it a url and tell it to call fin when it
// gets data back from the server.  When we initiate the ajax call we'll
// be passing 'id=user4379' to the server.           
//var test2 = new ajaxObject('http://someurl.com/program.php',fin);
//    test2.update('id=user4379');
               
// create a new ajaxObject but we'll overwrite the callback function inside
// the object to more tightly bind the object with the response hanlder.


// create a new ajaxObject and pass the data to the server (in update) as
// a POST method instead of a GET method.
//var test4 = new ajaxObject('http://someurl.com/postit.cgi', fin);
//   test4.update('coolData=47&userId=user49&log=true','POST'); 


function ajaxObject(url, callbackFunction) {
	var that=this;     
  	this.updating = false;
  	this.abort = function() {
    	if (that.updating) {
      		that.updating=false;
      		that.AJAX.abort();
      		that.AJAX=null;
    	}
	}
	this.update = function(passData,postMethod) {
    	if (that.updating) { 
			return false;
		}
    	that.AJAX = null;                         
    	if (window.XMLHttpRequest) {             
      		that.AJAX=new XMLHttpRequest();             
    	} else {                                 
      		that.AJAX=new ActiveXObject("Microsoft.XMLHTTP");
    	}                                             
    	if (that.AJAX==null) {                             
      		return false;                               
    	} else {
      		that.AJAX.onreadystatechange = function() { 
        		if (that.AJAX.readyState==4) {             
          			that.updating=false;               
          			that.callback(that.AJAX.responseText,that.AJAX.status,that.AJAX.responseXML);       
          			that.AJAX=null;                                         
        		}                                                     
      		}                                                       
      		that.updating = new Date();                             
      		if (/post/i.test(postMethod)) {
        		var uri=urlCall+'?'+that.updating.getTime();
        		that.AJAX.open("POST", uri, true);
        		that.AJAX.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        		that.AJAX.send(passData);
      		} else {
        		var uri=urlCall+'?'+passData+'&timestamp='+(that.updating.getTime());
        		that.AJAX.open("GET", uri, true);                             
        		that.AJAX.send(null);                                         
      		}             
      		return true;                                             
    	}                                                                           
  	}
  	var urlCall = url;       
  	this.callback = callbackFunction || function () { };
  
}

function fn_confirmdelete(type,url)
{
	Choice = confirm("Are you sure to delete this "+type+ " ?");
	if (Choice == true)
	{
		window.location = url;
	}
	else
	{
		//window.location = '';
	}
}

function toggleDealType()
{
	var deal_type = $('#deal_type').val();
	if(deal_type == '1')
	{
		$('.trpaytodh').show();
		$('.trpaytovender').show();
	}
	else
	{
		$('.trpaytodh').hide();
		$('.trpaytovender').hide();
	}
}

function getMainCategoryOptions()
{
	var cat_id = '';
	var cat_parent_id = $('#top_cat_id').val();
	link='remote.php?action=getmaincategoryoptions&cat_parent_id='+cat_parent_id+'&cat_id='+cat_id;
	var linkComp = link.split( "?");
	var result;
	var obj = new ajaxObject(linkComp[0], fin);
	obj.update(linkComp[1],"GET");
	obj.callback = function (responseTxt, responseStat) {
		// we'll do something to process the data here.
		result = responseTxt;
		$('#maincatresult').html(result);
		getSubCategoryOptions()
	}
}

function getSubCategoryOptions()
{
	var cat_id = '';
	var cat_parent_id = $('#cat_id').val();
	link='remote.php?action=getsubcategoryoptions&cat_parent_id='+cat_parent_id+'&cat_id='+cat_id;
	var linkComp = link.split( "?");
	var result;
	var obj = new ajaxObject(linkComp[0], fin);
	obj.update(linkComp[1],"GET");
	obj.callback = function (responseTxt, responseStat) {
		// we'll do something to process the data here.
		result = responseTxt;
		$('#subcatresult').html(result);
	}
}

function uploadNewImage(pif_id)
{
	var btnUpload=$('#upload');
	var status=$('#status');
	new AjaxUpload(btnUpload, {
		action: 'remote.php?action=uploadnewimage&pif_id='+pif_id,
		name: 'photo',
		onSubmit: function(file, ext){},
		onComplete: function(file, response){
		//On completion clear the status
		//Add uploaded file to list
			temp_arr = response.split('::::');
			if(temp_arr[0] == 'Error')
			{
				alert(temp_arr[1]);
			}
			else
			{
				ProductImagePopUp();
			}
		}
	});
	
}
function uploadNewImagePopUp(pif_id)
{
	link='remote.php?action=uploadnewimagepopup&pif_id='+pif_id;
	var linkComp = link.split( "?");
	var result;
	var obj = new ajaxObject(linkComp[0], fin);
	obj.update(linkComp[1],"GET");
	obj.callback = function (responseTxt, responseStat) {
		// we'll do something to process the data here.
		result = responseTxt;
		document.getElementById('caption_text').innerHTML = 'Upload Image';
		document.getElementById('prwcontent').innerHTML = result;  
	}
}
function validateUploadedImages()
{
	var $b = $('input:checkbox[name="pif_id_row[]"]');
	var chked_len = $b.filter(':checked').length;
	var allowed_count = $('#hdnallowed_count').val();
	
	if(chked_len == 0)
	{
		alert("Please select atleast one image");
	}
	else if(chked_len > allowed_count)
	{
		alert("You can Upload only "+allowed_count+" images");
	}
	else
	{
		var checkValues = $('input:checkbox[name="pif_id_row[]"]:checked').map(function() {																   
			return $(this).val();
		}).get();
		
		//pif_id = checkValues.join(',');
		pif_id = checkValues;
		setUploadedImages(pif_id);
		$(".QTPopup").css('display', 'none');	
	}
}
function removeImageItem(id_val)
{
	var photo_add = $('#hdnphoto_add').val();
	if(photo_add == id_val)
	{
		photo_add = '';
		setUploadedImages(photo_add);
	}
	else 
	{
		var temp_arr2 = Array();	
		var temp_arr = photo_add.split(',');
		for(var i=0;i<temp_arr.length;i++)
		{
			if(temp_arr[i] != id_val)
			{
				temp_arr2.push(temp_arr[i]);
			}
		}
		
		var pif_id = temp_arr2.join(",");
		setUploadedImages(pif_id);
	}
}
function chkNoOfImageSelected(id_val)
{
	var $b = $('input:checkbox[name="pif_id_row[]"]');
	var chked_len = $b.filter(':checked').length;
	var allowed_count = $('#hdnallowed_count').val();
	
	if(chked_len > allowed_count)
	{
		alert("You can Upload only "+allowed_count+" images");
		$("#"+id_val).attr("checked", false);
	}
}

function ProductImagePopUp()
{
	var pif_id = $('#hdnphoto_add').val();
	link='remote.php?action=productimagepopup&pif_id='+pif_id;
	var linkComp = link.split( "?");
	var result;
	var obj = new ajaxObject(linkComp[0], fin);
	obj.update(linkComp[1],"GET");
	obj.callback = function (responseTxt, responseStat) {
		// we'll do something to process the data here.
		result = responseTxt;
		document.getElementById('caption_text').innerHTML = 'Product Images';
		document.getElementById('prwcontent').innerHTML = result;  
		$(".QTPopup").animate({width: 'show'}, 'slow');
	}
}

function setUploadedImages(pif_id)
{
	link='remote.php?action=setuploadedimages&pif_id='+pif_id;
	var linkComp = link.split( "?");
	var result;
	var obj = new ajaxObject(linkComp[0], fin);
	obj.update(linkComp[1],"GET");
	obj.callback = function (responseTxt, responseStat) {
		// we'll do something to process the data here.
		result = responseTxt;
		$("#hdnphoto_add").val(pif_id);	
		document.getElementById('tdphoto').innerHTML = result;
	}
}
