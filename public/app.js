var APIDonate = {
    getAll: function() {
        var db = firebase.firestore();
        return db.collection("donate")
            .get()
            .then(querySnapshot =>
                querySnapshot.docs.map(doc => {
                    let data = doc.data()
                    return {
                        email: doc.email,
                        uuid: data.uuid,
                        money: data.money,
                        created_at: data.created_at,
                    }
                })
            );
    },
    getByEmail: function(email) {
        var db = firebase.firestore();
        return db.collection("donate")
            .where("email","==", email)
            .get()
            .then(querySnapshot =>
                querySnapshot.docs.map(doc => {
                    let data = doc.data()
                    return {
                        email: doc.email,
                        uuid: data.uuid,
                        money: data.money,
                        created_at: data.created_at,
                    }
                })
            );
    },
    getByUUID: function(uuid) {
        var db = firebase.firestore();
        return db.collection("donate")
            .where("uuid","==", uuid)
            .get()
            .then(querySnapshot =>
                querySnapshot.docs.map(doc => {
                    let data = doc.data()
                    return {
                        email: doc.email,
                        uuid: data.uuid,
                        money: data.money,
                        created_at: data.created_at,
                    }
                })
            );
    },
    store: function(object, _callback) {
        /**
         * email, uuid, money
         */
        var db = firebase.firestore();
        return db.collection("donate")
            .add(object)
            .then(refDoc => {
                _callback(refDoc);
            })
    }
}

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        $("#btn-login").hide();
        $("#btn-logout").show();
    } else {
        $("#btn-login").show();
        $("#btn-logout").hide();
    }
});

$(function() {
    $(document).on("click", "#btn-logout", function(e){
        e.preventDefault();
        firebase.auth().signOut().then(function () {
            window.location.reload();
            }, function (error) {
        });
    });

    $(document).on("click", "#btnDonateCompany", function(e){
        var email = firebase.auth().currentUser.email;
        APIDonate.store({"email": email, "uuid": 'uuidoki', "money": 10, "created_at": new Date().getTime()}, function(refDoc){
            console.log(refDoc);
        })
    });

    $(document).on("click", "#btnGetDonateCompany", function(e){
        APIDonate.getAll().then(data => {
            console.log(data);
        });
    });

    $(document).on("click", "#btnGetByUUID", function(e){
        APIDonate.getByUUID($("#uuid").val()).then(data => {
            console.log(data);
        });
    });

    $(document).on("click", "#btnGetByEmail", function(e){
        APIDonate.getByEmail($("#email").val()).then(data => {
            console.log(data);
        });
    });

})
