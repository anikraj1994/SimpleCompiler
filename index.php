<!DOCTYPE html>
<html>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
<head>
<title>Simple Compiler</title>

 <script src="https://apis.google.com/js/client:platform.js" async defer></script>
<meta name="google-signin-clientid" content="1029145220065-9la7u55o16iagvpatk7t5u3ha7ciopct.apps.googleusercontent.com" />
<meta name="google-signin-scope" content="email" />
<meta name="google-signin-cookiepolicy" content="single_host_origin" />
<meta name="google-signin-callback" content="signinCallback" />
<script src="https://apis.google.com/js/client:platform.js?onload=render" async defer></script>
<script>
 /* Executed when the APIs finish loading */
 function render() {
   var signinButton = document.getElementById('signinButton2');
   signinButton.addEventListener('click', function() {
    if(document.getElementById('signinButton2').getAttribute("si")=="0")
     gapi.auth.signIn(); // Will use page level configuration
  else if(document.getElementById('signinButton2').getAttribute("si")=="1"){console.log('callback signouyt ');  gapi.auth.signOut();}
   });
var signinButton2 = document.getElementById('signinButton3');
   signinButton2.addEventListener('click', function() {
    if(document.getElementById('signinButton3').getAttribute("si")=="0")
     gapi.auth.signIn(); // Will use page level configuration
  else if(document.getElementById('signinButton3').getAttribute("si")=="1"){console.log('callback signouyt ');  gapi.auth.signOut();}
   });
    


 }
  function signinCallback(authResult) {console.log('callback '+document.getElementById('signinButton2').getAttribute("si"));
            if (authResult['status']['signed_in'] ) {console.log('callback a ');
             gapi.client.load('plus','v1', function(){
             var request = gapi.client.plus.people.get({
                'userId' : 'me'
              });
              request.execute(function(resp) {
                document.getElementById('signinButton2').setAttribute("si","1");
                document.getElementById('signinButton2').setAttribute("email",resp.emails[0].value);
                document.getElementById('signinButton2').innerHTML=resp.emails[0].value;
                  document.getElementById('signinButton2').setAttribute("data-tooltip","Sign out");


                document.getElementById('signinButton3').setAttribute("si","1");
                document.getElementById('signinButton3').setAttribute("email",resp.emails[0].value);
                document.getElementById('signinButton3').innerHTML=resp.emails[0].value;
                  document.getElementById('signinButton3').setAttribute("data-tooltip","Sign out");


 qshow();
                         }); });

            
              
            }

            else {console.log('callback c ');
            document.getElementById('signinButton2').innerHTML="Sign in";
             document.getElementById('signinButton2').setAttribute("si","0");
              document.getElementById('signinButton2').setAttribute("email","null");
              document.getElementById('signinButton2').setAttribute("data-tooltip","Sign in to keep your files safe");

              document.getElementById('signinButton3').innerHTML="Sign in";
             document.getElementById('signinButton3').setAttribute("si","0");
              document.getElementById('signinButton3').setAttribute("email","null");
              document.getElementById('signinButton3').setAttribute("data-tooltip","Sign in to keep your files safe");
              // Update the app to reflect a signed out user
              // Possible error values:
              //   "user_signed_out" - User is signed-out
              //   "access_denied" - User denied access to your app
              //   "immediate_failed" - Could not automatically log in the user
              console.log('Sign-in state: ' + authResult['error']);
            qhide();
            }
          }
</script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>

</head>
 <style type="text/css" media="screen">
    #editor { 
        position: relative;
        height: 200px;
          }
</style>
<style >
 
 body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }


      h2.thin {
          font-weight: 200;
      }

      .toastbottom {
        bottom: 45px; right: 24px;
      }
      .hidden{
        visibility: hidden;
      }
      a.thin_2{
         font-weight: 300;
      }
    
        
         
</style>

<body>
    
<header>
  <div class="navbar-fixed">
 <nav class="teal">
      <div class="nav-wrapper">

      <a href="#!" id="titlee" class="truncate brand-logo thin_2"><i class="mdi-editor-insert-drive-file left"></i>New File</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      <ul class="right hide-on-med-and-down">
         <li  id="new" class="hidden"><a onClick="newi()" data-position="bottom" class="tooltipped" href="#" data-delay="30" data-tooltip="New"><i class="mdi-content-add"></i></a></li>
          <li id="open" class="hidden"><a onClick="openi()" data-position="bottom" class="tooltipped " href="#" data-delay="30" data-tooltip="Open"><i class="mdi-file-folder-open"></i></a></li>
         <li id="save" class="hidden"><a onClick="save()" data-position="bottom" class="tooltipped " href="#" data-delay="30" data-tooltip="Save"><i class="mdi-content-save"></i></a></li>
         <li id="share" class="hidden"><a onClick="share()" data-position="bottom" class="tooltipped" href="#" data-delay="30" data-tooltip="Share link"><i class="mdi-social-share"></i></a></li>
           <li>
          <a id="signinButton2" si="0" email="null" data-delay="30" data-tooltip="Sign in to keep your files safe" data-position="bottom" class="tooltipped" href="#">Sign in</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li> <a id="signinButton3" si="0" email="null" data-delay="30" data-tooltip="Sign in to keep your files safe" data-position="right" class="tooltipped" href="#">Sign in</a></i></li>
           <li  id="news" class="hidden"><a onClick="newi()" href="#" ><i class="mdi-content-add left"></i>New</a></li>
           <li id="opens" class="hidden"><a onClick="openi()" href="#" ><i class="mdi-file-folder-open left"></i>Open</a></li>
         <li id="saves" class="hidden"><a onClick="save()" href="#" ><i class="mdi-content-save left"></i>Save</a></li>
         <li id="shares" class="hidden"><a onClick="share()" href="#"><i class="mdi-social-share left"></i>Share</a></li>
      </ul>
    </div>
  </nav>
</div>



</header>

<main>
    <div class="container">
    	 <h2 class="thin" >C Compiler</h2>
         <div class="row">
    <form class="col s12">
      <div class="row">
        <div id="text" class="input-field col s12 m12 l9">
          <div id="editor">#include &lt;stdio.h&gt;
void main()
{
  printf(&quot;Hello!&quot;);
}</div>

        </div>
        <div id="text" class="input-field col s3 m3 l3">
          <textarea id="input_box" name="input_box" class=" materialize-textarea"></textarea>
          
          <label class="active" for="input_box">Type your inputs here</label>
          
        </div>
      </div> 
    </form>
       
       	<a onClick="doSomething()" id="compilebtn" class="waves-effect waves-light btn">Compile</a>
    

  </div>
  <h2 class="thin">Output:</h2>
  <h5 class="thin" id="error"></h5>
  <h5 id="results"></h5>
      </div> 	 <!-- Compiled and minified CSS -->
 
 </main>
        
    <!-- Modal Structure -->
       <div id="savemodal" class="modal">
    <div class="modal-content">
      <h4>Save</h4><p>Files with same names will be overwritten.<br></p>
      <div class="input-field col s6">
          <input style=" font-size:30px" id="filename" type="text" class="validate">
          <label for="filename">File Name</label>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
      <a href="#" onClick="savefile()" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>
    </div>
  </div>



 <div id="modal3" class="modal bottom-sheet">
          <div class="modal-content">
            <h4>Open</h4>
            <p>Click to load program. Download programs with the download button.</p>
           

            <div class="collection" id="coll">
                                                <a href="#" id="filelistitem" onClick=" openi_itemclick(this.id) " class="collection-item hidden" >Alvin</a>

      </div>
          </div>
</div>


 <footer class="page-footer transparent">
   <div class="footer-copyright">
            <div class="container">
            <a class="grey-text right" >anikraj1994@gmail.com</a>
            </div>
          </div>
        </footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.1.9/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/dreamweaver");
    editor.getSession().setMode("ace/mode/c_cpp");
    editor.getSession().setTabSize(4);
   editor.setOptions({
    maxLines: Infinity
});
   editor.getSession().setUseWrapMode(false)
    editor.setHighlightActiveLine(false);
    document.getElementById('editor').style.fontSize='18px';
    editor.setShowPrintMargin(false);
    editor.commands.addCommand({
    name: 'savei',
    bindKey: {win: 'Ctrl-S',  mac: 'Command-S'},
    exec: function(editor) {
        save();
    },
    readOnly: true // false if this command should not apply in readOnly mode
});
    editor.commands.addCommand({
    name: 'openi',
    bindKey: {win: 'Ctrl-O',  mac: 'Command-O'},
    exec: function(editor) {
        openi();
    },
    readOnly: true // false if this command should not apply in readOnly mode
});
</script>
    </body>
    <script type="text/javascript">

$( document ).ready(function(){

$(".button-collapse").sideNav();
});

function copy(text) {
  window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
}
function save(){ $('.button-collapse').sideNav('hide');
  $('#savemodal').openModal();
}
var oldcode="";
function newi(){ $('.button-collapse').sideNav('hide');
  oldcode=editor.getValue();
editor.setValue("#include <stdio.h>\nvoid main()\n{\n\tprintf(\"Hello!\");\n}");
Materialize.toast('<span >New File Created</span><a class="btn-flat yellow-text" href="#" onClick="restore()">Undo<a>', 5000,'toastbottom');
document.getElementById("titlee").innerHTML ='<i class="mdi-editor-insert-drive-file left"></i>New File';

}
function restore(){
editor.setValue(oldcode);
  }

function openi_itemclick(filen){
  var email= document.getElementById('signinButton2').getAttribute("email");
  $('#modal3').closeModal();
  jQuery.get('users/'+email+'/programs/'+filen, function(data) {
                              editor.setValue(data);
                  });

  document.getElementById("titlee").innerHTML ='<i class="mdi-editor-insert-drive-file left"></i>'+filen;
}

function openi(){ $('.templist').remove(); $('.button-collapse').sideNav('hide');
var email= document.getElementById('signinButton2').getAttribute("email");
 if(email!="null"){
var files= new Array();
  $.ajax({
              data: 'email='+ encodeURIComponent(email),
              url: 'filelist.php',
              method: 'POST', // or GET
                      success: function(msg) {
                          $('#modal3').openModal();

                         files = JSON.parse(msg);

                         if(files.length>2){
                               for(var i=2;i<files.length;i++){
                                console.log(files[i] + " , ");
                                   document.getElementById("filelistitem").innerHTML=files[i];
                                   var itm = document.getElementById("filelistitem");
                                    var cln = itm.cloneNode(true);
                                    cln.id=files[i];
                                    cln.className = "collection-item templist";
                                    document.getElementById("coll").appendChild(cln);


                               }
                            }

                      }
                  });
              return false;

 }
else {
     Materialize.toast('Sign in to open', 2000);
    }


}

function qhide(){
document.getElementById('new').style.visibility = "hidden";
document.getElementById('open').style.visibility = "hidden";
document.getElementById('save').style.visibility = "hidden";
  document.getElementById('share').style.visibility = "hidden";
  document.getElementById('news').style.visibility = "hidden";
document.getElementById('opens').style.visibility = "hidden";
document.getElementById('saves').style.visibility = "hidden";
  document.getElementById('shares').style.visibility = "hidden";
}
function qshow(){
document.getElementById('new').style.visibility = "visible";
document.getElementById('open').style.visibility = "visible";
document.getElementById('save').style.visibility = "visible";
  document.getElementById('share').style.visibility = "visible";
  document.getElementById('news').style.visibility = "visible";
document.getElementById('opens').style.visibility = "visible";
document.getElementById('saves').style.visibility = "visible";
  document.getElementById('shares').style.visibility = "visible";
}

 function savefile() {
var email= document.getElementById('signinButton2').getAttribute("email");
 if(email!="null"){
                var word = editor.getValue();
                var filename = document.getElementById("filename").value;//by id
                //alert("Shit"+word);
                $.ajax({
              data: 'filename='+ encodeURIComponent(filename)+'&email='+ encodeURIComponent(email) + '&textbox='+encodeURIComponent(word),
              url: 'save.php',
              method: 'POST', // or GET
                      success: function(msg) {
                         Materialize.toast('File Saved', 2000);
                      }
                  });
              return false;
  }
    else {
     Materialize.toast('Sign in to save', 2000);
    }
}

 
    function doSomething() { 
      var email= document.getElementById('signinButton2').getAttribute("email");
      //console.log(email);
      if(email!="null"){$( "#compilebtn" ).addClass( "disabled" );
                var word =  editor.getValue();//by id
                //alert("Shit"+word);
                var input = document.getElementById("input_box").value;
                $.ajax({
              data: 'textbox='+ encodeURIComponent(word)+'&email='+ email+'&input='+encodeURIComponent(input),
              url: 'compile.php',
              method: 'POST', // or GET
                      success: function(msg) { $( "#compilebtn" ).removeClass( "disabled" );
                          jQuery.get('users/'+email+'/tempr.txt', function(data) {
                              document.getElementById("results").innerHTML =data;
                                                                                          });
                          jQuery.get('users/'+email+'/tempe.txt', function(data) {
                              document.getElementById("error").innerHTML =data;
                                                                                     });
                      },
                      error: function(){
                                        alert('Something went wrong. Please try again.');$( "#compilebtn" ).removeClass( "disabled" );
                                      }


                  });
              return false;
  }
else {
 Materialize.toast('Sign in to compile', 2000);
}


}
</script>
</html>
