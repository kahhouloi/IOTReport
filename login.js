
var config = {
    apiKey: "AIzaSyA4yYb0x-vPzS-j7BKBF6lQ_CyjVE_POHg",
    authDomain: "iot-smart-streetlight.firebaseapp.com",
    databaseURL: "https://iot-smart-streetlight.firebaseio.com",
    projectId: "iot-smart-streetlight",
    storageBucket: "iot-smart-streetlight.appspot.com",
    messagingSenderId: "360440005934"
};
firebase.initializeApp(config);

firebase.auth().onAuthStateChanged(function (user) {
    if (user) {
        // User is signed in.

        var user = firebase.auth().currentUser;

        if (window.location.pathname == "/IOTAssignment/login.php") {
            window.location.href = "/IOTAssignment/mainPage.php";
        }

    } else {
        // No user is signed in.
        if (window.location.pathname != "/IOTAssignment/login.php") {
            window.location.assign("/IOTAssignment/login.php");
        }

    }
});

function login() {
    var userEmail = document.getElementById("email_field").value;
    var userPass = document.getElementById("password_field").value;

    firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function (error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;

        window.alert("Error : " + errorMessage);

        // ...
    });
}

function logout() {
    firebase.auth().signOut();
    window.location.href = "login.php";
}

