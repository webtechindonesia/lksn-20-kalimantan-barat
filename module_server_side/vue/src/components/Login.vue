<template>
    <div>
        <div class="container">
            <form action="" @submit.prevent="login">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" v-model="loginData.username">
                </div>
                <div class="form-group">
                    <label for="username">Password</label>
                    <input type="password" v-model="loginData.password">
                </div>
                <button class="btn">Login</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            loginData: {
                username: '',
                password: ''
            }
        }
    },
    methods: {
        checkPass(token) {
            console.log(token)
            axios.post(`auth/me`, {}, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            }).then(res => {
                console.log(res)
            })
        },
        login() {


            axios.post(`auth/login`, this.loginData)
                .then(res => {
                    console.log(res.data)
                    localStorage.setItem('poll_user', JSON.stringify(res.data))

                    if(this.loginData.password == this.loginData.username) 
                        this.$router.push('/reset')
                    else 
                        this.$router.push('/')

                    // this.checkPass(res.data.access_token)
                })
                .catch(err => {
                    alert(err.response.data.error)
                })
        }
    }
}
</script>
<style scoped>
    .btn {
        background: darkblue;
    }
</style>