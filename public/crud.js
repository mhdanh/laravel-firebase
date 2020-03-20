fetch() {
    return db.collection("users")
        .orderBy('name')
        .get()
        .then(querySnapshot =>
            querySnapshot.docs.map(doc => {
                let data = doc.data()
                return {
                    id: doc.id,
                    name: data.name,
                }
            })
        )
        .then(users => this.users = users)
},

add() {
    return db.collection("users")
        .add({ name: this.inputName, })
        .then(refDoc => {
            alert(`Added ${this.inputName}`)
            this.inputName = null
            this.fetch()
        })
},

update(user) {
    //  return db.doc(`users/${user.id}`)
    return db.collection('users').doc(user.id)
        .set({ name: user.name })
        .then(() => {
            alert(`Updated user ${user.id}`)
            return this.fetch()
        })
},

remove(id) {
    return db.collection('users').doc(id)
        .delete()
        .then(() => {
            alert(`Deleted user ${id}`)
            return this.fetch()
        })
},

},
created() {
    this.fetch()
},
