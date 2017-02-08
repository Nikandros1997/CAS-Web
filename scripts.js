function setXMenuTag()
{
	document.getElementById("menu-tab").style.right =  "-2px";
}

function setIdentityPosition()
{
	var h = window.innerHeight;
	//var middle = (w / 2) - ((w * 8) / 100);
	var feed = document.getElementById("feed-section");
	var form = document.getElementById("form-section");
	var dead = document.getElementById("dead-section");
	var set = document.getElementById("set-section");

	//check if element exists
	//only one test has to be true in order not to have problems in the page
	//for every tab there is a single if statement.
	if (feed != null)  {
		//sets the width of the feedback section
		feed.style.height = h - 150 + "px";
	} else if(form != null) {

		var image = document.getElementById('image-1');

		if(image != null)
			resizeImage();

	} else if(dead != null) {
		var priv = document.getElementById('identity').innerHTML;

		if(priv == 'Advisor') {
			var date = document.getElementById('date');
			var month = document.getElementById('month');
			var year = document.getElementById('year');
			var d = new Date();
			var currentYear = d.getFullYear();
			var currentMonth = d.getMonth();
			var currentDate = d.getDate();
			var days;

			//create ten years
			for(var i = currentYear; i < currentYear + 10; i++) {
				var option = document.createElement("option");
				option.text = i;
				option.value = i;
				year.add(option);
			}
			year.value = currentYear;

			//create the 12 months
			for(i = 1; i < 13; i++) {
				var option = document.createElement("option");
				option.text = i;
				option.value = i;
				month.add(option);
			}
			month.value = currentMonth + 1;

			//create the days per month
			if((currentMonth%2) == 1) {
				// this is an even month - 30 days
				days = 30;

				if(currentMonth == 1) {
					days = 28;
				}
			} else {
				// this is an odd month - 31 days
				days = 31;

			}

			for(i = 1; i < days + 1; i++) {
				var option = document.createElement("option");
				option.text = i;
				option.value = i;
				date.add(option);
			}
			date.value = currentDate;
		}

	} else if(set != null) {
		//set.style.width = w - 2*140 + "px";
	}

	

}

function setBackgroundPerFeedBack(sElement)
{
	var element = document.getElementById(sElement);
	var elementsHeight = element.clientHeight;
	var container = element.lastElementChild;





	//var right = element.previousSibling;
	//var rightP = right.firstChild;

	if(elementsHeight < 60)
	{
		document.getElementById(sElement).style.height = "700px";
		container.style.display = "block";
		element.style.backgroundColor = '#4ddbff';
		//rightP.style.WebkitTransform = "rotate(270deg)"; 
	}
	else
	{
		document.getElementById(sElement).style.height = "50px";
		container.style.display = "none";
		element.style.backgroundColor = 'white';
		//rightP.style.WebkitTransform = "rotate(90deg)"; 
	}
}

function hideDiv(popup, inpopup) {
	//var popup = document.getElementById('popup');
	//var inpopup = document.getElementById('popup_inside');

	popup.style.display = "none";
	popup.style.visibility = "hidden";
    inpopup.style.opacity = "0";
}

function showDiv() {
	//var popup = document.getElementById('popup');
	//var inpopup = document.getElementById('popup_inside');
	var x = event.clientX;
    var y = event.clientY;

    var popup = document.getElementById('popup');
    var background = document.getElementById('popup_background');
    var form = document.getElementById('popup_inside');

    if(form == null) {
    	form = document.getElementById('popup_inside2');
    } else {
		form.style.left = x + "px";
		form.style.top = (y - 90) + "px";
    }
   	form.style.opacity = "1";
	popup.style.display = "block";
	popup.style.visibility = "visible";
}

function formValidationNewDeadline() {

	var selectedDate = document.forms['newDeadline']['date'].value;
	var selectedMonth = document.forms['newDeadline']['month'].value;
	var selectedYear = document.forms['newDeadline']['year'].value;
	var comments = document.forms['newDeadline']['comments'].value;

	var d = new Date();
	var currentYear = d.getFullYear();
	var currentMonth = d.getMonth();
	var currentDate = d.getDate();

	if(selectedDate < currentDate || selectedMonth < currentMonth || selectedYear < currentYear) {
		alert("This deadline is not valid. It is for a date, which has passed. Please try a date after today's date: " + currentDate + "-" + currentMonth + "-" + currentYear);
		return false;
	}else if(x == null || x == "") {
		alert("Comments field is blank. Please write something for the students.");
		return false;
	}
}

function changePhotoState() {

	var uploader = document.getElementById('uploader');
	var fileArrayLength = uploader.files.length;

	if(fileArrayLength > 5) {
		fileArrayLength = 5;
		alert("You can upload up to five images. Only the first five images have been chosen. If you do not like the first five please try again.");
	}

	// send via XHR - look ma, no headers being set!
	var xhr = new XMLHttpRequest();
	var form = document.getElementById('form');
	var data = new FormData(form);

	xhr.open("post", "/cas/image-uploader.php", true);
	xhr.send(data);
	xhr.onload = function() {
	    console.log("Upload complete.");

	    var firstImage = document.getElementById('image-1');
		//console.log(firstImage);
		if(firstImage == null)
			createPhoto(fileArrayLength);
		else {
			var path = 'http://localhost/cas/uploads/' + modifyImageName(uploader.files[0].name);

			changeSRC(firstImage, path);
		}
	};
}

function createPhoto(fileArrayLength) {
	var image_inspector = document.getElementById('image-inspector');
	var inspectorNew = document.createElement('div');
	var image_uploader = document.getElementById('image-uploader');
	image_uploader.removeChild(image_inspector);
	inspectorNew.setAttribute('id', 'image-inspector');
	image_uploader.appendChild(inspectorNew);
	var inspectorW = inspectorNew.clientWidth;
	var inspectorH = inspectorNew.clientHeight;
	var imageW = inspectorW / fileArrayLength;
	var imageH = inspectorH;
	var path = 'http://localhost/cas/uploads/';

	//creates and show the image on browser.
	//this loop waits for an upgrade of getting more than
	//one images per form.
	for(var i = 0; i < fileArrayLength; i++) {

		var imageName = modifyImageName(uploader.files[0].name);

		console.log(path + imageName);

		var x = document.createElement("img");
		var hidden = document.createElement('input');
		x.setAttribute('position', 'absolute');
		x.setAttribute("id", "image-" + (i + 1));
	    x.setAttribute("width", '0px');
	    x.setAttribute("height", '0px');
	    x.setAttribute('onload', 'changePhoto(this)');
	    x.setAttribute('onclick', 'openFullScreen()');
	    x.src = path + imageName;

	    hidden.setAttribute('type', 'hidden');
	    hidden.setAttribute('name', 'image_path');
	    hidden.setAttribute('value', path + imageName);

	    inspectorNew.appendChild(x);
	    inspectorNew.appendChild(hidden);

	    x.onload = function() {
	    	
	    	resizeImage()
	    };
	}
}

function modifyImageName(name) {
	var imageName = name;
	imageName = imageName.replace(/\s/g, '');

	return imageName;
}

function changeSRC(photo, path) {
	photo.src = path;
}

function resizeImage() {

	var photo = document.getElementById("image-1");
	var natW = photo.naturalWidth;
	var natH = photo.naturalHeight;

	var image_inspector = document.getElementById('image-inspector');
	var inspectorW = image_inspector.clientWidth;
	var inspectorH = image_inspector.clientHeight;

	if(natW/natH > inspectorW/inspectorH) {
		photo.style.width = inspectorW + 'px';
		photo.style.height = 'auto';
	} else {
		photo.style.height = inspectorH + 'px';
		photo.style.width = 'auto';
	}
}

function warningAcceptance() {
	alert('Selecting this box you confirm that this student does not need to change anything in this work.');
}

function textareaCreation(paragraph) {
	var textarea = document.createElement('textarea');

	var parent = paragraph.parentNode;
	textarea.setAttribute('height', '100px');
	textarea.setAttribute('width', '100px');

	var attribute = parent.previousSibling;
	var tag = attribute.firstChild;

	if(tag.innerHTML == 'Title: ') {
		textarea.setAttribute('onfocusout', 'destroyElem(this, \'1\')');
		var inputField = document.getElementById('title');
		if(inputField != null) {
			textarea.innerHTML = inputField.value;
		}
	} else if(tag.innerHTML == 'Hours spent: ') {
		textarea.setAttribute('onfocusout', 'destroyElem(this, \'2\')');
		var inputField = document.getElementById('hours');
		if(inputField != null) {
			textarea.innerHTML = inputField.value;
		}
	} else if(tag.innerHTML == 'Task Undertaken: ') {
		textarea.setAttribute('onfocusout', 'destroyElem(this, \'3\')');
		var inputField = document.getElementById('task');
		if(inputField != null) {
			textarea.innerHTML = inputField.value;
		}
	} else if(tag.innerHTML == 'Reflection: ') {
		textarea.setAttribute('onfocusout', 'destroyElem(this, \'4\')');
		var inputField = document.getElementById('reflection');
		if(inputField != null) {
			textarea.innerHTML = inputField.value;
		}
	}
	parent.appendChild(textarea);
}

function destroyElem(destroy, hidden) {

	var text = destroy.value;
	var first = destroy.previousSibling;



	if(text != "") {
		//submit button for the changed thing
		var submitButton = document.getElementById('submitBtn');

		if(submitButton == null) {
			buildForm(first);
		}


		if(first.innerHTML != text) 
			first.innerHTML = text;

		var title = document.getElementById('title');
		var hours = document.getElementById('hours');
		var task = document.getElementById('task');
		var reflection = document.getElementById('reflection');
		var hidden1 = document.createElement('input');
		
		if(title != null && hidden == '1') {
			title.value = text;
		} else if(hours != null && hidden == '2') {
			hours.value = text;
		} else if(task != null && hidden == '3') {
			task.value = text;
		} else if(reflection != null && hidden == '4') {
			reflection.value = text;
		}
	}

	var parent = destroy.parentNode;
	parent.removeChild(destroy);
}

function buildForm(first) {
	var changingForm = document.getElementById('changingForm');

	changingForm = document.createElement('form');
	changingForm.setAttribute('method', 'POST');
	changingForm.setAttribute('id', 'changingForm');
	changingForm.setAttribute('action', 'alterEntry.php');

	var submitButton = document.createElement('input');
	submitButton.setAttribute('type', 'submit');
	submitButton.setAttribute('value', 'Submit changes');
	submitButton.setAttribute('onclick', 'alterEntry()');
	submitButton.setAttribute('id', 'submitBtn');

	first.parentNode.parentNode.parentNode.parentNode.parentNode.appendChild(changingForm);
	changingForm.appendChild(submitButton);

	var titleInit = document.getElementById('titleInit');
	var titleInitInput = document.createElement('input');
	titleInitInput.setAttribute('type', 'hidden');
	titleInitInput.setAttribute('name', 'titleInitInput');
	titleInitInput.setAttribute('value', titleInit.innerHTML);

	changingForm.appendChild(titleInitInput);

	var title = document.createElement('input');
	var hours = document.createElement('input');
	var task = document.createElement('input');
	var reflection = document.createElement('input');

	title.setAttribute('type', 'hidden');
	title.setAttribute('name', 'title');
	title.setAttribute('id', 'title');
	changingForm.appendChild(title);

	hours.setAttribute('type', 'hidden');
	hours.setAttribute('name', 'hours');
	hours.setAttribute('id', 'hours');
	changingForm.appendChild(hours);

	task.setAttribute('type', 'hidden');
	task.setAttribute('name', 'task');
	task.setAttribute('id', 'task');
	changingForm.appendChild(task);

	reflection.setAttribute('type', 'hidden');
	reflection.setAttribute('name', 'reflection');
	reflection.setAttribute('id', 'reflection');
	changingForm.appendChild(reflection);
}

function showSolution() {
	var elem = document.body;
	var y = elem.scrollTop;
	var solution1 = document.getElementById('solution1');
	var video = document.getElementById('video');

	var solution = document.getElementById('solution');
	var solutionH = solution.clientHeight;
	var solutionTop = solution.offsetTop;
	var w = window.innerHeight;

	var solutionBottom = solutionTop + solutionH - w;

	if(y > solutionBottom && solution1.style.display != 'block') {
		solution1.style.display = 'block';
		var solution2 = document.getElementById('solution2');
		solution2.style.display = 'block';
		var solution3 = document.getElementById('solution3');
		solution3.style.display = 'block';
	}
}

var showText = function (target, message, index, interval) {   
	if (index < message.length) {
		$(target).append(message[index++]);
 		setTimeout(function () { showText(target, message, index, interval); }, interval);
	}
}

function deleteDeadline(deadlineForDeletion) {
	var targetDeadline = prompt("Please enter the date of the deadline in which you want to migrate students' entries.");
	
	if(targetDeadline != null) {
		window.location="/cas/deleteDead.php?date=" + deadlineForDeletion + "&migration=" + targetDeadline;
	}
}

function pinText(element) {

	var parent = element.parentNode;
	var label = parent.lastElementChild;

	var noLetters;

	 var key = event.keyCode;

	if(key == 8) {
		noLetters = element.value.length - 1;
	} else {
		noLetters = element.value.length + 1;
	}

	if(noLetters >= 1) {
		label.className = 'pined';
	} else if(noLetters == 0) {
		label.className = 'onField';
	}

}

















