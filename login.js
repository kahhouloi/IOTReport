
var config = {
    apiKey: "AIzaSyCYWAS2LqRUm5vUcMPYKHjAm57SKAsy1Js",
    authDomain: "my-project-58cab.firebaseapp.com",
    databaseURL: "https://my-project-58cab.firebaseio.com",
    projectId: "my-project-58cab",
    storageBucket: "my-project-58cab.appspot.com",
    messagingSenderId: "1007720850652"
};
firebase.initializeApp(config);

firebase.auth().onAuthStateChanged(function (user) {
    if (user) {
        // User is signed in.

        var user = firebase.auth().currentUser;

        if (window.location.pathname == "/IOTAssignment/index.html") {
            window.location.href = "/IOTAssignment/adminReport.html";
        }

    } else {
        // No user is signed in.
        if (window.location.pathname != "/IOTAssignment/index.html") {
            window.location.assign("/IOTAssignment/index.html");
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
    window.location.href = "loginPage.php";
}

