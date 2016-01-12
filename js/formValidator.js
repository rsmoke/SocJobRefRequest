var rxUniq = /^[a-z]{1,8}$/;
var rxText = /^\w*$/;
var rxDate = /^\d{4}-\d{2}-\d{2}$/;
var rxZip = /^\d{5}\s?-?\.?\d{0,4}$/;
var rxPhone = /^\(?\d{3}\)?\s?-?\.?\d{3}-?\s?\.?\d{4}$/;
var rxEmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;


function validateForm()
{
var x=document.forms["myNewRecordForm"]["posTitle"].value;
if (x===null || x==="")
  {
  alert("Job Title must be filled out");
  return false;
  }
  
var x=document.forms["myNewRecordForm"]["dueDate"].value;
if (!rxDate.test(x))
  {
  alert("Due date must be filled out\nformat: yyyy-mm-dd");
  return false;
  }


var x=document.forms["myNewRecordForm"]["recipEmail"].value;
  if (x.length>0){
    if (!rxEmail.test(x))
      {
      alert("That isn't a proper eMail address");
      return false;
      }
  }

var x=document.forms["myNewRecordForm"]["writerID"].value;
if (!rxUniq.test(x))
  {
  alert("You need at least one Reference Letter writer");
  return false;
  }

var x=document.forms["myNewRecordForm"]["recipFname"].value;
if (x===null || x==="")
  {
  alert("You need to enter a Recipient First Name");
  return false;
  }

var x=document.forms["myNewRecordForm"]["recipLname"].value;
if (x===null || x==="")
  {
  alert("You need to enter a Recipient Last Name");
  return false;
  }

var x=document.forms["myNewRecordForm"]["recipInst"].value;
if (x===null || x==="")
  {
  alert("You need to enter an Institution Name");
  return false;
  }

var x=document.forms["myNewRecordForm"]["recipStreet"].value;
if (x===null || x==="")
  {
  alert("You need to enter a Institution Street address");
  return false;
  }

var x=document.forms["myNewRecordForm"]["recipCity"].value;
if (x===null || x==="")
  {
  alert("You need to enter a Institution City name");
  return false;
  }

var x=document.forms["myNewRecordForm"]["recipState"].value;
if (x===null || x==="")
  {
  alert("You need to enter a Institution State");
  return false;
  }

var x=document.forms["myNewRecordForm"]["recipZip"].value;
if (x===null || x==="")
  {
  alert("You need to enter a Institution Zipcode");
  return false;
  }
}