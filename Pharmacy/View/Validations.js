function entry_exists_in_DB(str,table)
{
    //backslash (\) and single quotation (') displays script code in the check_label; don't send request if there's text contains (\) or (')
    if(str.charCodeAt(str.indexOf("\\"))!=92 &&  str.charCodeAt(str.indexOf("'"))!=39) {
        //console.log("initiaing request.........................................");
        xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            /*if(this.readyState==0)
            {
                console.log("request not initialized ");
            }
            else if(this.readyState==1)
            {
                console.log("server connection established ");
            }
            else if(this.readyState==2)
            {
                console.log("request received ");
            }
            else if(this.readyState==3)
            {
                console.log("processing request  ");
            }
            else*/
            if (this.readyState == 4 && this.status == 200) {
                //console.log("request finished and response is ready");
                if (this.responseText != "") {
                    disable_but("Submit");
                    document.getElementById('check_label').innerText = this.responseText;
                }
                //console.log(this.responseText);
            }
        }
        xmlHttp.open('POST', '../Controller/ProductController.php', true);
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //console.log('check='+str +"&table="+table);
        xmlHttp.send('check='+str+"&table="+table);
    }
}
function text_validations(str)
{
    var symbol_detected=false;
    if(!isNaN(str) && str.length!=0 && str!=' ') //if str not empty and the entry is a number
    {
        disable_but("Submit");
        document.getElementById("check_label").innerText="Text shouldn't contain numbers only";
    }
    else if(str==' ') //str can't be equal to space or one char only
    {
        disable_but("Submit");
        document.getElementById("check_label").innerText="Text should be at least 1 character";
    }
    else //else if str is not number , 1 character, and space
    {
        console.log("str is not empty, checking for individual characters...");
        for(var i=0;i<str.length;i++)
        {
            console.log("char "+(i+1)+"code = "+str.charCodeAt(i));
            if(!(str.charCodeAt(i)>=48 && str.charCodeAt(i)<=57) && !(str.charCodeAt(i)>=65 && str.charCodeAt(i)<=90) &&
                !(str.charCodeAt(i)>=97 && str.charCodeAt(i)<=122) && str.charCodeAt(i)!=32 && str.charCodeAt(i)!=46)
            {
                symbol_detected=true;
                console.log("symbol_detected=true");
            }
        }
        if(symbol_detected==true)
        {
            console.log("string has symbols.............");
            disable_but("Submit");
            document.getElementById("check_label").innerText="Text should not contain symbols";
        }
        else
        {
            console.log("string has *NO* symbols..........");
            enable_but("Submit");
            document.getElementById("check_label").innerText="";
        }
    }
}

function disable_but(but_id)
{
    document.getElementById(but_id).disabled=true;
}
function enable_but(but_id)
{
    document.getElementById(but_id).disabled=false;
}

function action_confirmation(message)
{
    if(confirm(message)==true)
    {
        alert("confirmed");
    }
}
function test()
{
    alert("Confirmed..Request Sent Succefully");
}