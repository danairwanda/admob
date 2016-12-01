/*******************************************************************************
 ShowPasswordCheckbox.js      Adds a "show password" toggle to a password field
 ------------------------------------------------------------------------------
 Adapted from                               FormTools.addShowPasswordCheckboxes
 Info/Docs         http://www.brothercake.com/site/resources/scripts/formtools/
 ------------------------------------------------------------------------------
*******************************************************************************/


//show password checkbox constructor
function ShowPasswordCheckbox(passfield)
{
	//if the browser is unsupported, silently fail
	//[pre-DOM1 browsers generally, and Opera 8 specifically]
	if(typeof document.getElementById == 'undefined'
		|| typeof document.styleSheets == 'undefined') { return false; }

	//or if the passfield doesn't exist, silently fail
	if(passfield == null) { return false; }
	
	//create a context wrapper, so that we have sole context for modifying the content
	//and give it a distinctive and underscored name, to prevent conflict
	passfield._contextwrapper = this.createContextWrapper(passfield);

	//save a shortcut to the wrapper 
	var passboxwrapper = passfield._contextwrapper;
	
	//copy the HTML from the password field to create the new plain-text field
	var textfield = this.convertPasswordFieldHTML(passfield);
	
	//create the HTML for the show-password label and checkbox
	//we'll have to add for/id associations here so that it works in IE
	//with a random key to avoid duplication 
	var labelkey = Math.round(Math.random() * 1000);
	var showlabel = '<label'
				  + ' for="showpasscheckbox-' + labelkey + '"'
				  + ' class="show-password"'
				  + ' title="Show the password as plain text (not advisable in a public place)"'
				  + ' style="display:block;position:static;"'
				  + '>';
	showlabel += '<input type="checkbox"'
				  + ' id="showpasscheckbox-' + labelkey + '"'
				  + ' title="Show the password as plain text (not advisable in a public place)"'
				  + '>';
	showlabel += '<span style="display:inline-block;">Show Password</span>';
	showlabel += '</label>';
				  
	//write the textfield and showlabel into the context wrapper, 
	//after the password field that's currently there
	passboxwrapper.innerHTML += textfield + showlabel;

	//grab back a reference to the textfield and checkbox 
	//and to the original password field, saving it back to passfield
	var textfield = passboxwrapper.lastChild.previousSibling;
	var tickbox = passboxwrapper.lastChild.firstChild;
	passfield = passboxwrapper.firstChild;
		
	//then the password field and textfield need circular references
	//and the checkbox needs references back to both of them
	passfield._plainfield = textfield;
	textfield._passwordfield = passfield;
	tickbox._passwordfield = passfield;
	tickbox._plainfield = textfield;

	//restore its contextwrapper reference 
	passfield._contextwrapper = passboxwrapper;
	
	//save a reference to this
	var self = this;

	//then bind change listeners to both fields 
	//to continually copy input values between them
	this.addListener(passfield, 'change', function(e)
	{
		var textbox = self.getTarget(e);
		textbox._plainfield.value = textbox.value;
	});
	this.addListener(textfield, 'change', function(e)
	{
		var textbox = self.getTarget(e);
		textbox._passwordfield.value = textbox.value;
	});

	//then bind a simple click handler to the checkbox toggle the fields' display
	this.addListener(tickbox, 'click', function(e)
	{
		//get the checkbox reference 
		var tickbox = self.getTarget(e),
		
		//the textbox to show is the plainfield if checked or the password field if not
		//and the textbox to hide is the other one
		showfield = tickbox.checked ? tickbox._plainfield : tickbox._passwordfield,
		hidefield = tickbox.checked ? tickbox._passwordfield : tickbox._plainfield;
		
		//re-copy the value from the currently visible field to the one about to be shown
		//this catches situations where history-back retains the plain version but
		//not the encrypted version (because password fields are automatically cleared
		//by the browser, but normal text fields aren't) so that revealing the plain one 
		//again clears it, or revealing the encrytped one again populates it
		//this should only happen in opera anyway, because of the way it perfectly 
		//re-creates cached processor snapshots rather than re-rendering the page, 
		//and hence the forced form-reset doesn't kick-in to remove those values
		//(which it doens't in firefox either, but the problem still doesn't occur)
		showfield.value = hidefield.value;
		
		//then toggle the fields' display 
		showfield.style.display = 'block';
		hidefield.style.display = 'none';
	});
	
	//get the parent form reference for this field
	var parentform = this.getParentForm(passfield);
	
	//then add a submit listener, that copies the plain field value
	//into the password field, if the plain field is currently visible,
	//this catches situations where you submit from the plain field
	//by hitting enter, without ever viewing the normal field
	//(or when its retained in a history view then immediately re-submitted)
	//which would otherwise not yet have copied its value across
	//nb. if there is no parent form then the reference will be null
	//so we add that test just in case, but in that case
	//the field can't submit and then we won't have this issue anyway
	if(parentform)
	{
		//save references to the plain and password field
		//as properties of the parent form
		parentform._plainfield = textfield;
		parentform._passwordfield = passfield;
		
		//bind the form submission listener
		this.addListener(parentform, 'submit', function(e)
		{
			//get the form reference 
			var parentform = self.getTarget(e);
			
			//if the plainfield is currently displayed
			//copy the plainfield value to the password field
			if(parentform._plainfield.style.display == 'block')
			{
				parentform._passwordfield.value = parentform._plainfield.value;
			}
		});
	}

	//return true for successful initialization
	return true;
}


//associated utility methods
ShowPasswordCheckbox.prototype =
{

	//create a context wrapper element around a textbox
	createContextWrapper : function(passfield)
	{
		//create the wrapper and add its class
		//it has to be an inline element because we don't know its context
		var wrapper = document.createElement('span');
		
		//enforce relative positioning
		wrapper.style.position = 'relative';
		
		//insert the wrapper directly before the passfield
		passfield.parentNode.insertBefore(wrapper, passfield);
		
		//then move the passfield inside it
		wrapper.appendChild(passfield);
		
		//return the wrapper reference
		return wrapper;
	},
	
	
	//get the parent form reference from a field reference
	getParentForm : function(textbox)
	{
		//find the parent form from this textbox reference
		//(which may not be a textbox, but that's fine, it just a reference name!)
		while(textbox)
		{
			if(/form/i.test(textbox.nodeName)) { break; }
			textbox = textbox.parentNode;
		}
		//if the reference is not a form then the textbox wasn't wrapped in one
		//so in that case return null for failure
		if(!/form/i.test(textbox.nodeName)) { return null; }
		
		//else return the now-form reference
		return textbox;
	},
	
	
	//copy the HTML from a password field to a plain text field, 
	//this is only because IE doesn't support setting or changing the type of an input
	convertPasswordFieldHTML : function(passboxref)
	{
		//start the HTML for a text field
		var textfield = '<input';
		
		//now run through the password fields' specified attributes 
		//and copy across each one into the textfield HTML
		//*except* for its name and type, and any underscored attributes
		//we need to exclude the name because we'll define that separately
		//depending on the situation, and obviously the type, and private attributes
		//because we control them and their meaning in separate conditions too
		for(var fieldattributes = passboxref.attributes, 
				j=0; j<fieldattributes.length; j++)
		{
			//we have to check .specified otherwise we'll get back every single attribute
			//that the element might possibly have! which is what IE puts in the attributes 
			//collection, with default values for unspecified attributes
			if(fieldattributes[j].specified && !/^(_|type|name)/.test(fieldattributes[j].name))
			{
				textfield += ' ' + fieldattributes[j].name + '="' + fieldattributes[j].value + '"';
			}
		}
		
		//now add the type of "text" to the end, plus display:none and autocomplete off 
		//(to prevent it on the plain field, but it still works on the password field)
		//this uses HTML4 empty-element syntax, but we don't need to distinguish
		//because the browser's internal representations will generally be identical
		textfield += ' type="text" style="display:none" autocomplete="off">';


		
		//return the finished textfield HTML
		return textfield;
	},
	

	//add an event listener
	//this is deliberately not called "addEvent" so that we can 
	//compress the name, which would otherwise also effect "addEventListener"
	addListener : function(eventnode, eventname, eventhandler)
	{
		if(typeof document.addEventListener != 'undefined')
		{
			return eventnode.addEventListener(eventname, eventhandler, false);
		}
		else if(typeof document.attachEvent != 'undefined')
		{
			return eventnode.attachEvent('on' + eventname, eventhandler);
		}
	},
	
	
	//get an event target by sniffing for its property name
	//(assuming here that e is already a cross-model reference
	//as it is from addListener because attachEvent in IE 
	//automatically provides a corresponding event argument)
	getTarget : function(e)
	{
		//just in case!
		if(!e) { return null; }
		
		//otherwise return the target
		return e.target ? e.target : e.srcElement;
	}

}


