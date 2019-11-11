function initClient() {
  var API_KEY = 'AIzaSyCWQ8aymObjExMDOTGswScw7d3W_NPpWjY';  // Crear API KEY desde la consola de apis de Google.

  var CLIENT_ID = '268283345449-mjdvat6i78156q8g86cesmjlcp8mq3jk.apps.googleusercontent.com';  // Obtener el CLIENT ID desde la consola de api de Google.

  var SCOPE = 'https://www.googleapis.com/auth/spreadsheets.readonly';


  gapi.client.init({
    'apiKey': API_KEY,
    'clientId': CLIENT_ID,
    'scope': SCOPE,
    'discoveryDocs': ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
  }).then(function(sucess) {
    gapi.auth2.getAuthInstance().isSignedIn.listen(updateSignInStatus);
    updateSignInStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
  },
    function(error){
        loguinMessage();
    }
    );
}

function handleClientLoad() {
  gapi.load('client:auth2', initClient);
}

function updateSignInStatus(isSignedIn) {
  if (isSignedIn) {
    read_data();
  }else{
    loguinMessage();
  }
}

function handleSignInClick(event) {
  gapi.auth2.getAuthInstance().signIn();
}

function handleSignOutClick(event) {
  // gapi.auth2.getAuthInstance().signOut();
  signOut();
}

function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
       auth2.disconnect();
       window.location.reload(true); 
  });

}

// function onLoad() {
//   gapi.load('auth2', function() {
//       gapi.auth2.init();
//   });
// }